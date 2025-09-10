<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
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
        // dd($request->all());
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
        // dd($request->input('kegiatan_waktu'), $request->input('kegiatan_nama'));
        $eventData = collect($validated)->except(['kegiatan_waktu', 'kegiatan_nama'])->toArray();

        $event = Event::create($eventData);

        // Simpan kegiatan
        $this->syncKegiatan($event, $request);

        return redirect()->route('superadmin.eventform', $event->id)->with('success', 'Event berhasil ditambahkan');
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
            // 'kegiatan_waktu.*' => 'nullable|date_format:H:i',
            // 'kegiatan_nama.*' => 'nullable|string|max:255',
        ]);

        if ($request->hasFile('image')) {
            if ($event->image) {
                Storage::disk('public')->delete($event->image);
            }
            $validated['image'] = $request->file('image')->store('events', 'public');
        }

        $event->update($validated);

        //update hapus lama buat baru
        $event->kegiatan()->delete();

        //simpan kegiatan
        $this->syncKegiatan($event, $request);

        return redirect()->route('superadmin.detail.event', $event->id)->with('success', 'Event berhasil diperbarui');
    }

    public function destroy(Event $event)
    {
        if ($event->image) {
            Storage::disk('public')->delete($event->image);
        }
        $event->kegiatan()->delete();
        $event->delete();
        return redirect()->route('superadmin.eventform')->with('success', 'Event berhasil dihapus');
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
        // dd($request->all());
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
        // dd($request->input('kegiatan_waktu'), $request->input('kegiatan_nama'));
        $eventData = collect($validated)->except(['kegiatan_waktu', 'kegiatan_nama'])->toArray();

        $event = Event::create($eventData);

        // Simpan kegiatan
        $this->syncKegiatan($event, $request);

        return redirect()->route('admin.eventform', $event->id)->with('success', 'Event berhasil ditambahkan');
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
            // 'kegiatan_waktu.*' => 'nullable|date_format:H:i',
            // 'kegiatan_nama.*' => 'nullable|string|max:255',
        ]);

        if ($request->hasFile('image')) {
            if ($event->image) {
                Storage::disk('public')->delete($event->image);
            }
            $validated['image'] = $request->file('image')->store('events', 'public');
        }

        $event->update($validated);

        //update hapus lama buat baru
        $event->kegiatan()->delete();

        //simpan kegiatan
        $this->syncKegiatan($event, $request);

        return redirect()->route('admin.detail.event', $event->id)->with('success', 'Event berhasil diperbarui');
    }

     public function destroy_admin(Event $event)
    {
        if ($event->image) {
            Storage::disk('public')->delete($event->image);
        }
        $event->kegiatan()->delete();
        $event->delete();
        return redirect()->route('admin.eventform')->with('success', 'Event berhasil dihapus');
    }
}
