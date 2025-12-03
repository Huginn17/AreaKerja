<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Notifikasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class EventController extends Controller
{
    //SUPER ADMIN
    public function index(Request $request)
    {
        $data = Event::query();

        if ($search = $request->query('q')) {
            $data->where('title', 'like', "%{$search}%");
        }

        $events = $data->orderBy('tgl_mulai', 'desc')->paginate(12);

        return view('super_admin.event.home', compact('events'));
    }



    public function createForm()
    {
        return view('super_admin.event.buat');
    }

    public function store_event(Request $request)
    {
        try {
            $validated = $request->validate([
                'title' => 'required|string|max:255',
                'status' => 'nullable|string',
                'image' => 'nullable|image|max:3072',
                'content' => 'nullable|string',
                'tgl_mulai' => 'required|date',
                'jam_mulai' => 'required|date_format:H:i',
                'tgl_akhir' => 'nullable|date|after_or_equal:tgl_mulai',
                'jam_akhir' => 'nullable|date_format:H:i',
                'kuota' => 'nullable|integer',
                'lokasi' => 'nullable|string|max:255',
                'link_form' => 'nullable|url',
                'penutupan_pendaftaran' => 'nullable|date|before_or_equal:tgl_mulai',
                'kegiatan_waktu.*' => 'nullable|date_format:H:i',
                'kegiatan_nama.*' => 'nullable|string|max:255',
            ]);

            // Upload foto
            if ($request->hasFile('image')) {
                $validated['image'] = $request->file('image')->store('events', 'public');
            }

            // Simpan event utama
            $eventData = collect($validated)
                ->except(['kegiatan_waktu', 'kegiatan_nama'])
                ->toArray();

            $event = Event::create($eventData);

            // Simpan kegiatan event
            $this->syncKegiatan($event, $request);

            /* =====================================
        NOTIFIKASI BERHASIL
        ===================================== */
            Notifikasi::create([
                'user_id' => Auth::id(),
                'perusahaan_id' => null,
                'judul' => 'Event Baru Ditambahkan',
                'pesan' => 'Event <b>' . $event->title . '</b> berhasil dibuat.',
                'is_read' => 0,
                'expired_at' => now()->addDays(7),
                'pelamar_lowongan_id' => null,
            ]);

            return redirect()
                ->route('superadmin.eventform', $event->id)
                ->with('success', 'Event berhasil ditambahkan');
        } catch (\Exception $e) {

            /* =====================================
        NOTIFIKASI GAGAL
        ===================================== */
            Notifikasi::create([
                'user_id' => Auth::id(),
                'perusahaan_id' => null,
                'judul' => 'Gagal Menambahkan Event',
                'pesan' => 'Terjadi kesalahan saat membuat event: ' . $e->getMessage(),
                'is_read' => 0,
                'expired_at' => now()->addDays(7),
                'pelamar_lowongan_id' => null,
            ]);

            return redirect()
                ->back()
                ->with('error', 'Gagal membuat event!')
                ->withInput();
        }
    }



    public function detail(Event $event)
    {
        $event->load('kegiatan');
        return view('super_admin.event.view', compact('event'));
    }

    public function edit(Event $event)
    {
        $event->load('kegiatan');
        return view('super_admin.event.edit', compact('event'));
    }

    public function update_event(Request $request, Event $event)
    {
        try {

            $validated = $request->validate([
                'title' => 'required|string|max:255',
                'status' => 'nullable|string',
                'image' => 'nullable|image|max:3072',
                'content' => 'nullable|string',
                'tgl_mulai' => 'required|date',
                'jam_mulai' => 'required|date_format:H:i',
                'tgl_akhir' => 'nullable|date|after_or_equal:tgl_mulai',
                'jam_akhir' => 'nullable|date_format:H:i',
                'kuota' => 'nullable|integer',
                'lokasi' => 'nullable|string|max:255',
                'link_form' => 'nullable|url',
                'penutupan_pendaftaran' => 'nullable|date|before_or_equal:tgl_mulai',
            ]);

            // Update foto
            if ($request->hasFile('image')) {
                if ($event->image) {
                    Storage::disk('public')->delete($event->image);
                }
                $validated['image'] = $request->file('image')->store('events', 'public');
            }

            $event->update($validated);

            // Hapus kegiatan lama lalu buat baru
            $event->kegiatan()->delete();
            $this->syncKegiatan($event, $request);

            /* =============================
            NOTIFIKASI BERHASIL
        ==============================*/
            Notifikasi::create([
                'user_id' => Auth::id(),
                'perusahaan_id' => null,
                'judul' => 'Event Diperbarui',
                'pesan' => 'Event <b>' . $event->title . '</b> berhasil diperbarui.',
                'is_read' => 0,
                'expired_at' => now()->addDays(7),
                'pelamar_lowongan_id' => null,
            ]);

            return redirect()
                ->route('superadmin.detail.event', $event->id)
                ->with('success', 'Event berhasil diperbarui');
        } catch (\Exception $e) {

            /* =============================
            NOTIFIKASI GAGAL
        ==============================*/
            Notifikasi::create([
                'user_id' => Auth::id(),
                'perusahaan_id' => null,
                'judul' => 'Gagal Memperbarui Event',
                'pesan' => 'Event gagal diperbarui: ' . $e->getMessage(),
                'is_read' => 0,
                'expired_at' => now()->addDays(7),
                'pelamar_lowongan_id' => null,
            ]);

            return redirect()
                ->back()
                ->with('error', 'Gagal memperbarui event.')
                ->withInput();
        }
    }


    public function destroy(Event $event)
    {
        try {

            // Hapus gambar
            if ($event->image) {
                Storage::disk('public')->delete($event->image);
            }

            // Hapus kegiatan
            $event->kegiatan()->delete();

            // Hapus event
            $event->delete();

            /* =============================
            NOTIFIKASI BERHASIL
        ==============================*/
            Notifikasi::create([
                'user_id' => Auth::id(),
                'perusahaan_id' => null,
                'judul' => 'Event Dihapus',
                'pesan' => 'Event <b>' . $event->title . '</b> berhasil dihapus.',
                'is_read' => 0,
                'expired_at' => now()->addDays(7),
                'pelamar_lowongan_id' => null,
            ]);

            return redirect()
                ->route('superadmin.eventform')
                ->with('success', 'Event berhasil dihapus');
        } catch (\Exception $e) {

            /* =============================
            NOTIFIKASI GAGAL
        ==============================*/
            Notifikasi::create([
                'user_id' => Auth::id(),
                'perusahaan_id' => null,
                'judul' => 'Gagal Menghapus Event',
                'pesan' => 'Event gagal dihapus: ' . $e->getMessage(),
                'is_read' => 0,
                'expired_at' => now()->addDays(7),
                'pelamar_lowongan_id' => null,
            ]);

            return redirect()
                ->back()
                ->with('error', 'Gagal menghapus event.');
        }
    }


    //simpan kegiatan ke db
    protected function syncKegiatan(Event $event, Request $request)
    {
        // dd($request->input('kegiatan_waktu'), $request->input('kegiatan_nama'));

        $kegiatanW = $request->input('kegiatan_waktu', []);
        $kegiatanN = $request->input('kegiatan_nama', []);

        for ($i = 0; $i < count($kegiatanN); $i++) {
            $nama = trim($kegiatanN[$i] ?? '');
            $waktu = trim($kegiatanW[$i] ?? '');

            if ($nama !== '' || $waktu !== '') {
                $event->kegiatan()->create([
                    'waktu' => $waktu,
                    'kegiatan' => $nama,
                ]);
            }
        }
    }


    public function updateStatus(Request $request, Event $event)
    {
        $event->status = $request->status; // buka / tutup
        $event->save();

        return back()->with('success', 'Status event berhasil diperbarui.');
    }





    //ADMIN
    public function index_admin(Request $request)
    {
        $data = Event::query();

        if ($search = $request->query('q')) {
            $data->where('title', 'like', "%{$search}%");
        }

        $events = $data->orderBy('tgl_mulai', 'desc')->paginate(12);

        return view('admin.event.home', compact('events'));
    }

    public function createForm_admin()
    {
        return view('admin.event.buat-event');
    }

    public function store_event_admin(Request $request)
    {
        try {
            $validated = $request->validate([
                'title' => 'required|string|max:255',
                'status' => 'nullable|string',
                'image' => 'nullable|image|max:3072',
                'content' => 'nullable|string',
                'tgl_mulai' => 'required|date',
                'jam_mulai' => 'required|date_format:H:i',
                'tgl_akhir' => 'nullable|date|after_or_equal:tgl_mulai',
                'jam_akhir' => 'nullable|date_format:H:i',
                'kuota' => 'nullable|integer',
                'lokasi' => 'nullable|string|max:255',
                'link_form' => 'nullable|url',
                'penutupan_pendaftaran' => 'nullable|date|before_or_equal:tgl_mulai',
                'kegiatan_waktu.*' => 'nullable|date_format:H:i',
                'kegiatan_nama.*' => 'nullable|string|max:255',
            ]);

            // Handle image
            if ($request->hasFile('image')) {
                $validated['image'] = $request->file('image')->store('events', 'public');
            }

            // Simpan event
            $eventData = collect($validated)->except(['kegiatan_waktu', 'kegiatan_nama'])->toArray();
            $event = Event::create($eventData);

            // Simpan kegiatan
            $this->syncKegiatan($event, $request);

            /* =============================
            NOTIFIKASI BERHASIL
        ==============================*/
            Notifikasi::create([
                'user_id' => Auth::id(),
                'perusahaan_id' => null,
                'judul' => 'Event Baru Ditambahkan',
                'pesan' => 'Event <b>' . $event->title . '</b> berhasil ditambahkan.',
                'is_read' => 0,
                'expired_at' => now()->addDays(7),
                'pelamar_lowongan_id' => null,
            ]);

            return redirect()->route('admin.eventform', $event->id)
                ->with('success', 'Event berhasil ditambahkan');
        } catch (\Exception $e) {

            /* =============================
            NOTIFIKASI GAGAL
        ==============================*/
            Notifikasi::create([
                'user_id' => Auth::id(),
                'perusahaan_id' => null,
                'judul' => 'Gagal Menambahkan Event',
                'pesan' => 'Event gagal ditambahkan: ' . $e->getMessage(),
                'is_read' => 0,
                'expired_at' => now()->addDays(7),
                'pelamar_lowongan_id' => null,
            ]);

            return redirect()->back()
                ->with('error', 'Gagal menambahkan event.')
                ->withInput();
        }
    }


    public function detail_admin(Event $event)
    {
        $event->load('kegiatan');
        return view('admin.event.detail-event', compact('event'));
    }

    public function edit_admin(Event $event)
    {
        $event->load('kegiatan');
        return view('admin.event.edit', compact('event'));
    }

    public function update_event_admin(Request $request, Event $event)
    {
        try {
            $validated = $request->validate([
                'title' => 'required|string|max:255',
                'status' => 'nullable|string',
                'image' => 'nullable|image|max:3072',
                'content' => 'nullable|string',
                'tgl_mulai' => 'required|date',
                'jam_mulai' => 'required|date_format:H:i',
                'tgl_akhir' => 'nullable|date|after_or_equal:tgl_mulai',
                'jam_akhir' => 'nullable|date_format:H:i',
                'kuota' => 'nullable|integer',
                'lokasi' => 'nullable|string|max:255',
                'link_form' => 'nullable|url',
                'penutupan_pendaftaran' => 'nullable|date|before_or_equal:tgl_mulai',
            ]);

            if ($request->hasFile('image')) {
                if ($event->image) {
                    Storage::disk('public')->delete($event->image);
                }
                $validated['image'] = $request->file('image')->store('events', 'public');
            }

            $event->update($validated);

            // Hapus kegiatan lama & simpan baru
            $event->kegiatan()->delete();
            $this->syncKegiatan($event, $request);

            // Notifikasi berhasil update
            Notifikasi::create([
                'user_id' => Auth::id(),
                'perusahaan_id' => null,
                'judul' => 'Event Diperbarui',
                'pesan' => 'Event <b>' . $event->title . '</b> berhasil diperbarui.',
                'is_read' => 0,
                'expired_at' => now()->addDays(7),
                'pelamar_lowongan_id' => null,
            ]);

            return redirect()->route('admin.detail.event', $event->id)
                ->with('success', 'Event berhasil diperbarui');
        } catch (\Exception $e) {
            // Notifikasi gagal update
            Notifikasi::create([
                'user_id' => Auth::id(),
                'perusahaan_id' => null,
                'judul' => 'Gagal Memperbarui Event',
                'pesan' => 'Event <b>' . $event->title . '</b> gagal diperbarui: ' . $e->getMessage(),
                'is_read' => 0,
                'expired_at' => now()->addDays(7),
                'pelamar_lowongan_id' => null,
            ]);

            return redirect()->back()
                ->with('error', 'Gagal memperbarui event.')
                ->withInput();
        }
    }

    public function destroy_admin(Event $event)
    {
        try {
            if ($event->image) {
                Storage::disk('public')->delete($event->image);
            }
            $event->kegiatan()->delete();
            $event->delete();

            // Notifikasi berhasil hapus
            Notifikasi::create([
                'user_id' => Auth::id(),
                'perusahaan_id' => null,
                'judul' => 'Event Dihapus',
                'pesan' => 'Event <b>' . $event->title . '</b> berhasil dihapus.',
                'is_read' => 0,
                'expired_at' => now()->addDays(7),
                'pelamar_lowongan_id' => null,
            ]);

            return redirect()->route('admin.eventform')
                ->with('success', 'Event berhasil dihapus');
        } catch (\Exception $e) {
            // Notifikasi gagal hapus
            Notifikasi::create([
                'user_id' => Auth::id(),
                'perusahaan_id' => null,
                'judul' => 'Gagal Menghapus Event',
                'pesan' => 'Event <b>' . $event->title . '</b> gagal dihapus: ' . $e->getMessage(),
                'is_read' => 0,
                'expired_at' => now()->addDays(7),
                'pelamar_lowongan_id' => null,
            ]);

            return redirect()->back()
                ->with('error', 'Gagal menghapus event.');
        }
    }



    public function updateStatusAdmin(Request $request, Event $event)
    {
        $event->status = $request->status; // buka / tutup
        $event->save();

        return back()->with('success', 'Status event berhasil diperbarui.');
    }
}
