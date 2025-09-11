<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AlamatPelamarController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\EmailVerificationController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\HargaController;
use App\Http\Controllers\LupaPasswordController;
use App\Http\Controllers\PelamarController;
use App\Http\Controllers\PengalamanKerjaController;
use App\Http\Controllers\PengalamanOrgController;
use App\Http\Controllers\PerusahaanController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SkillController;
use App\Http\Controllers\SuperAdminController;
use App\Http\Controllers\TipsKerjaController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get({{  }}st-otp/{email}', function ($email) {
//     try {
//         // generate OTP
//         $otp = rand(100000, 999999);
//         $token = Str::random(64);
//   
//         // kirim email
//         Mail::raw("Kode OTP Anda adalah: {$otp}\nToken: {$token}", function ($message) use ($email) {
//             $message->to($email)
//                 ->subject("Test OTP Laravel");
//         });
//              
//         return "✅ OTP berhasil dikirim ke {$email}. Cek inbox/spam Gmail kamu.";
//     } catch (\Exception $e) {
//         return "❌ Gagal mengirim OTP: " . $e->getMessage();
//     }
// });



//NON USER
Route::get('/', function () {
    return view('non-user.home');
});
Route::get('/beranda', [AuthController::class, 'beranda'])->name('beranda');

//LOGIN AUTH
Route::middleware('guest')->group(function () {

    Route::get('/login', [AuthController::class, 'login_non_user'])->name('login');
    Route::post('/loginproses', [AuthController::class, 'loginproses'])->name('loginproses');
});
Route::get('/home', [PelamarController::class, 'index'])->name('beranda')->middleware('role:pelamar');

Route::middleware('auth')->group(function () {

    Route::post('/logout', [AuthController::class, 'logout_pelamar'])->name('logout_pelamar');
});

Route::get('/register', [AuthController::class, 'regis_non_user'])->name('register');
Route::post('/registerproses', [AuthController::class, 'regis_proses'])->name('registerproses');

//VERFIKASI PASSWORD
Route::get('/verifikasi', [LupaPasswordController::class, 'showEmailForm_pelamar'])->name('verifikasi_pelamar');
Route::post('/verifikasi', [LupaPasswordController::class, 'sendOtp'])->name('password.email.pelamar');

Route::get('/verifikasi/otp/{token}', [LupaPasswordController::class, 'showOtpForm_pelamar'])->name('password.otp.form.pelamar');
Route::post('/verifikasi/otp', [LupaPasswordController::class, 'verifyOtp'])->name('password.otp.verif.pelamar');

Route::get('/reset-password/{token}', [LupaPasswordController::class, 'showResetForm_pelamar'])->name('password.reset.form.pelamar');
Route::post('/reset-password', [LupaPasswordController::class, 'resetPassword'])->name('password.update.pelamar');

//VERIFIKASI EMAIL
Route::get('email/ubah', [EmailVerificationController::class, 'showChangeEmailForm'])->name('email.ubah');
Route::post('/email/send-verification', [EmailVerificationController::class, 'sendVerification'])->name('email.send.verification');
Route::get('/email/verify/{token}', [EmailVerificationController::class, 'verify'])->name('email.verify');


//CRUD PROFILE
Route::prefix('pelamar')->middleware('auth', 'role:pelamar', 'CheckUserStatus')->group(function () {

    Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index')->middleware('auth');
    Route::put('/update/profile/{pelamar:id}', [ProfileController::class, 'update_profile'])->name('profile.update')->middleware('auth');
    Route::delete('/delete/profile/{pelamar:id}', [ProfileController::class, 'destroy_profile'])->name('profile.destroy');


    //ALAMAT PELAMAR
    Route::get('/alamat', [ProfileController::class, 'alamat'])->name('alamat')->middleware('auth');
    Route::get('/form/alamat', [ProfileController::class, 'form_alamat'])->name('form_alamat')->middleware('auth');
    Route::post('/create/alamat', [ProfileController::class, 'store_alamat'])->name('alamat.store')->middleware('auth');
    Route::get('/edit/alamat/{alamatpelamar:id}', [ProfileController::class, 'edit_alamat'])->name('alamat.edit')->middleware('auth');
    Route::put('/update/alamat/{alamatpelamar:id}', [ProfileController::class, 'update_alamat'])->name('alamat.update')->middleware('auth');
    Route::delete('/delete/alamat/{alamatpelamar:id}', [ProfileController::class, 'destroy_alamat'])->name('alamat.destroy')->middleware('auth');


    //pengalaman organisasi
    Route::post('/create/organisasi', [PengalamanOrgController::class, 'store'])->name('organisasi.store')->middleware('auth');
    Route::get('/edit/organisasi/{organisasi:id}', [PengalamanOrgController::class, 'edit'])->name('organisasi.edit')->middleware('auth');
    Route::put('/update/organisasi/{organisasi:id}', [PengalamanOrgController::class, 'update'])->name('organisasi.update')->middleware('auth');
    Route::delete('/delete/organisasi/{organisasi:id}', [PengalamanOrgController::class, 'destroy'])->name('organisasi.destroy')->middleware('auth');


    //pengalaman kerja
    Route::post('/create/kerja', [PengalamanKerjaController::class, 'store'])->name('kerja.store')->middleware('auth');
    Route::get('/edit/kerja/{kerja:id}', [PengalamanKerjaController::class, 'edit'])->name('kerja.edit')->middleware('auth');
    Route::put('/update/kerja/{kerja:id}', [PengalamanKerjaController::class, 'update'])->name('kerja.update')->middleware('auth');
    Route::delete('/delete/kerja/{kerja:id}', [PengalamanKerjaController::class, 'destroy'])->name('kerja.destroy')->middleware('auth');


    //SKILL
    Route::post('/create/skill', [SkillController::class, 'store'])->name('skill.store')->middleware('auth');
    Route::get('/edit/skill/{skill:id}', [SkillController::class, 'edit'])->name('skill.edit')->middleware('auth');
    Route::put('/update/skill/{skill:id}', [SkillController::class, 'update'])->name('skill.update')->middleware('auth');
    Route::delete('/delete/skill/{skill:id}', [SkillController::class, 'destroy'])->name('skill.destroy')->middleware('auth');
});

Route::get('/lowongan', function () {
    return view('non-user.pasang-lowongan');
}); { {
    }
}
Route::get('/daftar-kandidat', function () {
    return view('non-user.daftar-kandidat');
});
Route::get('/talent-hunter', function () {
    return view('non-user.talent-hunter');
});
Route::get('/tips1', function () {
    return view('non-user.tips-kerja1');
});
Route::get('/tips-kerja', function () {
    return view('non-user.tips-kerja');
});



Route::get('/bantuan', function () {
    return view('non-user.faq');
});

Route::get('/lowongan-tersimpan', function () {
    return view('non-user.lowongan-tersimpan');
});
Route::get('/lowongan-detail', function () {
    return view('non-user.lowongan-detail');
});



//SYARAT DAN KETENTUAN
Route::get('/syarat/ketentuan', function () {
    return view('layouts.syarat-dan-ketentuan');
});





//kandidat
Route::get('/form-divisi', function () {
    return view('kandidat.form-divisi');
});
Route::get('/form-metode-pembayaran', function () {
    return view('kandidat.form-metode-pembayaran');
});
Route::get('/metode-qris', function () {
    return view('kandidat.metode-qris');
});
Route::get('/konfir-bank', function () {
    return view('kandidat.konfir-bank');
});
Route::get('/konfir-qr', function () {
    return view('kandidat.konfir-qr');
});
Route::get('/tran-tf-kosong', function () {
    return view('kandidat.transaksi-kosong');
});
Route::get('/tran-tf-bank', function () {
    return view('kandidat.transaksi-tf-bank');
});
Route::get('/tran-tf-qr', function () {
    return view('kandidat.transaksi-tf-qr');
});
Route::get('/saya-rekrut', function () {
    return view('kandidat.rekrut-saya');
});







//Finance
Route::middleware('guest')->group(function () {

    Route::get('/finance/login', [AuthController::class, 'login_finance'])->name('finance.login');
    Route::post('/finance/loginproses', [AuthController::class, 'loginproses_finance'])->name('loginproses_finance');

    Route::post('/finance/registerproses', [AuthController::class, 'regis_proses_finance'])->name('registerproses_finance');
    Route::get('/finance/register', [AuthController::class, 'regis_finance'])->name('finance.register');
});

Route::middleware('auth')->group(function () {
    Route::post('/logout/finance', [AuthController::class, 'logout_finance'])->name('logout_finance');
});

Route::prefix('finance')->middleware('auth', 'role:finance', 'CheckUserStatus')->group(function () {
    Route::get('/dashboard', [AuthController::class, 'beranda_finance'])->name('finance.dashboard');

    // Route::get('/verifikasi', [AuthController::class, 'verif_finance']);
    // Route::get('/verif-otp', [AuthController::class, 'verifotp_finance']);
    // Route::get('/verif-lupapw', [AuthController::class, 'veriflupapw_finance']);


    //PAKET HARGA
    Route::get('/paket/harga', [HargaController::class, 'index'])->name('finance.paket-harga');

    Route::get('/paketharga/edit/koin', [HargaController::class, 'edit_koin'])->name('finance.paket-harga.edit-koin');
    Route::put('/update/harga/koin', [HargaController::class, 'update_koin'])->name('finance.paket-harga.update-koin');

    Route::get('/paketharga/edit/harga', [HargaController::class, 'edit_pembayaran'])->name('finance.paket-harga.edit-pembayaran');
    Route::put('/update/harga/harga', [HargaController::class, 'update_pembayaran'])->name('finance.paket-harga.update-pembayaran');
});

Route::get('/finance/omset/perusahaan', function () {
    return view('finance.omset-perusahaan');
})->name('finance.omset-perusahaan');

Route::get('/finance/page/unduh/omset', function () {
    return view('finance.page-unduh-omset');
})->name('finance.page-unduh-omset');

Route::get('/finance/unduh/data/omset', function () {
    return view('finance.unduh-data-omset');
})->name('finance.unduh-data-omset');

Route::get('/finance/catatan/transaksi', function () {
    return view('finance.catatan-tran');
})->name('finance.catatan-tran');

Route::get('/finance/laporan/transaksi', function () {
    return view('finance.laporan-tran');
})->name('finance.laporan-tran');

Route::get('/finance/laporan/transaksi2', function () {
    return view('finance.laporan-tran2');
})->name('finance.laporan-tran2');



//Admin
Route::middleware('guest')->group(function () {

    Route::get('/admin/login', [AuthController::class, 'login_admin'])->name('admin.login');
    Route::post('/admin/loginproses', [AuthController::class, 'loginproses_admin'])->name('loginproses_admin');

    Route::post('/admin/registerproses', [AuthController::class, 'regis_proses_admin'])->name('registerproses_admin');
    Route::get('/admin/register', [AuthController::class, 'regis_admin'])->name('admin.register');
});

Route::middleware('auth')->group(function () {
    Route::post('/logout/admin', [AuthController::class, 'logout_admin'])->name('logout_admin');
});


Route::prefix('admin')->middleware('auth', 'role:admin', 'CheckUserStatus')->group(function () {
    Route::get('/dashboard', [AuthController::class, 'beranda_admin'])->name('admin.dashboard');

    //PROFILE ADMIN
    Route::get('/profile', [AdminController::class, 'profile_admin'])->name('admin.profile');
    Route::get('/edit/profile', [AdminController::class, 'edit_profile'])->name('admin.edit.profile');
    Route::put('/update/profile/{admin:id}', [AdminController::class, 'update_profile_admin'])->name('admin.update.profile');
    Route::delete('/delete/profile/{admin:id}', [AdminController::class, 'destroy_profile'])->name('admin.destroy.profile');

    // Route::get('/login', [AuthController::class, 'login_admin']);
    // Route::get('/register', [AuthController::class, 'regis_admin']);
    Route::get('/verifikasi', [AuthController::class, 'verif_admin']);
    Route::get('/verif-otp', [AuthController::class, 'verifotp_admin']);
    Route::get('/verif-lupapw', [AuthController::class, 'veriflupapw_admin']);

    //TIPS KERJA POST
    Route::get('/tips/kerja', [TipsKerjaController::class, 'index'])->name('admin.tips-kerja');
    Route::post('/tips/kerja/', [TipsKerjaController::class, 'store_tips_kerja'])->name('admin.tips-kerja.store');
    Route::get('/tips/kerja/create', [TipsKerjaController::class, 'tips_kerja_buat_post'])->name('admin.tips-kerja.createForm');
    Route::put('/update/status/', [TipsKerjaController::class, 'update_status'])->name('admin.tips-kerja.update.status');
    Route::delete('/delete', [TipsKerjaController::class, 'destroy'])->name('admin.tips-kerja.destroy');

    //EVENT
    Route::get('/event', [EventController::class, 'index_admin'])->name('admin.eventform');
    Route::post('/event/store', [EventController::class, 'store_event_admin'])->name('admin.event.store');
    Route::get('/event/create', [EventController::class, 'createForm_admin'])->name('admin.event.createForm');
    Route::put('/update/event/{event}', [EventController::class, 'update_event_admin'])->name('admin.event.update');
    Route::get('/event/{event}', [EventController::class, 'detail_admin'])->name('admin.detail.event');
    Route::get('/event/{event}/edit', [EventController::class, 'edit_admin'])->name('admin.edit.event');
    Route::delete('/delete/event/{event}', [EventController::class, 'destroy_admin'])->name('admin.event.destroy');
});

Route::get('/admin/pelamar', function () {
    return view('admin.pelamar');
});
Route::get('/admin/detail/data/kandidat', function () {
    return view('admin.detail-data-kandidat');
});
Route::get('/admin/detail/data/non/kandidat', function () {
    return view('admin.detail-data-non-kandidat');
});
Route::get('/admin/detail/data/calon/kandidat', function () {
    return view('admin.detail-data-calon-kandidat');
});
Route::get('/admin/detail/manajemen/recruitmen', function () {
    return view('admin.detail-manajemen-recruitmen');
});
Route::get('/admin/detail/data/talent/hunter', function () {
    return view('admin.detail-data-talent-hunter');
});

Route::get('/admin/pelamar', function () {
    return view('admin.pelamar');
});

Route::get('/admin/non/kandidat', function () {
    return view('admin.non-kandidat');
});

Route::get('/admin/calon/kandidat', function () {
    return view('admin.calon-kandidat');
});

Route::get('/admin/perusahaan', function () {
    return view('admin.perusahaan');
});
Route::get('/admin/recruitment', function () {
    return view('admin.recruitment');
});
Route::get('/admin/talenthunter', function () {
    return view('admin.talenthunter');
});
Route::get('/admin/finance/koin', function () {
    return view('admin.finance-koin');
});
Route::get('/admin/finance/tunai', function () {
    return view('admin.finance-tunai');
});
Route::get('/admin/finance', function () {
    return view('admin.finance');
});
Route::get('/admin/bukti/koin', function () {
    return view('admin.bukti-koin');
});
Route::get('/admin/bukti/tunai', function () {
    return view('admin.bukti-tunai');
});

Route::get('/admin/buat/post', function () {
    return view('admin.buat-post');
});


//admin event
Route::get('/admin/event/home', function () {
    return view('admin.event.home');
});

Route::get('/admin/event/buat', function () {
    return view('admin.event.buat-event');
});

Route::get('/admin/detail/event', function () {
    return view('admin.event.detail-event');
});
Route::get('/admin/detail/data/perusahaan', function () {
    return view('admin.detail-data-perusahaan');
});
Route::get('/admin/view/data/lowongan', function () {
    return view('admin.view-data-lowongan');
});
Route::get('/admin/view/talent/hunter', function () {
    return view('admin.view-talent');
});

//Super Admin
Route::middleware('guest')->group(function () {

    Route::get('/super_admin/login', [AuthController::class, 'login_superadmin'])->name('superadmin.login');
    Route::post('/super_admin/loginproses', [AuthController::class, 'loginproses_superadmin'])->name('loginproses_superadmin');

    Route::post('/super_admin/registerproses', [AuthController::class, 'regis_proses_superadmin'])->name('registerproses_superadmin');
    Route::get('/super_admin/register', [AuthController::class, 'regis_super_admin'])->name('superadmin.register');
});

Route::middleware('auth')->group(function () {
    Route::post('/logout/superadmin', [AuthController::class, 'logout_superadmin'])->name('logout_superadmin');
});



Route::prefix('super_admin')->middleware('auth', 'role:super_admin', 'CheckUserStatus')->group(function () {
    Route::get('/dashboard', [SuperAdminController::class, 'index'])->name('superadmin.dashboard');


    //Profile
    Route::get('/profile', [SuperAdminController::class, 'profile_superadmin'])->name('superadmin.profile');
    Route::get('/edit/profile', [SuperAdminController::class, 'edit_profile'])->name('superadmin.edit.profile');
    Route::put('/update/profile/{superadmin:id}', [SuperAdminController::class, 'update_profile_superadmin'])->name('superadmin.update.profile');
    Route::delete('/delete/profile/{superadmin:id}', [SuperAdminController::class, 'destroy_profile'])->name('superadmin.destroy.profile');

    //FREEZE AKUN   
    Route::get('/freeze', [SuperAdminController::class, 'freezeForm'])->name('superadmin.freeze');
    Route::get('/freeze/detail/{user:id}', [SuperAdminController::class, 'detail_freeze'])->name('superadmin.detail.freeze');
    Route::put('/freeze/ban/{user:id}', [SuperAdminController::class, 'ban'])->name('superadmin.ban.freeze');
    Route::put('/freeze/unban/{user:id}', [SuperAdminController::class, 'unban'])->name('superadmin.unban.freeze');
    Route::delete('/delete/akun/{user:id}', [SuperAdminController::class, 'delete_akun'])->name('superadmin.delete.akun');


    //TIPS KERJA POST
    Route::get('/tips/kerja', [TipsKerjaController::class, 'index_superadmin'])->name('superadmin.tips-kerja');
    Route::post('/tips/kerja/', [TipsKerjaController::class, 'store_tips_kerja_superadmin'])->name('superadmin.tips-kerja.store');
    Route::get('/tips/kerja/create', [TipsKerjaController::class, 'tips_kerja_buat_post_superadmin'])->name('superadmin.tips-kerja.createForm');
    Route::put('/update/status/', [TipsKerjaController::class, 'update_status_superadmin'])->name('superadmin.tips-kerja.update.status');
    Route::delete('/delete', [TipsKerjaController::class, 'destroy_superadmin'])->name('superadmin.tips-kerja.destroy');

    //EVENT
    Route::get('/event', [EventController::class, 'index'])->name('superadmin.eventform');
    Route::post('/event/store', [EventController::class, 'store_event'])->name('superadmin.event.store');
    Route::get('/event/create', [EventController::class, 'createForm'])->name('superadmin.event.createForm');
    Route::put('/update/event/{event}', [EventController::class, 'update_event'])->name('superadmin.event.update');
    Route::get('/event/{event}', [EventController::class, 'detail'])->name('superadmin.detail.event');
    Route::get('/event/{event}/edit', [EventController::class, 'edit'])->name('superadmin.edit.event');
    Route::delete('/delete/event/{event}', [EventController::class, 'destroy'])->name('superadmin.event.destroy');
});


Route::get('/super_admin/verifikasi', [AuthController::class, 'verif_super_admin']);
Route::get('/super_admin/verif-otp', [AuthController::class, 'verifotp_super_admin']);
Route::get('/super_admin/verif-lupapw', [AuthController::class, 'veriflupapw_super_admin']);




Route::get('/super_admin/edit-profile', function () {
    return view('super_admin.edit-profile-superadmin');
});

Route::get('/super_admin/data-pelamar', function () {
    return view('super_admin.data-pelamar');
});

Route::get('/super_admin/data-non-kandidat', function () {
    return view('super_admin.data-non-kandidat');
});

Route::get('/super_admin/data-calon-kandidat', function () {
    return view('super_admin.data-calon-kandidat');
});

Route::get('/super_admin/tambah-kandidat', function () {
    return view('super_admin.tambah-kandidat-superadmin');
});

Route::get('/super_admin/detail-kandidat', function () {
    return view('super_admin.detail-kandidat');
});

Route::get('/super_admin/data-perusahaan', function () {
    return view('super_admin.data-perusahaan');
});

Route::get('/super_admin/data-talent-hunter', function () {
    return view('super_admin.data-talent-hunter');
});

Route::get('/super_admin/data-panggilan', function () {
    return view('super_admin.data-panggilan');
});

Route::get('/super_admin/data-recruitment', function () {
    return view('super_admin.data-recruitment');
});

Route::get('/super_admin/detail-perusahaan', function () {
    return view('super_admin.detail-perusahaan');
});

Route::get('/super_admin/pengaturan', function () {
    return view('super_admin.pengaturan');
});
Route::get('/super_admin/banner', function () {
    return view('super_admin.banner');
});


Route::get('/super_admin/add', function () {
    return view('super_admin.add-user');
});
Route::get('/super_admin/add/edit', function () {
    return view('super_admin.edit-addprofile');
});


// Route::get('/super_admin/event', function () {
//     return view('super_admin.event.home');
// });
// Route::get('/super_admin/event/buat', function () {
//     return view('super_admin.event.buat');
// });
// Route::get('/super_admin/event/view', function () {
//     return view('super_admin.event.view');
// });

Route::get('/super_admin/akun/freeze', function () {
    return view('super_admin.freeze');
});
Route::get('/super_admin/detail/freeze', function () {
    return view('super_admin.detail-freeze');
});

Route::get('/super_admin/detail/calon/kandidat', function () {
    return view('super_admin.detail-calon-kandidat');
});
Route::get('/super_admin/update/calon/kandidat', function () {
    return view('super_admin.update-calon-kandidat');
});
Route::get('/super_admin/tambah/perusahaan', function () {
    return view('super_admin.tambah-perusahaan');
});
Route::get('/super_admin/detail/lowongan', function () {
    return view('super_admin.detail-lowongan');
});

Route::get('/super_admin/tambah/lowongan', function () {
    return view('super_admin.tambah-lowongan');
});
Route::get('/super_admin/edit/lowongan', function () {
    return view('super_admin.edit-lowongan');
});

Route::get('/super_admin/finance', function () {
    return view('super_admin.finance');
});
Route::get('/super_admin/view/cv/pelamar', function () {
    return view('super_admin.view-cv-pelamar');
});
Route::get('/super_admin/detail/data/talent/hunter', function () {
    return view('super_admin.detail-data-talent-hunter');
});
Route::get('/super_admin/edit/data/talent/hunter', function () {
    return view('super_admin.edit-data-talent-hunter');
});
Route::get('/super_admin/detail/data/kandidat', function () {
    return view('super_admin.detail-data-kandidat');
});
Route::get('/super_admin/update/pelamar/kandidat', function () {
    return view('super_admin.update-pelamar-kandidat');
});








//Perusahaan
Route::get('/perusahaan/dashboard', [AuthController::class, 'beranda_perusahaan'])->name('perusahaan.dashboard');

Route::get('/perusahaan/dashboard/isi', function () {
    return view('perusahaan.dashboard-isi');
});

Route::get('/perusahaan/pelamar', function () {
    return view('perusahaan.pelamar');
});

Route::prefix('perusahaan')->middleware('guest')->group(function () {

    //VERFIKASI PASSWORD
    Route::get('/verifikasi', [LupaPasswordController::class, 'showEmailForm_perusahaan'])->name('verifikasi_perusahaan');
    Route::post('/verifikasi', [LupaPasswordController::class, 'sendOtp_perusahaan'])->name('password.email.perusahaan');

    Route::get('/verifikasi/otp/{token}', [LupaPasswordController::class, 'showOtpForm_perusahaan'])->name('password.otp.form.perusahaan');
    Route::post('/verifikasi/otp', [LupaPasswordController::class, 'verifyOtp_perusahaan'])->name('password.otp.verif.perusahaan');

    Route::get('/reset-password/{token}', [LupaPasswordController::class, 'showResetForm_perusahaan'])->name('password.reset.form.perusahaan');
    Route::post('/reset-password', [LupaPasswordController::class, 'resetPassword_perusahaan'])->name('password.update.perusahaan');
});


Route::prefix('perusahaan')->middleware('auth', 'role:perusahaan', 'CheckUserStatus')->group(function () {
    //PROFILE PERUSAHAAN
    Route::get('/profile', [PerusahaanController::class, 'profile_perusahaan'])->name('profile.perusahaan');
    Route::get('/edit/profile', [PerusahaanController::class, 'edit_profile'])->name('profile.edit.perusahaan');
    Route::put('/update/profile/{perusahaan:id}', [PerusahaanController::class, 'update_profile_perusahaan'])->name('profile.update.perusahaan');
    Route::delete('/delete/profile/{perusahaan:id}', [PerusahaanController::class, 'destroy_profile'])->name('profile.destroy.perusahaan');

    //ALAMAT PERUSAHAAN
    Route::get('/alamat', [PerusahaanController::class, 'alamat_perusahaan'])->name('alamat.perusahaan');
    Route::get('/form/alamat', [PerusahaanController::class, 'form_alamat'])->name('form.alamat.perusahaan');

    Route::post('/create/alamat', [PerusahaanController::class, 'store_alamat'])->name('alamat.store.perusahaan');
    Route::get('/edit/alamat/{alamatperusahaan:id}', [PerusahaanController::class, 'edit_alamat'])->name('alamat.edit.perusahaan');
    Route::put('/update/alamat/{alamatperusahaan:id}', [PerusahaanController::class, 'update_alamat'])->name('alamat.update.perusahaan');
    Route::delete('/delete/alamat/{alamatperusahaan:id}', [PerusahaanController::class, 'destroy_alamat'])->name('alamat.destroy.perusahaan');
});



Route::get('/perusahaan/profile/baru', function () {
    return view('perusahaan.profile-baru');
});

Route::get('/perusahaan/tambah/lowongan', function () {
    return view('perusahaan.tambah-lowongan');
});

Route::get('/perusahaan/lowongan', function () {
    return view('perusahaan.lowongan');
});
Route::get('/perusahaan/lowongan/detail', function () {
    return view('perusahaan.detail-lowongan');
});

Route::get('/perusahaan/terima/lamaran', function () {
    return view('perusahaan.terima-pelamar');
});

Route::get('/perusahaan/konfirmasi/terkirim', function () {
    return view('perusahaan.konfirmasi-terkirim');
});

Route::get('/perusahaan/jadi/alamat', function () {
    return view('perusahaan.alamat-jadi');
});

Route::get('/perusahaan/berlangganan', function () {
    return view('perusahaan.berlangganan');
});

Route::get('/perusahaan/kandidat/ak', function () {
    return view('perusahaan.kandidat-ak');
});

Route::get('/perusahaan/kandidat/areakerja', function () {
    return view('perusahaan.kandidat-areakerja');
});

Route::get('/perusahaan/kandidat', function () {
    return view('perusahaan.kandidat-saya');
});

Route::get('/perusahaan/transaksi/koin', function () {
    return view('perusahaan.transaksi-koin');
});

Route::get('/perusahaan/transaksi/koin/qris', function () {
    return view('perusahaan.transaksi-koin-qris');
});

Route::get('/perusahaan/detail/transaksi', function () {
    return view('perusahaan.detail-transaksi');
});

Route::get('/perusahaan/pengaturan', function () {
    return view('perusahaan.pengaturan');
});
Route::get('/perusahaan/pengaturan/gantipw', function () {
    return view('perusahaan.pengaturan-gantipw');
});
Route::get('/perusahaan/talent/hunter', function () {
    return view('perusahaan.talent-hunter');
});

Route::get('/perusahaan/event', function () {
    return view('perusahaan.event');
});
Route::get('/perusahaan/gabung/event', function () {
    return view('perusahaan.gabung-event');
});
Route::get('/perusahaan/event/kosong', function () {
    return view('perusahaan.event-kosong');
});
Route::get('/perusahaan/berhasilikut', function () {
    return view('perusahaan.notif-berhasil-ikuti');
});
Route::get('/perusahaan/request/data', function () {
    return view('perusahaan.request-data');
});
Route::get('perusahaan/pekerja/bermasalah', function () {
    return view('perusahaan.pekerja-bermasalah');
});
Route::get('perusahaan/cari/nama/pekerja', function () {
    return view('perusahaan.cari-nama-pekerja');
});
Route::get('perusahaan/laporan/harian', function () {
    return view('perusahaan.laporan-harian');
});
Route::get('perusahaan/laporan/pekerja', function () {
    return view('perusahaan.laporan-pekerja');
});
Route::get('perusahaan/edit/alamat/jadi', function () {
    return view('perusahaan.edit-alamat-jadi');
});
Route::get('perusahaan/alamat/kosong', function () {
    return view('perusahaan.alamat-kosong');
});











Route::middleware('guest')->group(function () {


    Route::get('/perusahaan/login', [AuthController::class, 'login_perusahaan'])->name('login_perusahaan');
    Route::post('/loginproses_perusahaan', [AuthController::class, 'loginproses_perusahaan'])->name('loginproses_perusahaan');
});


Route::middleware('auth')->group(function () {

    Route::post('/logout/perusahaan', [AuthController::class, 'logout_perusahaan'])->name('logout_perusahaan');
});
Route::post('/registerproses_perusahaan', [AuthController::class, 'regis_proses_perusahaan'])->name('registerproses_perusahaan');





//login

Route::post('/super_admin/login', [AuthController::class, 'login_superadmin'])->name('login_superadmin');
