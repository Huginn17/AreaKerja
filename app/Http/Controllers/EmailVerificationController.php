<?php

namespace App\Http\Controllers;

use App\Mail\NewEmailVerificationMail;
use App\Models\EmailVerification;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class EmailVerificationController extends Controller
{
    // Form ganti email
    public function showChangeEmailForm()
    {
        if (!session('otp_verified')) {
            return abort(403, 'Akses ditolak.');
        }

        session()->forget('otp_verified');
        return view('auth.ganti-email');
    }

    // Kirim token verifikasi
    public function sendVerification(Request $request)
    {
        // Ambil user (login / non-login)
        if (Auth::check()) {
            $user = Auth::user();
            $request->validate([
                'new_email' => 'required|email|unique:users,email',
            ]);
        } else {
            $request->validate([
                'old_email' => 'required|email|exists:users,email',
                'new_email' => 'required|email|unique:users,email',
            ]);
            $user = User::where('email', $request->old_email)->first();
        }

        if (!$user) {
            return back()->withErrors(['old_email' => 'User tidak ditemukan.']);
        }

        $newEmail = $request->new_email;
        $token = Str::random(64);

        // Hapus token lama untuk user ini
        EmailVerification::where('user_id', $user->id)->delete();

        // Simpan record verifikasi
        EmailVerification::create([
            'user_id'   => $user->id,
            'new_email' => $newEmail,
            'token'     => $token,
        ]);

        // Kirim email verifikasi
        Mail::to($newEmail)->send(new NewEmailVerificationMail($user, $newEmail, $token));

        return redirect()->route('login')->with('success', 'Link verifikasi telah dikirim ke ' . $newEmail);
    }

    // Verifikasi klik link
    public function verify($token)
    {
        $verif = EmailVerification::where('token', $token)->first();

        if (!$verif) {
            return redirect()->route('login')->withErrors(['email' => 'Token verifikasi tidak valid.']);
        }

        // Cek kadaluarsa 60 menit
        if (Carbon::now()->diffInMinutes($verif->created_at) > 60) {
            $verif->delete();
            return redirect()->route('login')->withErrors(['email' => 'Token verifikasi telah kadaluarsa.']);
        }

        // Cek apakah email baru sudah dipakai orang lain
        if (User::where('email', $verif->new_email)->exists()) {
            $verif->delete();
            return redirect()->route('login')->withErrors(['email' => 'Email baru sudah digunakan orang lain.']);
        }

        // Update email user
        $user = $verif->user;
        $user->email = $verif->new_email;
        $user->save();

        // Bersihkan record verifikasi
        EmailVerification::where('user_id', $user->id)->delete();

        return redirect()->route('login')->with('success', 'Email berhasil diperbarui. Silakan login.');
    }
}
