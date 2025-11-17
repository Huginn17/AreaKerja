<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AlamatPelamarController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CatatanCashController;
use App\Http\Controllers\CVController;
use App\Http\Controllers\EmailVerificationController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\FinanceController;
use App\Http\Controllers\HargaController;
use App\Http\Controllers\KandidatController;
use App\Http\Controllers\LowonganPerusahaanController;
use App\Http\Controllers\LupaPasswordController;
use App\Http\Controllers\PelamarController;
use App\Http\Controllers\PelamarLowonganController;
use App\Http\Controllers\PembeliKandidatController;
use App\Http\Controllers\PengalamanKerjaController;
use App\Http\Controllers\PengalamanOrgController;
use App\Http\Controllers\PerusahaanController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SkillController;
use App\Http\Controllers\SocialLinkController;
use App\Http\Controllers\SuperAdminController;
use App\Http\Controllers\TalentHunterController;
use App\Http\Controllers\TipsKerjaController;
use App\Jobs\ExpireLamaranJob;
use App\Models\SuperAdmin;
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

// Route::get('/test-expired', function () {
//     ExpireLamaranJob::dispatch();
//     return "✅ Job ExpireLamaran sudah dijalankan. Cek tabel notifikasis!";
// });

//DOWNLOAD CV
Route::get('/cv/{pelamar:id}/download', [CvController::class, 'downloadCv'])->name('cv.download');
Route::get('/cv/{pelamar:id}/preview', [CvController::class, 'preview'])->name('cv.preview');



//NON USER
// Route::get('/', function () {
//     return view('non-user.home');
// });
Route::get('/', [AuthController::class, 'beranda']);
// Route::get('beranda', [AuthController::class, 'beranda'])->name('beranda');

//LOGIN AUTH
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'login_non_user'])->name('login');
    Route::post('/loginproses', [AuthController::class, 'loginproses'])->name('loginproses');
});


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
    Route::get('/home', [PelamarController::class, 'index'])->name('beranda');

    Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');
    Route::put('/update/profile/{pelamar:id}', [ProfileController::class, 'update_profile'])->name('profile.update');
    Route::delete('/delete/profile/{pelamar:id}', [ProfileController::class, 'destroy_profile'])->name('profile.destroy');


    //ALAMAT PELAMAR 
    Route::get('/alamat', [ProfileController::class, 'alamat'])->name('alamat');
    Route::get('/form/alamat', [ProfileController::class, 'form_alamat'])->name('form_alamat');
    Route::post('/create/alamat', [ProfileController::class, 'store_alamat'])->name('alamat.store');
    Route::get('/edit/alamat/{alamatpelamar:id}', [ProfileController::class, 'edit_alamat'])->name('alamat.edit');
    Route::put('/update/alamat/{alamatpelamar:id}', [ProfileController::class, 'update_alamat'])->name('alamat.update');
    Route::delete('/delete/alamat/{alamatpelamar:id}', [ProfileController::class, 'destroy_alamat'])->name('alamat.destroy');

    //RIWAYAT PENDIDIKAN
    Route::post('/create/pendidikan', [PelamarController::class, 'storependidikan'])->name('pendidikan.store');
    Route::get('/edit/pendidikan/{riwayatpendidikan:id}', [PelamarController::class, 'editpendidikan'])->name('pendidikan.edit');
    Route::put('/update/pendidikan/{riwayatpendidikan:id}', [PelamarController::class, 'updatependidikan'])->name('pendidikan.update');
    Route::delete('/delete/pendidikan/{riwayatpendidikan:id}', [PelamarController::class, 'destroypendidikan'])->name('pendidikan.destroy');

    //pengalaman organisasi
    Route::post('/create/organisasi', [PengalamanOrgController::class, 'store'])->name('organisasi.store');
    Route::get('/edit/organisasi/{organisasi:id}', [PengalamanOrgController::class, 'edit'])->name('organisasi.edit');
    Route::put('/update/organisasi/{organisasi:id}', [PengalamanOrgController::class, 'update'])->name('organisasi.update');
    Route::delete('/delete/organisasi/{organisasi:id}', [PengalamanOrgController::class, 'destroy'])->name('organisasi.destroy');


    //pengalaman kerja
    Route::post('/create/kerja', [PengalamanKerjaController::class, 'store'])->name('kerja.store');
    Route::get('/edit/kerja/{kerja:id}', [PengalamanKerjaController::class, 'edit'])->name('kerja.edit');
    Route::put('/update/kerja/{kerja:id}', [PengalamanKerjaController::class, 'update'])->name('kerja.update');
    Route::delete('/delete/kerja/{kerja:id}', [PengalamanKerjaController::class, 'destroy'])->name('kerja.destroy');


    //SKILL
    Route::post('/create/skill', [SkillController::class, 'store'])->name('skill.store');
    Route::get('/edit/skill/{skill:id}', [SkillController::class, 'edit'])->name('skill.edit');
    Route::put('/update/skill/{skill:id}', [SkillController::class, 'update'])->name('skill.update');
    Route::delete('/delete/skill/{skill:id}', [SkillController::class, 'destroy'])->name('skill.destroy');


    //SIMPAN LOWONGAN 
    Route::post('/simpan-lowongan', [PelamarController::class, 'store'])->name('simpan-lowongan.store');
    Route::delete('/simpan-lowongan/{lowongan}', [PelamarController::class, 'destroy'])->name('simpan-lowongan.destroy');
    Route::get('/lowongan-tersimpan', [PelamarController::class, 'lowongansimpanform'])->name('lowongan.tersimpan');


    Route::post('/lamar-cepat/{lowongan}', [PelamarLowonganController::class, 'storeQuick'])->name('lamar.cepat');
    //detail lowongan
    Route::get('/detail-lowongan/{lowongan}', [PelamarController::class, 'detail_lowongan_non_user'])->name('detail.lowongan.non.user');

    //NOTIFIKASI LAMARAN PELAMAR
    Route::get('/notifikasi', [PelamarController::class, 'notifikasi'])->name('pelamar.notifikasi');
    // Route::get('/notifikasi/{notif}', [PelamarController::class, 'showNotif'])->name('pelamar.notifikasi.show');


    //TIPS KERJA
    Route::get('/tips-kerja', [PelamarController::class, 'tips_kerja'])->name('pelamar.tips-kerja');
    Route::get('/tips-kerja/{id}', [PelamarController::class, 'detail'])->name('pelamar.tips-kerja.show');

    //DAFTAR KANDIDAT
    Route::get('/daftar-kandidat', [PelamarController::class, 'daftar_kandidat'])->name('pelamar.daftar-kandidat');
    Route::post('/kandidat/pendaftaran', [PelamarController::class, 'storePendaftaran'])->name('kandidat.storePendaftaran');
    Route::get('/kandidat/transaksi/{id}', [PelamarController::class, 'transaksi'])->name('kandidat.transaksi');
    Route::post('/kandidat/{id}/upload-bukti', [PelamarController::class, 'uploadBukti'])->name('kandidat.catatan_cash.upload_bukti');

    //CALON KANDIDAT
    Route::get('/calon/kandidat/pelatihan', [KandidatController::class, 'rekrutHalKosong'])->name('pelamar.calon-kandidat.pelatihan')->middleware('cekKategori:calon kandidat');
    //KANDIDAT AKTIF
    Route::get('/kandidat/aktif/pelatihan', [KandidatController::class, 'rekrutHalKunci'])->name('pelamar.kandidat.aktif.pelatihan')->middleware('cekKategori:kandidat aktif');

    //REKRUT SAYA
    Route::get('/tawaran', [PembeliKandidatController::class, 'tawaran'])->name('pelamar.tawaran');
    Route::get('/kandidat/tawaran/{id}', [PembeliKandidatController::class, 'detailTawaran'])->name('kandidat.detailTawaran');
    Route::post('/pembeli_kandidat/{id}/status', [PembeliKandidatController::class, 'updateStatus'])->name('kandidat.updateStatus');
});

//NOTIFIKASI
Route::post('/notifikasi/baca/semua', [PelamarController::class, 'bacaSemua'])->name('notifikasi.bacaSemua');
Route::post('/notifikasi/baca/{id}', [PelamarController::class, 'baca'])->name('notifikasi.baca');
Route::delete('/notifikasi/hapus/{id}', [PelamarController::class, 'hapus'])->name('notifikasi.hapus');
Route::delete('/notifikasi/hapus-semua', [PelamarController::class, 'hapusSemua'])->name('notifikasi.hapusSemua');
Route::delete('/notifikasi/hapus-semua-baca', [PelamarController::class, 'hapusSemuaBaca'])->name('notifikasi.hapusSemuaBaca');
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

Route::get('/lowongan', function () {
    return view('non-user.pasang-lowongan');
});

Route::get('/talent-hunter', function () {
    return view('non-user.talent-hunter');
});
Route::get('/tips1', function () {
    return view('non-user.tips-kerja1');
});
Route::get('/bantuan', function () {
    return view('non-user.faq');
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

Route::get('/tran-tf-qr', function () {
    return view('kandidat.transaksi-tf-qr');
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
    // hanya finance yang bisa akses
    Route::post('/topup/{id}/update-status', [CatatanCashController::class, 'updateStatus'])->name('catatan_cash.update_status');

    // Route::get('/verifikasi', [AuthController::class, 'verif_finance']);
    // Route::get('/verif-otp', [AuthController::class, 'verifotp_finance']);
    // Route::get('/verif-lupapw', [AuthController::class, 'veriflupapw_finance']);


    //PAKET HARGA
    Route::get('/paket/harga', [HargaController::class, 'index'])->name('finance.paket-harga');

    Route::get('/paketharga/edit/koin', [HargaController::class, 'edit_koin'])->name('finance.paket-harga.edit-koin');
    Route::put('/update/harga/koin', [HargaController::class, 'update_koin'])->name('finance.paket-harga.update-koin');

    Route::get('/paketharga/edit/harga', [HargaController::class, 'edit_pembayaran'])->name('finance.paket-harga.edit-pembayaran');
    Route::put('/update/harga/harga', [HargaController::class, 'update_pembayaran'])->name('finance.paket-harga.update-pembayaran');

    //OMSET PERUSAHAAN PERBULAN
    Route::get('/omset', [FinanceController::class, 'omset_perusahaan'])->name('finance.omset');
    Route::get('/finance/omset/unduh', [FinanceController::class, 'unduh_omset'])->name('finance.omset.unduh');


    //LAP TRANSAKSI
    Route::get('/laporan/transaksi', [FinanceController::class, 'laporan'])->name('finance.catatan');

    Route::get('/laporan', [FinanceController::class, 'laporan_transaksi'])->name('finance.laporan');
    Route::get('/finance/laporan/detail/{tanggal}', [FinanceController::class, 'detail_laporan'])->name('finance.laporan.detail');
    Route::get('/finance/laporan/{tanggal}/unduh', [FinanceController::class, 'unduh_laporan_harian'])->name('finance.laporan.unduh');
    

    Route::get('/detail', [FinanceController::class, 'hal_detail'])->name('finance.detail.catatan.koin');
    Route::get('/detail/{id}', [FinanceController::class, 'detail'])->name('finance.detail.id');
    Route::post('/verifikasi/{id}', [FinanceController::class, 'verifikasi'])->name('finance.verifikasi');
});

// Route::get('/finance/omset/perusahaan', function () {
//     return view('finance.omset-perusahaan');
// })->name('finance.omset-perusahaan');

Route::get('/finance/page/unduh/omset', function () {
    return view('finance.page-unduh-omset');
})->name('finance.page-unduh-omset');

Route::get('/finance/unduh/data/omset', function () {
    return view('finance.unduh-data-omset');
})->name('finance.unduh-data-omset');

// Route::get('/finance/laporan/transaksi', function () {
//     return view('finance.laporan-tran');
// })->name('finance.laporan-tran');




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


    //CALON KANDIDAT
    Route::get('/calon/kandidat', [AdminController::class, 'halCalonKandidat'])->name('admin.calon-kandidat');

    Route::get('/calon-kandidat/{id}', [AdminController::class,  'detailCalonKandidat'])->name('calon.detail');
    Route::post('/calon-kandidat/{id}/update', [AdminController::class,  'updateTraining'])->name('calon.update');
    Route::post('/calon-kandidat/{id}/lulus', [AdminController::class,  'lulus'])->name('calon.lulus');
    Route::post('/calon-kandidat/{id}/gugur', [AdminController::class,  'gugur'])->name('calon.gugur');

    //NON KANDIDAT
    Route::get('/non/kandidat', [AdminController::class, 'halNonKandidat'])->name('admin.non-kandidat');
    Route::get('/non-kandidat/{id}', [AdminController::class, 'detailNonKandidat'])->name('admin.detail.non.kandidat');

    // KANDIDAT
    Route::get('/kandidat', [AdminController::class, 'halKandidat'])->name('admin.kandidat');
    Route::get('/kandidat/{id}', [AdminController::class, 'detailKandidat'])->name('admin.detail.kandidat');


    //FINANCE
    Route::get('/finance', [AdminController::class, 'koinHal'])->name('admin.finance');
    Route::get('/finance/koin/detail/{id}', function ($id) {
        $data = App\Models\CatatanKoin::findOrFail($id);
        return response()->json($data);
    });

    Route::get('/finance/tunai', [AdminController::class, 'cashHal'])->name('admin.finance.cash');

    //PROVINSI KOTA KECAMATAN
    Route::get('/get-kota/{provinsi_id}', [AdminController::class, 'getKota'])->name('admin.get.kota')->middleware('auth');
    Route::get('/get-kecamatan/{kota_id}', [AdminController::class, 'getKecamatan'])->name('admin.get.kecamatan')->middleware('auth');


    //PERUSAHAAN
    Route::get('/perusahaan', [AdminController::class, 'halPerusahaan'])->name('admin.perusahaan');
    Route::get('/perusahaan/detail/{id}', [AdminController::class, 'detailPerusahaan'])->name('admin.perusahaan.detail');
    Route::get('/admin/lowongan/{id}', [AdminController::class, 'detailLowongan'])->name('admin.lowongan.detail');
    Route::get('/perusahaan/talent/hunter', function () {
        return view('perusahaan.talenthunter-perusahaan');
    });
    //REKOMENDASI
    Route::post('/lowongan/{id}/rekomendasi', [LowonganPerusahaanController::class, 'toggleRekomendasi'])->name('admin.lowongan.toggleRekomendasi');

    Route::post('/user/freeze/{id}', [AdminController::class, 'bekukan'])->name('admin.freeze');
    Route::post('/user/unfreeze/{id}', [AdminController::class, 'aktifkan'])->name('admin.unfreeze');


    //TALENT HUNTER
    Route::get('/talent/hunter', [AdminController::class, 'talentHunterForm'])->name('admin.talent-hunter');
    Route::get('/talent/hunter/detail/{id}', [AdminController::class, 'detailTalentHunter'])->name('admin.talent-hunter.detail');


    //RECRUITMENT
    Route::get('/recruitment/perusahaan', [AdminController::class, 'halPerusahaanRecruitment'])->name('admin.recruitment.perusahaan');
    Route::get('/recruitment/{id}', [AdminController::class, 'recruitment'])->name('admin.recruitment');
    Route::get('/recruitment/{id}/detail', [AdminController::class, 'detailRecruitment'])->name('admin.recruitment.detail');
    Route::delete('/recruitment/{id}/hapus', [AdminController::class, 'destroyRecruitment'])->name('admin.recruitment.destroy');

});


Route::get('/admin/detail/manajemen/recruitmen', function () {
    return view('admin.detail-manajemen-recruitmen');
});
Route::get('/admin/detail/data/talent/hunter', function () {
    return view('admin.detail-data-talent-hunter');
});





// Route::get('/admin/recruitment', function () {
//     return view('admin.recruitment');
// });
// Route::get('/admin/talenthunter', function () {
//     return view('admin.talenthunter');
// });
Route::get('/admin/finance/koin', function () {
    return view('admin.finance-koin');
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

    //Pelamar
    Route::get('/pelamar', [SuperAdminController::class, 'pelamarhal'])->name('superadmin.pelamar');
    Route::get('/pelamar/tambah/{kategori}', [SuperAdminController::class, 'createKategori'])->where('kategori', '(kandidat|non_kandidat|calon_kandidat)')->name('superadmin.pelamar.create');
    Route::post('/pelamar/store', [SuperAdminController::class, 'storeUser'])->name('superadmin.pelamar.store');
    Route::get('/pelamar/edit/{kategori}/{id}', [SuperAdminController::class, 'editUser'])
        ->where('kategori', '(non_kandidat|calon_kandidat|kandidat)')
        ->name('superadmin.pelamar.edit');
    Route::put('/pelamar/update/{id}', [SuperAdminController::class, 'updateUser'])->name('superadmin.pelamar.update');
    Route::delete('/pelamar/{id}', [SuperadminController::class, 'destroyUser'])->name('superadmin.pelamar.destroy');
    //KANDIDAT
    Route::get('/kandidat/{pelamar}', [SuperAdminController::class, 'detail_kandidat'])->name('superadmin.detail.kandidat');
    //NON KANDIDAT
    Route::get('/non-kandidat/{pelamar}', [SuperAdminController::class, 'detail_non_kandidat'])->name('superadmin.detail.non.kandidat');
    Route::get('/non-kandidat/{pelamar}/edit', [SuperAdminController::class, 'edit_non_kandidat'])->name('superadmin.edit.non.kandidat');
    //CALON KANDIDAT
    Route::get('/calon-kandidat/{id}', [SuperAdminController::class,  'detailCalonKandidat'])->name('superadmin.calon.detail');
    Route::post('/calon-kandidat/{id}/update', [SuperAdminController::class,  'updateTraining'])->name('superadmin.calon.update');
    Route::post('/calon-kandidat/{id}/lulus', [SuperAdminController::class,  'lulus'])->name('superadmin.calon.lulus');
    Route::post('/calon-kandidat/{id}/gugur', [SuperAdminController::class,  'gugur'])->name('superadmin.calon.gugur');


    //CRUD ADMIN DAN FINANCE
    Route::get('/add/user', [SuperAdminController::class, 'role'])->name('superadmin.add.user');
    Route::get('/add/user/createForm', [SuperAdminController::class, 'createForm'])->name('superadmin.add.user.createForm');
    Route::post('/add/user/store', [SuperAdminController::class, 'store'])->name('superadmin.add.user.store');
    Route::get('/edit/user/{id}', [SuperAdminController::class, 'edit'])->name('superadmin.edit.user');
    Route::put('/update/user/{id}', [SuperAdminController::class, 'update'])->name('superadmin.update.user');
    Route::get('/detail/user/{id}', [SuperAdminController::class, 'detail'])->name('superadmin.detail.user');
    Route::delete('/delete/user/{id}', [SuperAdminController::class, 'hapus'])->name('superadmin.destroy.user');

    //KECAMATAN KOTA
    Route::get('/get-kota/{provinsi_id}', [AdminController::class, 'getKota'])->name('superadmin.get.kota')->middleware('auth');
    Route::get('/get-kecamatan/{kota_id}', [AdminController::class, 'getKecamatan'])->name('superadmin.get.kecamatan')->middleware('auth');

    //Pengaturan
    Route::post('/ganti-password', [SuperAdminController::class, 'updatePassword'])->name('superadmin.password.update');

    //PERUSAHAAN
    Route::get('/perusahaan', [SuperAdminController::class, 'halPerusahaan'])->name('superadmin.perusahaan');
    Route::get('/perusahaan/{id}', [SuperAdminController::class, 'detailPerusahaan'])->name('superadmin.perusahaan.detail');
    Route::get('/lowongan/{id}', [SuperAdminController::class, 'detailLowongan'])->name('superadmin.lowongan.detail');

    //LOWONGAN
    Route::get('/perusahaan/{id}/createform/lowongan', [LowonganPerusahaanController::class,  'createFormSuper'])->name('superadmin.lowongan.create.form');
    Route::post('/perusahaan/{id}/buat/lowongan', [LowonganPerusahaanController::class,  'storeSuper'])->name('superadmin.lowongan.saya.store');
    Route::get('/edit/lowongan/{lowongan}', [LowonganPerusahaanController::class, 'editSuper'])->name('superadmin.lowongan.edit.form');
    Route::put('/update/lowongan/{lowongan}', [LowonganPerusahaanController::class, 'updateSuper'])->name('superadmin.lowongan.update');
    Route::delete('/lowongan/{lowongan}', [LowonganPerusahaanController::class, 'destroySuper'])->name('superadmin.lowongan.destroy');


    //REKOMENDASI
    Route::post('/lowongan/{id}/rekomendasi', [LowonganPerusahaanController::class, 'toggleRekomendasi'])->name('superadmin.lowongan.toggleRekomendasi');

    //PAKET HARGA
    Route::get('/paket/harga', [SuperAdminController::class, 'halFinance'])->name('superadmin.paket-harga');

    Route::get('/paket/harga/edit/koin', [SuperAdminController::class, 'edit_koin'])->name('superadmin.paket-harga.edit-koin');
    Route::put('/update/harga/koin', [SuperAdminController::class, 'update_koin'])->name('superadmin.paket-harga.update-koin');

    Route::get('/paket/harga/edit/harga', [SuperAdminController::class, 'edit_pembayaran'])->name('superadmin.paket-harga.edit-pembayaran');
    Route::put('/update/harga/harga', [SuperAdminController::class, 'update_pembayaran'])->name('superadmin.paket-harga.update-pembayaran');

    Route::post('/create/alamat', [ProfileController::class, 'store_alamatSuper'])->name('superadmin.alamat.store')->middleware('auth');
    Route::get('/edit/alamat/{alamatpelamar:id}', [ProfileController::class, 'edit_alamatSuper'])->name('superadmin.alamat.edit')->middleware('auth');
    Route::put('/update/alamat/{alamatpelamar?}', [ProfileController::class, 'update_alamatSuper'])->name('superadmin.alamat.update')->middleware('auth');
    Route::delete('/delete/alamat/{alamatpelamar:id}', [ProfileController::class, 'destroy_alamatSuper'])->name('superadmin.alamat.destroy')->middleware('auth');

    // Detail Laporan Finance
    Route::get('/laporan/detail/{tanggal}', [SuperAdminController::class, 'detail_laporan'])->name('superadmin.laporan.detail');
    Route::get('/laporan/{tanggal}/unduh', [SuperAdminController::class, 'unduh_laporan_harian'])->name('superadmin.laporan.unduh');

    //RIWAYAT PENDIDIKAN
    Route::post('/create/pendidikan', [PelamarController::class, 'storependidikanSuper'])->name('superadmin.pendidikan.store')->middleware('auth');
    Route::get('/edit/pendidikan/{riwayatpendidikan:id}', [PelamarController::class, 'editpendidikanSuper'])->name('superadmin.pendidikan.edit')->middleware('auth');
    Route::put('/update/pendidikan/{riwayatpendidikan?}', [PelamarController::class, 'updatependidikanSuper'])->name('superadmin.pendidikan.update');
    Route::delete('/delete/pendidikan/{riwayatpendidikan:id}', [PelamarController::class, 'destroypendidikanSuper'])->name('superadmin.pendidikan.destroy')->middleware('auth');

    //pengalaman organisasi
    Route::post('/create/organisasi', [PengalamanOrgController::class, 'storeSuper'])->name('superadmin.organisasi.store')->middleware('auth');
    Route::get('/edit/organisasi/{organisasi:id}', [PengalamanOrgController::class, 'editSuper'])->name('superadmin.organisasi.edit')->middleware('auth');
    Route::put('/update/organisasi/{organisasi?}', [PengalamanOrgController::class, 'updateSuper'])->name('superadmin.organisasi.update')->middleware('auth');
    Route::delete('/delete/organisasi/{organisasi:id}', [PengalamanOrgController::class, 'destroySuper'])->name('superadmin.organisasi.destroy')->middleware('auth');


    //pengalaman kerja
    Route::post('/create/kerja', [PengalamanKerjaController::class, 'storeSuper'])->name('superadmin.kerja.store')->middleware('auth');
    Route::get('/edit/kerja/{kerja:id}', [PengalamanKerjaController::class, 'editSuper'])->name('superadmin.kerja.edit')->middleware('auth');
    Route::put('/update/kerja/{kerja?}', [PengalamanKerjaController::class, 'updateSuper'])->name('superadmin.kerja.update')->middleware('auth');
    Route::delete('/delete/kerja/{kerja:id}', [PengalamanKerjaController::class, 'destroySuper'])->name('superadmin.kerja.destroy')->middleware('auth');


    //SKILL
    Route::post('/create/skill', [SkillController::class, 'storeSuper'])->name('superadmin.skill.store')->middleware('auth');
    Route::get('/edit/skill/{skill:id}', [SkillController::class, 'editSuper'])->name('superadmin.skill.edit')->middleware('auth');
    Route::put('/update/skill/{skill?}', [SkillController::class, 'updateSuper'])->name('superadmin.skill.update')->middleware('auth');
    Route::delete('/delete/skill/{skill:id}', [SkillController::class, 'destroySuper'])->name('superadmin.skill.destroy')->middleware('auth');


    //PANGGILAN
    Route::get('/panggilan', [SuperAdminController::class, 'panggilan'])->name('superadmin.panggilan');
    Route::get('/panggilan/{perusahaan}/list', [SuperAdminController::class, 'listPekerja'])->name('superadmin.panggilan.list');


    //SOCIAL LINK
    Route::get('/social-links', [SocialLinkController::class, 'index'])->name('superadmin.social.index');
    Route::post('/social-links', [SocialLinkController::class, 'update'])->name('superadmin.social.update');


    //TALENT HUNTER
    Route::get('/talent/hunter', [SuperAdminController::class, 'talentHunterForm'])->name('superadmin.talent-hunter');
    Route::get('/talent/hunter/{id}', [SuperAdminController::class, 'detailDataTalentHunter'])->name('superadmin.talent-hunter.detail');
    Route::get('/talent-hunter/{id}/edit', [TalentHunterController::class, 'editTalentHunter'])->name('superadmin.talent-hunter.edit');
    Route::put('/talent-hunter/{id}', [TalentHunterController::class, 'update'])->name('superadmin.talent-hunter.update');


    //RECRUITMENT
    Route::get('/recruitment/perusahaan', [SuperAdminController::class, 'recruitmentPerusahaan'])->name('superadmin.recruitment.perusahaan');
    Route::get('/recruitment/{id}', [SuperAdminController::class, 'recruitment'])->name('superadmin.recruitment');
    Route::get('/recruitment/{id}/detail', [SuperAdminController::class, 'detailRecruitment'])->name('superadmin.recruitment.detail');
    Route::delete('/recruitment/{id}/hapus', [SuperAdminController::class, 'destroyRecruitment'])->name('superadmin.recruitment.destroy');
});


Route::get('/super_admin/verifikasi', [AuthController::class, 'verif_super_admin']);
Route::get('/super_admin/verif-otp', [AuthController::class, 'verifotp_super_admin']);
Route::get('/super_admin/verif-lupapw', [AuthController::class, 'veriflupapw_super_admin']);




Route::get('/super_admin/edit-profile', function () {
    return view('super_admin.edit-profile-superadmin');
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

// Route::get('/super_admin/data-talent-hunter', function () {
//     return view('super_admin.data-talent-hunter');
// });

// Route::get('/super_admin/data-recruitment', function () {
//     return view('super_admin.data-recruitment');
// });

Route::get('/super_admin/detail-perusahaan', function () {
    return view('super_admin.detail-perusahaan');
});

Route::get('/super_admin/pengaturan', function () {
    return view('super_admin.pengaturan');
});
// Route::get('/super_admin/banner', function () {
//     return view('super_admin.banner');
// });


// Route::get('/super_admin/add', function () {
//     return view('super_admin.add-user');
// });
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
Route::get('/super_admin/riwayat/tunai/koin', function () {
    return view('super_admin.riwayat-tunai-koin');
});
// Route::get('/super_admin/paket/harga', function () {
//     return view('super_admin.paket-harga');
// });
Route::get('/super_admin/laporan/transaksi', function () {
    return view('super_admin.laporan-transaksi');
});
Route::get('/super_admin/overlay/edit/hargakoin', function () {
    return view('super_admin.overlay-edit-hargakoin');
});
Route::get('/super_admin/overlay/edit/hargatunai', function () {
    return view('super_admin.overlay-edit-hargatunai');
});









Route::get('/perusahaan/dashboard/isi', function () {
    return view('perusahaan.dashboard-isi');
});

Route::get('/perusahaan/pelamar', function () {
    return view('perusahaan.pelamar');
});

Route::get('/perusahaan/request-data', function () {
    return view('perusahaan.request-data');
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



Route::get('/perusahaan/lowongan/detail/{lowongan:id}', [LowonganPerusahaanController::class, 'show'])->name('lowongan.detail')->middleware('auth', 'CheckUserStatus');
//PERUSAHAAN
Route::prefix('perusahaan')->middleware('auth', 'role:perusahaan', 'CheckUserStatus')->group(function () {
    Route::get('/dashboard', [AuthController::class, 'beranda_perusahaan'])->name('perusahaan.dashboard');
    //PROFILE PERUSAHAAN
    Route::get('/profile', [PerusahaanController::class, 'profile_perusahaan'])->name('profile.perusahaan');
    Route::get('/edit/profile', [PerusahaanController::class, 'edit_profile'])->name('profile.edit.perusahaan');
    Route::put('/update/profile/{perusahaan:id}', [PerusahaanController::class, 'update_profile_perusahaan'])->name('profile.update.perusahaan');
    Route::delete('/delete/profile/{perusahaan:id}', [PerusahaanController::class, 'destroy_profile'])->name('profile.destroy.perusahaan');

    //ALAMAT PERUSAHAAN
    Route::get('/alamat', [PerusahaanController::class, 'alamat_perusahaan'])->name('alamat.perusahaan');
    Route::get('/form/alamat', [PerusahaanController::class, 'form_alamat'])->name('form.alamat.perusahaan');

    Route::post('/alamat-perusahaan/{id}/utama', [PerusahaanController::class, 'setUtama'])->name('alamat-perusahaan.setUtama');

    Route::post('/create/alamat', [PerusahaanController::class, 'store_alamat'])->name('alamat.store.perusahaan');
    Route::get('/edit/alamat/{alamatperusahaan:id}', [PerusahaanController::class, 'edit_alamat'])->name('alamat.edit.perusahaan');
    Route::put('/update/alamat/{alamatperusahaan:id}', [PerusahaanController::class, 'update_alamat'])->name('alamat.update.perusahaan');
    Route::delete('/delete/alamat/{alamatperusahaan:id}', [PerusahaanController::class, 'destroy_alamat'])->name('alamat.destroy.perusahaan');


    //TOP UP
    Route::post('/topup/store', [CatatanCashController::class, 'store'])->name('catatan_cash.store');
    Route::get('/topup/{id}', [CatatanCashController::class, 'show'])->name('catatan_cash.show');
    Route::post('/topup/{id}/upload-bukti', [CatatanCashController::class, 'uploadBukti'])->name('catatan_cash.upload_bukti');

    //LOWONGAN SAYA
    Route::get('/lowongan', [LowonganPerusahaanController::class,  'index'])->name('lowongan.saya.perusahaan');
    Route::get('/createform/lowongan', [LowonganPerusahaanController::class,  'createForm'])->name('lowongan.create.form');
    Route::post('/buat/lowongan', [LowonganPerusahaanController::class,  'store'])->name('lowongan.saya.store');
    Route::get('/edit/lowongan/{lowongan:id}', [LowonganPerusahaanController::class, 'edit'])->name('lowongan.edit.form');
    Route::put('/update/lowongan/{lowongan:id}', [LowonganPerusahaanController::class, 'update'])->name('lowongan.update');

    Route::delete('/lowongan/{lowongan:id}', [LowonganPerusahaanController::class, 'destroy'])->name('lowongan.destroy');

    //PAKET LOWONGAN
    Route::get('/paket/form', [LowonganPerusahaanController::class, 'paketform'])->name('paket.form');
    Route::post('/paket/beli', [LowonganPerusahaanController::class, 'beliPaket'])->name('paket.beli');
    Route::post('lowongan/{lowongan}/publish', [LowonganPerusahaanController::class, 'publish'])->name('lowongan.publish');

    //PELAMAR
    Route::get('pelamar/{lowongan:slug}', [PerusahaanController::class, 'pelamar'])->name('perusahaan.pelamar');

    Route::get('/pelamar/{pelamarlowongan}/konfirmasihal', [PelamarController::class, 'konfirmasi_hal'])->name('pelamar.konfirmasi');
    Route::post('/pelamar/{pelamarlowongan}/konfirmasi', [PelamarController::class, 'konfirmasi_simpan'])->name('pelamar.konfirmasi.simpan');
    Route::post('/pelamar/{pelamarlowongan}/kirim', [PelamarController::class, 'kirim'])->name('pelamar.konfirmasi.kirim');
    Route::post('/pelamar/{pelamarlowongan}/tolak', [PelamarController::class, 'tolak'])->name('pelamar.tolak');
    Route::get('/pelamar/{pelamarlowongan}/detail', [PelamarController::class, 'preview'])->name('pelamar.detail');

    //PENGATURAN PERUSAHAAN
    Route::get('/pengaturan', [PerusahaanController::class, 'pengaturanForm'])->name('perusahaan.pengaturan');
    Route::post('/ganti-password', [PerusahaanController::class, 'updatePassword'])->name('password.update');


    //KANDIDAT AK
    Route::get('/kandidat/ak', [PerusahaanController::class, 'kandidat_ak'])->name('perusahaan.kandidat.ak');
    Route::post('/kandidat/beli', [PembeliKandidatController::class, 'beli'])->name('kandidat.beli');

    //EVENT 
    Route::get('/event', [PerusahaanController::class, 'event'])->name('perusahaan.event.index');
    Route::get('/gabung/event/{id}', [PerusahaanController::class, 'detail'])->name('perusahaan.event.show');

    //BERLANGGANAN
    Route::get('/berlangganan', [PerusahaanController::class, 'halLangganan'])->name('perusahaan.berlangganan');
    Route::post('/berlangganan', [PerusahaanController::class, 'storeLangganan'])->name('berlangganan.store');
    //kirim email langganan
    Route::post('/send-email', [PerusahaanController::class, 'kirimEmail'])->name('send.email')->middleware('auth');
    //DAFTAR PEKERJA BERMASALAH
    Route::get('/data/pekerja', [PerusahaanController::class, 'halDaftarPekerja'])->name('perusahaan.data.pekerja');
    // Route::get('/daftar/pekerja/{id}', [PerusahaanController::class, 'detail_daftar_pekerja'])->name('perusahaan.daftar.pekerja.detail');

    //TALENT HUNTER
    Route::get('/talent-hunter', [TalentHunterController::class, 'index'])->name('talent-hunter.index');
    Route::get('/talent-hunter/harga', [TalentHunterController::class, 'getHarga'])->name('talent-hunter.harga');
    Route::post('/talent-hunter/beli', [TalentHunterController::class, 'beli'])->name('talent-hunter.beli');
    Route::post('/talent-hunter/store', [TalentHunterController::class, 'store'])->name('talent-hunter.store');


    //Kandidat Saya
    Route::get('/recruitment/kandidat-saya', [PerusahaanController::class, 'kandidatSaya'])->name('perusahaan.kandidat.saya');
    Route::delete('/recruitment/{id}/hapus', [PerusahaanController::class, 'destroyRecruitmentPerusahaan'])->name('perusahaan.destroy.kandidat');
    
});
//PROVINSI KOTA KECAMATAN
Route::get('/get-kota/{provinsi_id}', [PerusahaanController::class, 'getKota'])->name('get.kota')->middleware('auth');
Route::get('/get-kecamatan/{kota_id}', [PerusahaanController::class, 'getKecamatan'])->name('get.kecamatan')->middleware('auth');


Route::get('/perusahaan/profile/baru', function () {
    return view('perusahaan.profile-baru');
});
Route::get('/perusahaan/lowongan/jgndihapus', function () {
    return view('perusahaan.lowongan');
});
Route::get('/perusahaan/terima/lamaran', function () {
    return view('perusahaan.terima-lamaran');
});

Route::get('/perusahaan/konfirmasi/terkirim', function () {
    return view('perusahaan.konfirmasi-terkirim');
});

Route::get('/perusahaan/jadi/alamat', function () {
    return view('perusahaan.alamat-jadi');
});

// Route::get('/perusahaan/berlangganan', function () {
//     return view('perusahaan.berlangganan');
// });

// Route::get('/perusahaan/kandidat/ak', function () {
//     return view('perusahaan.kandidat-ak');
// });

Route::get('/perusahaan/kandidat', function () {
    return view('perusahaan.kandidat-saya');
});



Route::get('/perusahaan/transaksi/koin/qris', function () {
    return view('perusahaan.transaksi-koin-qris');
});

Route::get('/perusahaan/detail/transaksi', function () {
    return view('perusahaan.detail-transaksi');
});

// Route::get('/perusahaan/pengaturan', function () {
//     return view('perusahaan.pengaturan');
// });
Route::get('/perusahaan/pengaturan/gantipw', function () {
    return view('perusahaan.pengaturan-gantipw');
});
// Route::get('/perusahaan/talent/hunter', function () {
//     return view('perusahaan.talent-hunter.talent-hunter');
// });
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
Route::get('perusahaan/tambah/alamat', function () {
    return view('perusahaan.tambah-alamat');
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
