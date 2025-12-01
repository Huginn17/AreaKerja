<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UploadController extends Controller
{
    public function tinymceUpload(Request $request)
    {
        if (!$request->hasFile('file')) {
            return response()->json(['error' => 'No file uploaded'], 422);
        }

        $image = $request->file('file');
        $path = $image->store('tinymce', 'public'); // disimpan ke storage/app/public/tinymce

        return response()->json([
            'location' => asset('storage/' . $path) // URL untuk TinyMCE
        ]);
    }

    public function tinymceMention(Request $request)
    {
        $search = $request->q ?? '';

        // Ambil user dari database berdasarkan nama seperti query
        $users = \App\Models\User::where('username', 'like', "%{$search}%")
            ->limit(10)
            ->get(['id', 'username']);

        // Format untuk TinyMCE Mentions
        $result = $users->map(function ($user) {
            return [
                'id' => $user->id,
                'name' => $user->username
            ];
        });

        return response()->json($result);
    }
}
