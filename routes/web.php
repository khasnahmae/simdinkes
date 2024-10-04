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


    Route::resource('atk', AtkController::class)->parameters(['atk' => 'uuid']);
    Route::get('/pengajuan/atk', [AtkController::class, 'pengajuan'])->name('atk.pengajuan');
    Route::post('/atk/{uuid}/approve', [AtkController::class, 'approveByKasie'])->name('atk.approve');
    Route::post('/atk/reject/{uuid}', [AtkController::class, 'reject'])->name('atk.reject');
    Route::get('/atk/{uuid}/print', [AtkController::class, 'print'])->name('atk.print');

    Route::resource('bbm', BbmController::class)->parameters(['bbm' => 'uuid']);
    Route::get('/bbm/{uuid}/print', [BbmController::class, 'print'])->name('bbm.print');
    Route::get('/pengajuan/bbm', [BbmController::class, 'pengajuan'])->name('bbm.pengajuan');
    Route::post('/bbm/{uuid}/approve', [BbmController::class, 'approveByKasie'])->name('bbm.approve');
    Route::post('/bbm/reject/{uuid}', [BbmController::class, 'reject'])->name('bbm.reject');


    Route::get('/rekap/atk', [LaporanController::class, 'atk'])->name('rekap.atk');
    Route::get('/rekap/atk/download', [LaporanController::class, 'downloadatk'])->name('rekap.downloadatk');
    Route::get('rekap/atk/excelatk', [LaporanController::class, 'excelatk'])->name('rekap.excelatk');
    Route::get('/rekap/bbm', [LaporanController::class, 'bbm'])->name('rekap.bbm');
    Route::get('/rekap/bbm/download', [LaporanController::class, 'downloadbbm'])->name('rekap.downloadbbm');
    Route::get('rekap/bbm/excelatk', [LaporanController::class, 'excelbbm'])->name('rekap.excelbbm');

   // Rute untuk laporan detail
    Route::get('/rekap/detailatk/{uuid}', [LaporanController::class, 'detailatk'])->name('rekap.detailatk');
    Route::get('/rekap/detailbbm/{uuid}', [LaporanController::class, 'detailbbm'])->name('rekap.detailbbm');

});
// Rute untuk operator
Route::middleware(['auth', 'check.level:operator'])->group(function () {
    Route::resource('tr_atk', Tr_AtkController::class);
    Route::resource('tr_bbm', Tr_BbmController::class);
    Route::get('/tr_atk/{uuid}/print', [Tr_AtkController::class, 'print'])->name('tr_atk.print');
    Route::get('/tr_bbm/{uuid}/print', [Tr_BbmController::class, 'print'])->name('tr_bbm.print');

});
Route::middleware(['auth', 'check.level:pemimpin'])->group(function () {
    Route::post('/atk/{uuid}/approve2', [AtkController::class, 'approveByPimpinan'])->name('atk.approve2');
    Route::post('/atk/reject2/{uuid}', [AtkController::class, 'rejectByPimpinan'])->name('atk.reject2');
    Route::get('/pengajuan/atkpimpinan', [AtkController::class, 'pengajuanPimpinan'])->name('atk.pengajuan2');
    Route::get('/pengajuan/bbmpimpinan', [BbmController::class, 'pengajuanPimpinan'])->name('bbm.pengajuan2');
    Route::post('/bbm/{uuid}/approve2', [BbmController::class, 'approveByPimpinan'])->name('bbm.approve2');
    Route::post('/bbm/reject2/{uuid}', [BbmController::class, 'rejectByPimpinan'])->name('bbm.reject2');
});


