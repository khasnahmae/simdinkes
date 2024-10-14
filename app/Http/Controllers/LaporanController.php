<?php

namespace App\Http\Controllers;

use App\Models\Atk;
use App\Models\Bbm;
use App\Models\Kendaraan;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\DB;
use Twilio\Rest\Client;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class LaporanController extends Controller
{
    public function atk(Request $request)
    {
        // Ambil bulan dan tahun dari request, jika tidak ada set default ke bulan dan tahun sekarang
        $month = $request->input('month', date('m'));
        $year = $request->input('year', date('Y'));

        // Ambil data permintaan ATK yang disetujui
        $rekapAtk = Atk::select('barang_id', DB::raw('count(*) as total_permintaan'), DB::raw('sum(jumlah_barang) as total_jumlah'))
                        ->where('status', 'Disetujui Pimpinan')
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
        $rekapBbm = Bbm::select('nopol',
                                 DB::raw('count(*) as total_transaksi'), 
                                 DB::raw('sum(nominal_realisasi) as total_nominal_realisasi'),
                                 DB::raw('sum(nominal) as total_nominal'),
                                 DB::raw('sum(nominal) - sum(nominal_realisasi) as total_selisih'))                   
                        ->where('status', 'Disetujui Pimpinan')
                        ->where('realisasi', 'Sudah Direalisasi')
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
        $rekapAtk = Atk::where('status', 'Disetujui Pimpinan')
                        ->whereMonth('tanggal', $month)
                        ->whereYear('tanggal', $year)
                        ->get();

         // Mengatur nama file PDF
         $fileName = "rekap_bulanan_atk_{$monthName}_{$year}.pdf";

         $pdf = PDF::loadView('rekap.pdfatk', compact('rekapAtk', 'monthName', 'year'));
         return $pdf->download($fileName);

    }

    public function excelatk(Request $request)
    {
        $month = $request->input('month', date('m'));
        $year = $request->input('year', date('Y'));

        // Ambil data yang sama untuk diunduh
        $rekapAtk = Atk::where('status', 'Disetujui Pimpinan')
                        ->whereMonth('tanggal', $month)
                        ->whereYear('tanggal', $year)
                        ->get();

        // Nama file
        $fileName = "rekap_bulanan_atk_{$month}_{$year}.csv";

        // Set header untuk download file
        header('Content-Type: text/csv');
        header('Content-Disposition: attachment; filename="' . $fileName . '"');

        // Membuat file CSV
        $output = fopen('php://output', 'w');
        
        // Menambahkan header kolom
        fputcsv($output, ['ID','Tanggal', 'Nama Barang', 'Jumlah', 'Pegawai']);

        // Menambahkan data
        foreach ($rekapAtk as $atk) {
            fputcsv($output, [$atk->id, $atk->tanggal, $atk->barang->nama_barang, $atk->jumlah_barang, $atk->pegawai->nama]);
        }

        fclose($output);
        exit();
        
    }

    public function excelbbm(Request $request)
    {
        $month = $request->input('month', date('m'));
        $year = $request->input('year', date('Y'));

        // Ambil data yang sama untuk diunduh
        $rekapBbm = Bbm::where('status', 'Disetujui Pimpinan')
                        ->where('realisasi', 'Sudah Direalisasi')
                        ->whereMonth('tanggal', $month)
                        ->whereYear('tanggal', $year)
                        ->get();

        // Nama file
        $fileName = "rekap_bulanan_bbm_{$month}_{$year}.csv";

        // Set header untuk download file
        header('Content-Type: text/csv');
        header('Content-Disposition: attachment; filename="' . $fileName . '"');

        // Membuat file CSV
        $output = fopen('php://output', 'w');
        
        // Menambahkan header kolom
        fputcsv($output, ['ID','Tanggal','Nomor Polisi', 'Kendaraan', 'Nominal','Nominal Realisasi' , 'Selisih', 'Pegawai']);

        // Menambahkan data
        foreach ($rekapBbm as $bbm) {
            fputcsv($output, [$bbm->id, $bbm->tanggal, $bbm->kendaraan->nopol, $bbm->kendaraan->nama_kendaraan, $bbm->nominal, $bbm->nominal_realisasi, $bbm->nominal - $bbm->nominal_realisasi, $bbm->pegawai->nama]);
        }

        fclose($output);
        exit();
        
    }
    

    public function downloadbbm(Request $request)
    {
        $month = $request->input('month', date('m'));
        $year = $request->input('year', date('Y'));

        // Mengubah angka bulan menjadi nama bulan
        $monthName = date('F', mktime(0, 0, 0, $month, 1)); // Contoh: Januari

        $rekapBbm = Bbm::where('status', 'Disetujui Pimpinan')
                        ->where('realisasi', 'Sudah Direalisasi')
                        ->whereMonth('tanggal', $month)
                        ->whereYear('tanggal', $year)
                        ->get();

        // Mengatur nama file PDF
        $fileName = "rekap_bulanan_bbm_{$monthName}_{$year}.pdf";

        $pdf = PDF::loadView('rekap.pdfbbm', compact('rekapBbm' , 'monthName', 'year'));
        return $pdf->download($fileName);
    }

    public function detailatk($uuid)
    {
        $atkDetails = Atk::where('barang_id', $uuid)
                        ->where('status', 'Disetujui Pimpinan')
                        ->get();

        return view('rekap.detailatk', compact('atkDetails'));
    }
    public function detailbbm($uuid)
    {
        $bbmDetails = Bbm::where('nopol', $uuid)
                        ->where('status', 'Disetujui Pimpinan')
                        ->where('realisasi', 'Sudah Direalisasi')
                        ->get();

        return view('rekap.detailbbm', compact('bbmDetails'));
    }

}
