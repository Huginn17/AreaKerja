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

Route::get('/welcome', function () {
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

Route::get('/', [AuthController::class, 'index']);
Route::get('/register', [AuthController::class, 'regis']);
Route::get('/verifikasi', [AuthController::class, 'verif']);
Route::get('/verifikasicode', [AuthController::class, 'verifcode']);
Route::get('/verif-lupapw', [AuthController::class, 'veriflupapw']);




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
Route::get('/finance/register', function () {
    return view('finance.auth.register');
});
Route::get('/finance/login', function () {
    return view('finance.auth.login');
});
Route::get('/finance/verif', function () {
    return view('finance.auth.verifikasi');
});
Route::get('/finance/verif-lupapw', function () {
    return view('finance.auth.verif-lupa-sandi');
});
Route::get('/finance/verif-codepw', function () {
    return view('finance.auth.verif-codepw');
});
Route::get('/finance/dashboard', function () {
    return view('finance.dashboard');
});