<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class SuperAdminController extends Controller
{
    public function index()
    {
        return view('super_admin.dashboard');
    }




    //PROFILE
    public function edit_profile()
    {
        //   $user = auth()->user();
        $users = User::all();
        return view('super_admin.profile', compact('users'));
    }
    public function update_profile(Request $request)
    {

        
        $request->validate([
            'email' => 'required|email',
            'username' => 'required|string|max:255',
            'name' => 'required|string|max:255',
            'provinsi' => 'required|string',
            'kota' => 'required|string',
            'kecamatan' => 'required|string',
            'desa' => 'required|string',
            'kode_pos' => 'required|string',
            'detail_lainnya' => 'nullable|string',
        ]);

        $user = auth()->user();
        // $user->update($request->all());

        return redirect()->route('superadmin.profile')->with('success', 'Profile updated successfully.');
    }
}
