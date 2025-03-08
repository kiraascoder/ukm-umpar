<?php

use App\Http\Controllers\AdminUKMController;
use App\Http\Controllers\PendaftaranController;
use App\Http\Controllers\SuratController;
use App\Http\Controllers\UploadDokumentasi;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminSesiController;
use App\Http\Controllers\KeuanganController;
use App\Http\Controllers\KegiatanController;

Route::get('/', function () {
    return view('welcome');
});

// Super Admin Route
Route::get('admin/dashboard', [AdminUKMController::class, 'adminDashboard'])->name('superadmin.dashboard')->middleware('admin:admin');

// Auth
Route::prefix('admin')->middleware('authenticated')->group(function () {
    Route::get('login', [AdminSesiController::class, 'adminLoginView'])->name('admin.login');
    Route::post('login', [AdminSesiController::class, 'login'])->name('admin.login.submit');
    Route::get('register', [AdminSesiController::class, 'registerView'])->name('admin.register');
    Route::post('admin/register', [AdminSesiController::class, 'register'])->name('admin.register.submit');
});



// Admin Ukm Route
Route::middleware(['admin:admin_ukm'])->group(function () {
    Route::get('/admin/ukm/dashboard', [AdminUKMController::class, 'adminDashboardUkm'])->name('adminUkmDashboard');
    // Profile Simpan Data UKM
    Route::get('/admin/ukm/profile', [AdminUKMController::class, 'ukmProfile'])->name('adminUkmProfile');
    Route::get('/admin/ukm/{id}/edit-profile', [AdminUKMController::class, 'ukmEditProfile'])->name('adminUkmEditProfile');
    Route::put('/admin/ukm/store', [AdminUKMController::class, 'storeDataUkm'])->name('adminUkm.store');

    // View dan tambah anggota ukm
    Route::get('/admin/ukm/anggota', [AdminUKMController::class, 'ukmAnggota'])->name('adminUkmAnggota');
    Route::get('/admin/ukm/anggota/tambah', [AdminUKMController::class, 'viewTambahAnggota'])->name('adminUkmTambahAnggota');
    Route::get('/admin/ukm/anggota/{id}/edit', [AdminUKMController::class, 'viewEditAnggota'])->name('adminUkmEditAnggota');
    Route::put('/admin/ukm/anggota/{id}', [AdminUKMController::class, 'EditAnggota'])->name('adminUkmEditAnggota.edit');
    Route::delete('/admin/ukm/anggota/{id}/delete', [AdminUKMController::class, 'deleteAnggota'])->name('adminUkmHapusAnggota');
    Route::post('/admin/ukm/anggota/store', [AdminUKMController::class, 'storeAnggota'])->name('adminUkmAnggota.store');


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


    // View dan tambah kegiatan
    Route::get('/admin/ukm/kegiatan', [KegiatanController::class, 'ukmKegiatan'])->name('adminUkmKegiatan');
    // Route::get('/admin/ukm/kegiatan/{id}/detail', [KegiatanController::class, 'ukmDetailKegiatan'])->name('adminDetailUkmKegiatan');
    Route::get('/admin/ukm/kegiatan/tambah', [KegiatanController::class, 'tambahKegiatanView'])->name('adminUkmTambahKegiatan');
    Route::post('/admin/ukm/kegiatan/tambah-kegiatan', [KegiatanController::class, 'storeKegiatan'])->name('adminUkmTambahKegiatan.store');
    Route::get('/admin/ukm/kegiatan/{id}/edit', [KegiatanController::class, 'editKegiatanView'])->name('adminUkmEditKegiatan');
    Route::get('/admin/ukm/kegiatan/{id}/detail', [KegiatanController::class, 'detailKegiatanView'])->name('adminUkmDetailKegiatan');
    Route::post('/admin/ukm/kegiatan/tambah-dokumentasi/{id}', [UploadDokumentasi::class, 'store'])->name('kegiatan.uploadDokumentasi');
    // Route::put('/admin/ukm/kegiatan/{id}', [KegiatanController::class, 'editKegiatan'])->name('adminUkmEditKegiatan.edit');
    Route::delete('/admin/ukm/kegiatan/{id}/delete', [KegiatanController::class, 'deleteKegiatan'])->name('adminUkmKegiatan.delete');

    // View dan tambah pendaftaran
    Route::get('/admin/ukm/pendaftaran', [PendaftaranController::class, 'ukmPendaftaran'])->name('adminUkmPendaftaran');

    // View dan tambah proker
    Route::get('/admin/ukm/proker', [AdminUKMController::class, 'ukmProker'])->name('adminUkmProker');

    // View dan tambah Albums
    Route::get('/admin/ukm/album', [AdminUKMController::class, 'ukmAlbum'])->name('adminUkmAlbum');
});



//Log Out
Route::post('admin/logout', [AdminSesiController::class, 'logout'])->name('admin.logout');
Route::post('admin/logout', [AdminSesiController::class, 'logout'])->name('admin.logout');
