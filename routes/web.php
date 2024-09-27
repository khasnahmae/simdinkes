<?php

use App\Http\Controllers\BarangController;
use App\Http\Controllers\BbmController;
use App\Http\Controllers\JadwalKadisController;
use App\Http\Controllers\KendaraanController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\AtkController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\Tr_AtkController;
use App\Http\Controllers\Tr_BbmController;
use App\Models\Siswa;

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
    Route::resource('user', UserController::class);
    Route::resource('pegawai', PegawaiController::class);
    Route::resource('jadis', JadwalKadisController::class);
    Route::resource('barang', BarangController::class);
    Route::resource('kendaraan', KendaraanController::class);
    Route::resource('siswa', SiswaController::class);


    Route::resource('atk', AtkController::class);
    Route::get('/pengajuan/atk', [AtkController::class, 'pengajuan'])->name('atk.pengajuan');
    Route::post('/atk/{id}/approve', [AtkController::class, 'approve'])->name('atk.approve');
    Route::post('/atk/reject/{id}', [AtkController::class, 'reject'])->name('atk.reject');
    Route::get('/atk/{id}/print', [AtkController::class, 'print'])->name('atk.print');

    Route::resource('bbm', BbmController::class);
    Route::get('/bbm/{id}/print', [BbmController::class, 'print'])->name('bbm.print');
    Route::get('/pengajuan/bbm', [BbmController::class, 'pengajuan'])->name('bbm.pengajuan');
    Route::post('/bbm/{id}/approve', [BbmController::class, 'approve'])->name('bbm.approve');
    Route::post('/bbm/reject/{id}', [BbmController::class, 'reject'])->name('bbm.reject');

    Route::get('/rekap/atk', [LaporanController::class, 'atk'])->name('rekap.atk');
    Route::get('/rekap/atk/download', [LaporanController::class, 'downloadatk'])->name('rekap.downloadatk');
    Route::get('rekap/atk/excelatk', [LaporanController::class, 'excelatk'])->name('rekap.excelatk');
    Route::get('/rekap/bbm', [LaporanController::class, 'bbm'])->name('rekap.bbm');
    Route::get('/rekap/bbm/download', [LaporanController::class, 'downloadbbm'])->name('rekap.downloadbbm');
    Route::get('rekap/bbm/excelatk', [LaporanController::class, 'excelbbm'])->name('rekap.excelbbm');

   // Rute untuk laporan detail
    Route::get('/rekap/detailatk/{id}', [LaporanController::class, 'detailatk'])->name('rekap.detailatk');
    Route::get('/rekap/detailbbm/{id}', [LaporanController::class, 'detailbbm'])->name('rekap.detailbbm');

});
// Rute untuk operator
Route::middleware(['auth', 'check.level:operator'])->group(function () {
    Route::resource('tr_atk', Tr_AtkController::class);
    Route::resource('tr_bbm', Tr_BbmController::class);
    Route::get('/tr_atk/{id}/print', [Tr_AtkController::class, 'print'])->name('tr_atk.print');

});

