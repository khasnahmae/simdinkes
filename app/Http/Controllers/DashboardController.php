<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use App\Models\Barang;
use App\Models\Bbm;
use App\Models\Atk;
use App\Models\JadwalKadis;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $jumlahPegawai = Pegawai::count();
        $jadwalKadis = JadwalKadis::whereDate('tgl_mulai', '>=', now()->toDateString())->orderBy('tgl_mulai', 'asc')->get();

        $currentMonth = Carbon::now()->month;
        $totalBbm = Bbm::whereMonth('tanggal', $currentMonth)
                        ->where('status', 'disetujui')  // Sesuaikan dengan field 'status'
                        ->sum('nominal');

        // Total permintaan ATK yang disetujui di bulan ini
        $totalAtk = Atk::whereMonth('tanggal', $currentMonth)
                        ->where('status', 'disetujui')  
                        ->sum('jumlah_barang');


        // Ambil data BBM yang disetujui per bulan per kendaraan
        $bbmPerKendaraan = DB::table('bbm')
            ->select(
                DB::raw('MONTH(tanggal) as bulan'),
                'nama_kendaraan',
                DB::raw('SUM(nominal) as total_nominal')
            )
            ->where('status', 'disetujui')
            ->groupBy('bulan', 'nama_kendaraan')
            ->orderBy('bulan')
            ->get();

        // Nama kendaraan yang unik
        $vehicles = $bbmPerKendaraan->groupBy('nama_kendaraan');
        $months = range(1, 12);  // Bulan dari Januari sampai Desember

        // Daftar warna yang akan digunakan
        $colors = [
            'rgba(255, 99, 132, 0.2)',  // Merah
            'rgba(54, 162, 235, 0.2)',  // Biru
            'rgba(255, 206, 86, 0.2)',  // Kuning
            'rgba(75, 192, 192, 0.2)',  // Hijau
            'rgba(153, 102, 255, 0.2)', // Ungu
            'rgba(255, 159, 64, 0.2)',  // Oranye
        ];

        $borderColors = [
            'rgba(255, 99, 132, 1)',  // Merah
            'rgba(54, 162, 235, 1)',  // Biru
            'rgba(255, 206, 86, 1)',  // Kuning
            'rgba(75, 192, 192, 1)',  // Hijau
            'rgba(153, 102, 255, 1)', // Ungu
            'rgba(255, 159, 64, 1)',  // Oranye
        ];

        $datasets = [];
        $colorIndex = 0;
        foreach ($vehicles as $vehicleName => $data) {
            $dataset = [
                'label' => $vehicleName,
                'data' => array_fill(0, 12, 0),  // Isi dengan 0 untuk setiap bulan
                'backgroundColor' => $colors[$colorIndex % count($colors)],
                'borderColor' => $borderColors[$colorIndex % count($borderColors)],
                'borderWidth' => 2,
                'fill' => false
            ];

            foreach ($data as $record) {
                $index = $record->bulan - 1; // Untuk menyesuaikan array (0-indexed)
                $dataset['data'][$index] = $record->total_nominal;
            }

            $datasets[] = $dataset;
            $colorIndex++;  // Naikkan index warna
        }


        $atkPerBarang = DB::table('atk')
            ->join('barang', 'atk.barang_id', '=', 'barang.id')  // Join dengan tabel barang
            ->select(
                DB::raw('MONTH(atk.tanggal) as bulan'),
                'barang.nama_barang',  // Ambil nama barang
                DB::raw('SUM(atk.jumlah_barang) as total_barang')
            )
            ->where('atk.status', 'disetujui')
            ->groupBy('bulan', 'barang.nama_barang')
            ->orderBy('bulan')
            ->get();

        // Nama barang yang unik
        $barang = $atkPerBarang->groupBy('nama_barang');
        $months = range(1, 12);  // Bulan dari Januari sampai Desember

        // Daftar warna yang akan digunakan
        $colors = [
            'rgba(255, 99, 132, 0.2)',  // Merah
            'rgba(54, 162, 235, 0.2)',  // Biru
            'rgba(255, 206, 86, 0.2)',  // Kuning
            'rgba(75, 192, 192, 0.2)',  // Hijau
            'rgba(153, 102, 255, 0.2)', // Ungu
            'rgba(255, 159, 64, 0.2)',  // Oranye
        ];

        $borderColors = [
            'rgba(255, 99, 132, 1)',  // Merah
            'rgba(54, 162, 235, 1)',  // Biru
            'rgba(255, 206, 86, 1)',  // Kuning
            'rgba(75, 192, 192, 1)',  // Hijau
            'rgba(153, 102, 255, 1)', // Ungu
            'rgba(255, 159, 64, 1)',  // Oranye
        ];

        $datasetsatk = [];
        $colorIndex = 0;
        foreach ($barang as $barangName => $data) {
            $dataset = [
                'label' => $barangName,  // Menggunakan nama barang
                'data' => array_fill(0, 12, 0),  // Isi dengan 0 untuk setiap bulan
                'backgroundColor' => $colors[$colorIndex % count($colors)],
                'borderColor' => $borderColors[$colorIndex % count($borderColors)],
                'borderWidth' => 2,
                'fill' => false
            ];

            foreach ($data as $record) {
                $index = $record->bulan - 1; // Untuk menyesuaikan array (0-indexed)
                $dataset['data'][$index] = $record->total_barang;
            }

            $datasetsatk[] = $dataset;
            $colorIndex++;  // Naikkan index warna
        }

        return view('dashboard', compact(
            'jadwalKadis',
            'jumlahPegawai',
            'totalBbm',
            'totalAtk',
            'datasets', // Mengirim datasets ke view
            'datasetsatk' // Mengirim datasetsatk ke view
        ));
    }
}