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
