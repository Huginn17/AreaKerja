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

Route::get('/finance/paketharga', function () {
    return view('finance.paket-harga');
});

Route::get('/finance/omset/perusahaan', function () {
    return view('finance.omset-perusahaan');
});
Route::get('/finance/catatan/transaksi', function () {
    return view('finance.catatan-tran');
});
Route::get('/finance/laporan/transaksi', function () {
    return view('finance.laporan-tran');
});
Route::get('/finance/laporan/transaksi2', function () {
    return view('finance.laporan-tran2');
});



//Admin
Route::get('/admin/login', [AuthController::class, 'login_admin']);
Route::get('/admin/register', [AuthController::class, 'regis_admin']);
Route::get('/admin/verifikasi', [AuthController::class, 'verif_admin']);
Route::get('/admin/verif-otp', [AuthController::class, 'verifotp_admin']);
Route::get('/admin/verif-lupapw', [AuthController::class, 'veriflupapw_admin']);

Route::get('/admin/dashboard', function () {
    return view('admin.dashboard');
});
Route::get('/admin/profile', function () {
    return view('admin.profile');
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

Route::get('/admin/pelamar', function () {
    return view('admin.pelamar');
});
Route::get('/admin/perusahaan', function () {
    return view('admin.perusahaan');
});
Route::get('/admin/finance', function () {
    return view('admin.finance');
});
Route::get('/admin/tips/kerja', function () {
    return view('admin.tips-kerja');
});
Route::get('/admin/buatpost', function () {
    return view('admin.buat-post');
});


//admin event
Route::get('/admin/event/home', function () {
    return view('admin.event.home');
});
Route::get('/admin/buat/event', function () {
    return view('admin.event.buat-event');
});
Route::get('/admin/detail/event', function () {
    return view('admin.event.detail-event');
});


//Super Admin
Route::get('/super_admin/login', [AuthController::class, 'login_super_admin']);
Route::get('/super_admin/register', [AuthController::class, 'regis_super_admin']);
Route::get('/super_admin/verifikasi', [AuthController::class, 'verif_super_admin']);
Route::get('/super_admin/verif-otp', [AuthController::class, 'verifotp_super_admin']);
Route::get('/super_admin/verif-lupapw', [AuthController::class, 'veriflupapw_super_admin']);

Route::get('/super_admin/dashboard', function () {
    return view('super_admin.dashboard');
});

Route::get('/super_admin/profile', function () {
    return view('super_admin.profile-superadmin');
});

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


Route::get('/super_admin/tips/kerja', function () {
    return view('super_admin.tips-kerja');
});
Route::get('/super_admin/buat/tips', function () {
    return view('super_admin.buat-tips');
});


Route::get('/super_admin/event', function () {
    return view('super_admin.event.home');
});
Route::get('/super_admin/event/buat', function () {
    return view('super_admin.event.buat');
});
Route::get('/super_admin/event/view', function () {
    return view('super_admin.event.view');
});

Route::get('/super_admin/akun/freeze', function () {
    return view('super_admin.freeze');
});
Route::get('/super_admin/detail/frezee', function () {
    return view('super_admin.detail-frezee');
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

Route::get('/super_admin/finance', function () {
    return view('super_admin.finance');
});






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

});Route::get('/perusahaan/event/kosong', function () {
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


Route::get('/perusahaan/register', [AuthController::class, 'regis_perusahaan']);
Route::get('/perusahaan/login', [AuthController::class, 'login_perusahaan']);
Route::get('/perusahaan/verifikasi', [AuthController::class, 'verif_perusahaan']);
Route::get('/perusahaan/verif/otp', [AuthController::class, 'verifotp_perusahaan']);
Route::get('/perusahaan/verif/lupapw', [AuthController::class, 'veriflupapw_perusahaan']);
