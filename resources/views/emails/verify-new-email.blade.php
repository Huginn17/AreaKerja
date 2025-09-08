@component('mail::message')
# 📧 Verifikasi Email Baru

Halo **{{ $user->username ?? $user->name ?? $user->email }}**,  

Kami menerima permintaan untuk mengubah email akun Anda menjadi:  
**{{ $new_email }}**

Silakan klik tombol di bawah untuk mengonfirmasi perubahan:

@component('mail::button', ['url' => route('email.verify', ['token' => $token]), 'color' => 'success'])
✅ Verifikasi Email Baru
@endcomponent

---

Jika tombol di atas tidak berfungsi, salin dan buka link berikut di browser Anda:  

[{{ route('email.verify', ['token' => $token]) }}]({{ route('email.verify', ['token' => $token]) }})

> ⚠️ Link ini hanya berlaku selama **60 menit**.

Apabila Anda tidak merasa melakukan permintaan ini, abaikan saja email ini. Email lama Anda akan tetap aman.

Terima kasih,  
**Tim AreaKerja**
@endcomponent
