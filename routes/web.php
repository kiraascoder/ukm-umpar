<?php

use App\Http\Controllers\AdminUKMController;
use App\Http\Controllers\SuratController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminSesiController;
use App\Http\Controllers\KeuanganController;

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

    // View dan tambah kegiatan
    Route::get('/admin/ukm/kegiatan', [AdminUKMController::class, 'ukmKegiatan'])->name('adminUkmKegiatan');

    // View dan tambah pendaftaran
    Route::get('/admin/ukm/pendaftaran', [AdminUKMController::class, 'ukmPendaftaran'])->name('adminUkmPendaftaran');

    // View dan tambah proker
    Route::get('/admin/ukm/proker', [AdminUKMController::class, 'ukmProker'])->name('adminUkmProker');
});



//Log Out
Route::post('admin/logout', [AdminSesiController::class, 'logout'])->name('admin.logout');
Route::post('admin/logout', [AdminSesiController::class, 'logout'])->name('admin.logout');
