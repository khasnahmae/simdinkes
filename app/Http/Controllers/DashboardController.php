<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use App\Models\Barang;
use App\Models\Bbm;
use App\Models\Atk;
use App\Models\JadwalKadis;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard()
    {
        // $jumlahPegawai = Pegawai::count();
        // $jumlahBarang = Barang::count();
        // $transaksiBbmTerbaru = Bbm::latest()->first();
        // $peminjamanAtkTerbaru = Atk::latest()->first();
        $jadwalKadis = JadwalKadis::whereDate('tanggal', '>=', now()->toDateString())->orderBy('tanggal', 'asc')->get();

        return view('dashboard', compact(
             'jadwalKadis'
        ));
    }
}
