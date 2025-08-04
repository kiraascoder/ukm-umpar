<?php

use App\Http\Controllers\AdminUKMController;
use App\Http\Controllers\AnggotaController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\PendaftaranController;
use App\Http\Controllers\PesanController;
use App\Http\Controllers\ProkerController;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\SuperAdminController;
use App\Http\Controllers\SuratController;
use App\Http\Controllers\UploadDokumentasi;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminSesiController;
use App\Http\Controllers\KeuanganController;
use App\Http\Controllers\KegiatanController;



Route::get('/', [PublicController::class, 'index'])->name('home');
Route::get('/unauthorized', function () {
    return view('errors.unauthorized');
})->name('unauthorized');

// Super Admin Route
Route::get('admin/dashboard', [AdminUKMController::class, 'adminDashboard'])->middleware('admin:admin')->name('superadmin.dashboard');

// Auth
Route::prefix('admin')->middleware('authenticated')->group(function () {
    Route::get('login', [AdminSesiController::class, 'adminLoginView'])->name('admin.login');
    Route::post('login', [AdminSesiController::class, 'login'])->name('admin.login.submit');
    Route::get('register', [AdminSesiController::class, 'registerView'])->name('admin.register');
    Route::post('admin/register', [AdminSesiController::class, 'register'])->name('admin.register.submit');
});

// Admin Ukm Route
Route::middleware(['admin:admin_ukm', 'checkUserStatus'])->group(function () {
    Route::get('/admin/ukm/dashboard', [AdminUKMController::class, 'adminDashboardUkm'])->name('adminUkmDashboard');
    // Profile Simpan Data UKM
    Route::get('/admin/ukm/profile', [AdminUKMController::class, 'ukmProfile'])->name('adminUkmProfile');
    Route::get('/admin/ukm/{id}/edit-profile', [AdminUKMController::class, 'ukmEditProfile'])->name('adminUkmEditProfile');
    Route::put('/admin/ukm/store', [AdminUKMController::class, 'updateDataUkm'])->name('adminUkm.store');
    Route::put('/admin/ukm/update-saldo/{id}', [KeuanganController::class, 'ukmTambahSaldo'])->name('adminUkmUpdateSaldo.update');



    // View dan tambah anggota ukm
    Route::get('/admin/ukm/anggota', [AnggotaController::class, 'ukmAnggota'])->name('adminUkmAnggota');
    Route::get('/admin/ukm/anggota/tambah', [AnggotaController::class, 'viewTambahAnggota'])->name('adminUkmTambahAnggota');
    Route::get('/admin/ukm/anggota/{id}/detail', [AnggotaController::class, 'viewDetailAnggota'])->name('adminUkmDetailAnggota');
    Route::get('/admin/ukm/anggota/{id}/edit', [AnggotaController::class, 'viewEditAnggota'])->name('adminUkmEditAnggota');
    Route::put('/admin/ukm/anggota/{id}', [AnggotaController::class, 'EditAnggota'])->name('adminUkmEditAnggota.edit');
    Route::delete('/admin/ukm/anggota/{id}/delete', [AnggotaController::class, 'deleteAnggota'])->name('adminUkmHapusAnggota');
    Route::post('/admin/ukm/anggota/store', [AnggotaController::class, 'storeAnggota'])->name('adminUkmAnggota.store');


    // View dan tambah arsip surat
    Route::get('/admin/ukm/arsip-surat', [SuratController::class, 'ukmArsipSurat'])->name('adminUkmArsipSurat');
    Route::get('/admin/ukm/arsip-surat/{id}/edit', [SuratController::class, 'editSuratView'])->name('adminUkmEditArsipSurat');
    Route::put('/admin/ukm/arsip-surat/{id}/update', [SuratController::class, 'editSurat'])->name('adminUkmArsipSurat.edit');
    Route::get('/admin/ukm/arsip-surat/tambah', [SuratController::class, 'tambahSuratView'])->name('adminUkmTambahSurat');
    Route::post('/admin/ukm/arsip-surat/tambah-surat', [SuratController::class, 'storeSurat'])->name('adminUkmArsipSurat.store');
    Route::delete('/admin/ukm/arsip-surat/{id}/delete', [SuratController::class, 'deleteSurat'])->name('adminUkmHapusSurat');


    // View dan tambah keuangan
    Route::get('/admin/ukm/keuangan', [KeuanganController::class, 'viewKeuangan'])->name('adminUkmKeuangan');
    Route::get('/admin/ukm/keuangan/tambah', [KeuanganController::class, 'tambahKeuanganView'])->name('adminUkmTambahKeuangan');
    Route::post('/admin/ukm/keuangan/tambah-keuangan', [KeuanganController::class, 'storeKeuangan'])->name('adminUkmTambahKeuangan.store');
    Route::get('/admin/ukm/keuangan/{id}/edit', [KeuanganController::class, 'viewEditKeuangan'])->name('adminUkmEditKeuangan');
    Route::put('/admin/ukm/keuangan/{id}/', [KeuanganController::class, 'editKeuangan'])->name('adminUkmKeuangan.edit');
    Route::delete('/admin/ukm/keuangan/{id}/delete', [KeuanganController::class, 'hapusKeuangan'])->name('adminUkmKeuangan.delete');

    // Download Rekap Keuangan
    Route::get('/keuangan/download', [KeuanganController::class, 'download'])->name('adminUkmKeuangan.download');



    // View dan tambah kegiatan
    Route::get('/admin/ukm/kegiatan', [KegiatanController::class, 'ukmKegiatan'])->name('adminUkmKegiatan');
    Route::get('/admin/ukm/kegiatan/tambah', [KegiatanController::class, 'tambahKegiatanView'])->name('adminUkmTambahKegiatan');
    Route::post('/admin/ukm/kegiatan/tambah-kegiatan', [KegiatanController::class, 'storeKegiatan'])->name('adminUkmTambahKegiatan.store');
    Route::get('/admin/ukm/kegiatan/{id}/edit', [KegiatanController::class, 'editKegiatanView'])->name('adminUkmEditKegiatan');
    Route::get('/admin/ukm/kegiatan/{id}/detail', [KegiatanController::class, 'detailKegiatanView'])->name('adminUkmDetailKegiatan');
    Route::put('/admin/ukm/kegiatan/{id}', [KegiatanController::class, 'updateKegiatan'])->name('adminUkmEditKegiatan.update');
    Route::delete('/admin/ukm/kegiatan/{id}/delete', [KegiatanController::class, 'deleteKegiatan'])->name('adminUkmKegiatan.delete');

    // View dan tambah pendaftaran
    Route::get('/admin/ukm/pendaftaran', [PendaftaranController::class, 'ukmPendaftaran'])->name('adminUkmPendaftaran');
    Route::get('/admin/ukm/pendaftaran/tambah', [PendaftaranController::class, 'tambahPendaftaranView'])->name('adminUkmTambahPendaftaran');
    Route::post('/admin/ukm/pendaftaran/tambah-pendaftaran', [PendaftaranController::class, 'storePendaftaran'])->name('adminUkmTambahPendaftaran.store');
    Route::get('/admin/ukm/pendaftaran/{id}/detail', [PendaftaranController::class, 'detailpendaftaranView'])->name('adminUkmDetailPendaftaran');
    Route::get('/admin/ukm/pendaftaran/{id}/edit', [PendaftaranController::class, 'editPendaftaranView'])->name('adminUkmEditPendaftaran');
    Route::put('/admin/ukm/pendaftaran/{id}', [PendaftaranController::class, 'editPendaftaran'])->name('adminUkmEditPendaftaran.edit');
    Route::delete('/admin/ukm/pendaftaran/{id}/delete', [PendaftaranController::class, 'deletependaftaran'])->name('adminUkmPendaftaran.delete');

    // View dan tambah proker
    Route::get('/admin/ukm/proker', [ProkerController::class, 'ukmProker'])->name('adminUkmProker');
    Route::get('/admin/ukm/proker/tambah', [ProkerController::class, 'tambahProkerView'])->name('adminUkmTambahProker');
    Route::post('/admin/ukm/proker/tambah-proker', [ProkerController::class, 'storeProker'])->name('adminUkmTambahProker.store');
    Route::get('/admin/ukm/proker/{id}/detail', [ProkerController::class, 'detailProkerView'])->name('adminUkmDetailProker');
    Route::get('/admin/ukm/proker/{id}/edit', [ProkerController::class, 'editProkerView'])->name('adminUkmEditProker');
    Route::put('/admin/ukm/proker/{id}', [ProkerController::class, 'editProker'])->name('adminUkmEditProker.edit');
    Route::delete('/admin/ukm/proker/{id}/delete', [ProkerController::class, 'DeleteProker'])->name('adminUkmDeleteProker.delete');


    // Upload Dokumentasi Kegiatan
    Route::post('/admin/ukm/kegiatan/tambah-dokumentasi', [UploadDokumentasi::class, 'storeDokumentasi'])->name('adminUkmTambahDokumentasi.store');
    Route::post('/admin/ukm/dokumentasi/update/{id}', [UploadDokumentasi::class, 'updateDokumentasi'])->name('adminUkmDokumentasi.update');
    Route::delete('/admin/ukm/dokumentasi/delete/{id}', [UploadDokumentasi::class, 'deleteDokumentasi'])->name('adminUkmDokumentasi.delete');

    // Email & Phone
    Route::put('/admin/ukm/{id}/edit-email', [AdminUKMController::class, 'ukmEditEmail'])->name('adminUkmEditEmail');
    Route::put('/admin/ukm/{id}/edit-phone', [AdminUKMController::class, 'ukmEditPhone'])->name('adminUkmEditPhone');


    // View dan Tambah foto galeri
    Route::get('/admin/ukm/galeri', [GalleryController::class, 'index'])->name('adminUkmGaleri');
    Route::post('/admin/ukm/galeri/tambah-galeri', [GalleryController::class, 'store'])->name('adminUkmTambahGaleri.store');
    Route::put('/admin/ukm/galeri/{id}', [GalleryController::class, 'editGaleri'])->name('adminUkmEditGaleri.edit');
    Route::delete('/admin/ukm/galeri/{id}/delete', [GalleryController::class, 'deleteGaleri'])->name('adminUkmDeleteGaleri.delete');
});

Route::middleware(['admin:admin'])->group(function () {
    Route::get('/admin/dashboard', [SuperAdminController::class, 'superAdminDashboardUkm'])->name('superAdminDashboard');
    Route::get('/admin/proker-ukm', [SuperAdminController::class, 'daftarProkerUkm'])->name('adminUkmProgram');
    Route::get('/admin/daftar-ukm', [SuperAdminController::class, 'daftarUkm'])->name('adminUkmList');
    Route::get('/admin/anggota/{id}', [SuperAdminController::class, 'anggota'])->name('getAnggotaUkm');
    Route::get('/admin/anggota/{id}/edit', [SuperAdminController::class, 'editAnggotaView'])->name('getAnggotaUkm.edit');
    Route::put('/admin/anggota/edit/{id}', [SuperAdminController::class, 'editAnggota'])->name('anggotaUkm.edit');
    Route::put('/admin/ukm/{id}/update-password', [SuperAdminController::class, 'updatePassword'])->name('superadmin.ukm.updatePassword');
    Route::get('/admin/pesan', [SuperAdminController::class, 'pesan'])->name('adminPesan');
    Route::delete('/admin/pesan/{id}/delete', [SuperAdminController::class, 'destroyPesan'])->name('pesan.destroy');
    Route::delete('/admin/ukm/{id}/delete', [SuperAdminController::class, 'deleteUkm'])->name('hapusUkm.delete');
    Route::get('/admin/proker-ukm/{id}/detail', [SuperAdminController::class, 'detailProkerUkm'])->name('prokerUkm');
    Route::get('/admin/daftar-ukm/{id}/detail', [SuperAdminController::class, 'detailUkm'])->name('detailUkm');
    Route::get('/admin/kegiatan/{id}/detail', [SuperAdminController::class, 'detailKegiatan'])->name('detailKegiatan');
    Route::get('/admin/verifikasi-ukm', [SuperAdminController::class, 'viewVerifikasiUkm'])->name('verifikasiUkm');
    Route::patch('/admin/{id}/verifikasi', [SuperAdminController::class, 'verifikasiUkm'])->name('verifikasiUkm.update');
    Route::get('/admin/proker/download', [SuperAdminController::class, 'downloadProker'])->name('adminUkmProker.download');
    Route::get('/admin/proker/{id}/download', [SuperAdminController::class, 'downloadDetailProker'])->name('adminUkmDetailProker.download');
});

//Log Out
Route::post('admin/logout', [AdminSesiController::class, 'logout'])->name('admin.logout');
Route::post('admin/logout', [AdminSesiController::class, 'logout'])->name('admin.logout');

// Kirim Pesan

Route::post('/kirim-pesan', [PesanController::class, 'store'])->name('kirim-pesan');

// Public Route
Route::get('/contact', [PublicController::class, 'viewContact'])->name('kontak');
Route::get('/ukm/{id}/detail', [PublicController::class, 'detailUkm'])->name('detail-ukm');
Route::get('/galeri', [PublicController::class, 'viewGallery'])->name('galeri');
Route::get('/kegiatan', [PublicController::class, 'viewKegiatan'])->name('kegiatan');
Route::get('/informasi', [PublicController::class, 'viewInformasi'])->name('informasi');
Route::get('/daftar-ukm', [PublicController::class, 'viewUkm'])->name('daftar-ukm');


// Ukm Route
Route::get('/kegiatan/{id}/detail', [PublicController::class, 'viewDetailKegiatan'])->name('detail-kegiatan');
Route::get('/kegiatan/{id}/detail-kegiatan', [PublicController::class, 'detailKegiatan'])->name('detailKegiatan');
Route::get('/informasi/{id}/detail', [PublicController::class, 'detailInformasi'])->name('detailInformasi');


Route::get('/login', function () {
    return redirect('admin/login');
});


// web.php
// Form permintaan lupa password
Route::get('/admin/lupa-password', [AuthController::class, 'showForgotForm'])->name('password.request');
Route::post('/admin/lupa-password', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');

// Form reset password dari email
Route::get('/reset-password', [ForgotPasswordController::class, 'showResetForm'])->name('password.reset');
Route::post('/reset-password', [ForgotPasswordController::class, 'resetPassword'])->name('password.update');
