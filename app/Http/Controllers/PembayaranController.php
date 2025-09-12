<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PembayaranController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'bank' => 'required|string|max:255',
            'nama' => 'required|string|max:255',
            'nomor' => 'required|string|max:255',
            'logo_image' => 'nullable|image|mimes:png,jpg,jpeg|max:2048',
        ]);

        $data = $request->only(['bank', 'nama', 'nomor']);

         if ($request->hasFile('logo_image')) {
            $data['logo_image'] = $request->file('logo_image')->store('logos', 'public');
        }
    }
}
