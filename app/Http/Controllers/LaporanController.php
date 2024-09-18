<?php

namespace App\Http\Controllers;

use App\Models\Atk;
use App\Models\Bbm;
use Barryvdh\DomPDF\Facade\Pdf;

use Illuminate\Http\Request;

class LaporanController extends Controller
{
    public function index()
    {
        // Hanya ambil data dengan status 'disetujui'
        $laporanAtk = Atk::where('status', 'disetujui')
                        ->whereMonth('tanggal', date('m'))
                        ->whereYear('tanggal', date('Y'))
                        ->get();
        
        $laporanBbm = Bbm::where('status', 'disetujui')
                        ->whereMonth('tanggal', date('m'))
                        ->whereYear('tanggal', date('Y'))
                        ->get();

        return view('laporan.index', compact('laporanAtk', 'laporanBbm'));
    }

    public function download()
    {
        // Hanya ambil data dengan status 'disetujui'
        $laporanAtk = Atk::where('status', 'disetujui')
                        ->whereMonth('tanggal', date('m'))
                        ->whereYear('tanggal', date('Y'))
                        ->get();
        
        $laporanBbm = Bbm::where('status', 'disetujui')
                        ->whereMonth('tanggal', date('m'))
                        ->whereYear('tanggal', date('Y'))
                        ->get();

        $pdf = PDF::loadView('laporan.pdf', compact('laporanAtk', 'laporanBbm'));
        return $pdf->download('laporan_bulanan.pdf');
    }
}
