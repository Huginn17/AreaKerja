<?php

namespace App\Http\Controllers;

use App\Models\SocialLink;
use Illuminate\Http\Request;

class SocialLinkController extends Controller
{
    public function index()
    {
        $socials = SocialLink::all();

        if ($socials->count() === 0) {
            $default = ['Facebook', 'Youtube', 'Instagram', 'Linkedin', 'Twitter'];
            foreach ($default as $nama) {
                SocialLink::create(['nama' => $nama, 'link' => null]);
            }
            $socials = SocialLink::all();
        }

        return view('super_admin.social.banner', [
            'socials' => $socials
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
        return view('layouts.footer',[
            'socialLinks' => $socialLinks
        ]);
    }
}
