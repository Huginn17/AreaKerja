<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

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

//NON USER

Route::get('/', function () {
    return view('welcome');
});

Route::get('/beranda', function () {
    return view('non-user.home');
});
Route::get('/lowongan', function () {
    return view('non-user.pasang-lowongan');
});
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

Route::get('/profile', function () {
    return view('non-user.profile');
});

Route::get('/alamat', function () {
    return view('non-user.create-alamat');
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

Route::get('/login', [AuthController::class, 'login_non_user']);
Route::get('/register', [AuthController::class, 'regis_non_user']);
Route::get('/verifikasi', [AuthController::class, 'verif_non_user']);
Route::get('/verifikasicode', [AuthController::class, 'verifcode_non_user']);
Route::get('/verif-lupapw', [AuthController::class, 'veriflupapw_non_user']);




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
Route::get('/finance/login', [AuthController::class, 'login_finance']);
Route::get('/finance/register', [AuthController::class, 'regis_finance']);
Route::get('/finance/verifikasi', [AuthController::class, 'verif_finance']);
Route::get('/finance/verif-otp', [AuthController::class, 'verifotp_finance']);
Route::get('/finance/verif-lupapw', [AuthController::class, 'veriflupapw_finance']);


Route::get('/finance/dashboard', function () {
    return view('finance.dashboard');
});





//Admin
Route::get('/admin/login',[AuthController::class, 'login_admin']);
Route::get('/admin/register', [AuthController::class, 'regis_admin']);
Route::get('/admin/verifikasi', [AuthController::class, 'verif_admin']);
Route::get('/admin/verif-otp', [AuthController::class, 'verifotp_admin']);
Route::get('/admin/verif-lupapw', [AuthController::class, 'veriflupapw_admin']);

Route::get('/admin/dashboard', function () {
   return view('admin.dashboard'); 
});





//Super Admin
Route::get('/super_admin/login', [AuthController::class, 'login_super_admin']);
Route::get('/super_admin/register', [AuthController::class, 'regis_super_admin']);
Route::get('/super_admin/verifikasi', [AuthController::class, 'verif_super_admin']);
Route::get('/super_admin/verif-otp', [AuthController::class, 'verifotp_super_admin']);
Route::get('/super_admin/verif-lupapw', [AuthController::class, 'veriflupapw_super_admin']);








//Perusahaan
Route::get('/perusahaan/dashboard', function () {
    return view('perusahaan.dashboard');
});

Route::get('/perusahaan/dashboard/isi', function () {
    return view('perusahaan.dashboard-isi');
});

Route::get('/perusahaan/pelamar', function () {
    return view('perusahaan.pelamar');
});

Route::get('/perusahaan/profile', function () {
    return view('perusahaan.profile-perusahaan');
});

Route::get('/perusahaan/edit/kosong', function () {
    return view('perusahaan.edit-profile-kosong');
});

Route::get('/perusahaan/alamat', function () {
    return view('perusahaan.alamat');
});
Route::get('/perusahaan/alamat/buat', function () {
    return view('perusahaan.buat-alamat');
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

Route::get('/perusahaan/konfirmasi/lamaran', function () {
    return view('perusahaan.konfirmasi-lamaran');
});

Route::get('/perusahaan/jadi/alamat', function () {
    return view('perusahaan.alamat-jadi');
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
Route::get('/perusahaan/berhasilikut', function () {
    return view('perusahaan.notif-berhasil-ikuti');
});


Route::get('/perusahaan/register', [AuthController::class, 'regis_perusahaan']);
Route::get('/perusahaan/login', [AuthController::class, 'login_perusahaan']);
Route::get('/perusahaan/verifikasi', [AuthController::class, 'verif_perusahaan']);
Route::get('/perusahaan/verif/otp', [AuthController::class, 'verifotp_perusahaan']);
Route::get('/perusahaan/verif/lupapw', [AuthController::class, 'veriflupapw_perusahaan']);