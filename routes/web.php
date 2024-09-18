<?php

use App\Http\Controllers\BarangController;
use App\Http\Controllers\BbmController;
use App\Http\Controllers\JadwalKadisController;
use App\Http\Controllers\KendaraanController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\PeminjamanAtkController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\AuthController;

// Route::middleware(['guest'])->get('/', function () {
//     return redirect()->route('login');
// });

Route::get('/', function () {
    return view('auth/login');
});

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');
});

// Rute untuk admin
Route::middleware(['auth', 'check.level:admin'])->group(function () {
    Route::resource('pegawai', PegawaiController::class);
    Route::resource('jadis', JadwalKadisController::class);
});

// Rute untuk opatk
Route::middleware(['auth', 'check.level:opatk'])->group(function () {
    Route::resource('barang', BarangController::class);
    Route::resource('peminjaman_atk', PeminjamanAtkController::class);
});

// Rute untuk opbbm
Route::middleware(['auth', 'check.level:opbbm'])->group(function () {
    Route::resource('kendaraan', KendaraanController::class);
    Route::resource('bbm', BbmController::class);
    Route::get('/bbm/{id}/print', [BbmController::class, 'print'])->name('bbm.print');
    
});

// Rute untuk pimpinan
Route::middleware(['auth', 'check.level:pimpinan'])->group(function () {
    Route::resource('user', UserController::class);
    Route::get('/pimpinan/bbm', [BbmController::class, 'indexForPimpinan'])->name('pimpinan.bbm');
    Route::post('/bbm/{id}/approve', [BbmController::class, 'approve'])->name('bbm.approve');
});
