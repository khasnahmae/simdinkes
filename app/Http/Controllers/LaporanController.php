<?php

namespace App\Http\Controllers;

use App\Models\Atk;
use App\Models\Bbm;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\DB;


use Illuminate\Http\Request;

class LaporanController extends Controller
{
    public function atk(Request $request)
    {
        // Ambil bulan dan tahun dari request, jika tidak ada set default ke bulan dan tahun sekarang
        $month = $request->input('month', date('m'));
        $year = $request->input('year', date('Y'));

        // Ambil data permintaan ATK yang disetujui
        $rekapAtk = Atk::select('barang_id', DB::raw('count(*) as total_permintaan'), DB::raw('sum(jumlah_barang) as total_jumlah'))
                        ->where('status', 'disetujui')
                        ->whereMonth('tanggal', $month)
                        ->whereYear('tanggal', $year)
                        ->groupBy('barang_id')
                        ->with('barang') // Pastikan relasi dengan model Barang
                        ->get();

        return view('rekap.atk', compact('rekapAtk', 'month', 'year'));
    }
    public function bbm(Request $request)
    {
        // Ambil bulan dan tahun dari request, jika tidak ada set default ke bulan dan tahun sekarang
        $month = $request->input('month', date('m'));
        $year = $request->input('year', date('Y'));

        // Ambil data permintaan BBM yang disetujui
        $rekapBbm = Bbm::select('nopol', DB::raw('count(*) as total_transaksi'), DB::raw('sum(nominal) as total_nominal'))
                        ->where('status', 'disetujui')
                        ->whereMonth('tanggal', $month)
                        ->whereYear('tanggal', $year)
                        ->groupBy('nopol')
                        ->get();

        return view('rekap.bbm', compact('rekapBbm', 'month', 'year'));
    }

    public function downloadatk(Request $request)
    {
        $month = $request->input('month', date('m'));
        $year = $request->input('year', date('Y'));

        // Mengubah angka bulan menjadi nama bulan
        $monthName = date('F', mktime(0, 0, 0, $month, 1)); // Contoh: Januari

        // Ambil data yang sama untuk diunduh
        $rekapAtk = Atk::where('status', 'disetujui')
                        ->whereMonth('tanggal', $month)
                        ->whereYear('tanggal', $year)
                        ->get();

         // Mengatur nama file PDF
         $fileName = "rekap_bulanan_atk_{$monthName}_{$year}.pdf";

         $pdf = PDF::loadView('rekap.pdfatk', compact('rekapAtk', 'monthName', 'year'));
         return $pdf->download($fileName);

    }
    public function downloadbbm(Request $request)
    {
        $month = $request->input('month', date('m'));
        $year = $request->input('year', date('Y'));

        // Mengubah angka bulan menjadi nama bulan
        $monthName = date('F', mktime(0, 0, 0, $month, 1)); // Contoh: Januari

        $rekapBbm = Bbm::where('status', 'disetujui')
                        ->whereMonth('tanggal', $month)
                        ->whereYear('tanggal', $year)
                        ->get();

        // Mengatur nama file PDF
        $fileName = "rekap_bulanan_bbm_{$monthName}_{$year}.pdf";

        $pdf = PDF::loadView('rekap.pdfbbm', compact('rekapBbm' , 'monthName', 'year'));
        return $pdf->download($fileName);
    }

    public function detailatk($id)
    {
        $atkDetails = Atk::where('barang_id', $id)
                        ->where('status', 'disetujui')
                        ->get();

        return view('rekap.detailatk', compact('atkDetails'));
    }
    public function detailbbm($id)
    {
        $bbmDetails = Bbm::where('nopol', $id)
                        ->where('status', 'disetujui')
                        ->get();

        return view('rekap.detailbbm', compact('bbmDetails'));
    }

}
