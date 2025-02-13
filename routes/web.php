<?php

use App\Http\Controllers\AdminUKMController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminSesiController;

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
    Route::get('/admin/ukm/store', [AdminUKMController::class, 'ukmStoreView'])->name('adminUkm');
    Route::post('/admin/ukm/store', [AdminUKMController::class, 'storeDataUkm'])->name('adminUkm.store');
});



//Log Out
Route::get('admin/logout', [AdminSesiController::class, 'logout'])->name('admin.logout')->middleware('admin:admin');
Route::get('admin/logout', [AdminSesiController::class, 'logout'])->name('admin.logout')->middleware('admin:admin_ukm');
