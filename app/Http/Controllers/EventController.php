<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EventController extends Controller
{
    public function index()
    {
        $events = Event::latest()->get();
        return view('super_admin.event.home', compact('events'));
    }

    public function createForm()
    {
        return view('super_admin.event.buat');
    }

    public function store_event(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'kuota' => 'nullable|integer',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'content' => 'nullable|string',
            'tgl_mulai' => 'required|date',
            'jam_mulai' => 'required|string',
            'tgl_akhir' => 'required|date',
            'jam_akhir' => 'required|string',
            'lokasi' => 'nullable|string|max:255',
            'link_form' => 'nullable|string|max:255',
            'penutupan_pendaftaran' => 'nullable|date',
        ]);

        $data = $request->all();

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('events', 'public');
        }

        $data['status'] = 'Buka';

        Event::create($data);
        return redirect()->route('superadmin.event')->with('success', 'Event berhasil dibuat');
    }

    public function detail(Event $event)
    {
        return view('super_admin.event.view', compact('event'));
    }

    public function edit(Event $event)
    {
        return view('super_admin.event.edit', compact('event'));
    }

    public function update_event(Request $request, Event $event)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'kuota' => 'nullable|integer',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'content' => 'nullable|string',
            'tgl_mulai' => 'required|date',
            'jam_mulai' => 'required|string',
            'tgl_akhir' => 'required|date',
            'jam_akhir' => 'required|string',
            'lokasi' => 'nullable|string|max:255',
            'link_form' => 'nullable|string|max:255',
            'penutupan_pendaftaran' => 'nullable|date',
        ]);

        $data = $request->all();

        if ($request->hasFile('image')) {
            if ($event->image && Storage::disk('public')->exists($event->image)) {
                Storage::disk('public')->delete($event->image);
            }
            $data['image'] = $request->file('image')->store('events', 'public');
        }

        $event->update($data);

        return redirect()->route('superadmin.event')->with('success', 'Event berhasil diperbarui');
    }

    public function destroy(Event $event)
    {
        if ($event->image && Storage::disk('public')->exists($event->image)) {
            Storage::disk('public')->delete($event->image);
        }
        $event->delete();
        return redirect()->route('superadmin.event')->with('success', 'Event berhasil dihapus');
    }
}
