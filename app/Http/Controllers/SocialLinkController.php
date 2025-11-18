<?php

namespace App\Http\Controllers;

use App\Models\SocialLink;
use Illuminate\Http\Request;

class SocialLinkController extends Controller
{
    public function index()
    {
        // Ambil hanya social media yang diizinkan
        $allowed = ['Facebook', 'Youtube', 'Instagram', 'Linkedin', 'Twitter'];

        $socials = SocialLink::whereIn('nama', $allowed)->get();

        // Ambil header image berdasarkan nama: header_*
        $headers = SocialLink::where('nama', 'like', 'header_%')->get();

        // Jika data social media belum ada, buat default-nya
        if ($socials->count() === 0) {
            foreach ($allowed as $nama) {
                SocialLink::create([
                    'nama' => $nama,
                    'link' => null
                ]);
            }

            // Reload setelah insert
            $socials = SocialLink::whereIn('nama', $allowed)->get();
        }

        return view('super_admin.social.banner', [
            'socials' => $socials,
            'headers' => $headers
        ]);
    }


    public function update(Request $request)
    {
        foreach ($request->links as $id => $link) {
            SocialLink::where('id', $id)->update(['link' => $link]);
        }
        return back()->with('success', 'Berhasil Mengupdate Social Link');
    }

    public function index_footer()
    {
        $socialLinks = SocialLink::all();
        return view('layouts.footer', [
            'socialLinks' => $socialLinks
        ]);
    }


    //IMAGE HEADER

    public function headerImageUpdate(Request $request, $nama)
    {
        $header = SocialLink::where('nama', $nama)->firstOrFail();

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('images', 'public');


            $header->update([
                'link' => $path
            ]);
        }

        return back()->with('success', 'Header berhasil diperbarui');
    }
}
