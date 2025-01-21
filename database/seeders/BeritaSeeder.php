<?php

namespace Database\Seeders;

use App\Models\Berita;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BeritaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Berita::insert([
            [
                'created_at' => '2025-01-20 16:55:42',
                'judul' => 'Gelas Anting',
                'foto' => 'kampanye.png',
                'subjudul' => 'Gerakan Langsung Atasi Stunting',
                'isi' => 'Penyerahan bantuan pangan olahan diet khusus berupa susu bagi keluarga baduta stunting di Kelurahan Kaligangsa dilakukan sebagai bentuk kegiatan pendampingan OPD Dinas Kesehatan dalam program Bapak Asuh Stunting. Kegiatan yang dilaksanakan pada 5 Agustus 2024 di Pendopo Kelurahan Kaligangsa menghadirkan seluruh sasaran stunting di wilayah tersebut yaitu 8 baduta. Bantuan tersebut diserahkan secara simbolis oleh Ibu Sekretaris Dinas Kesehatan, Ibu Sekretaris Camat Margadana, Bapak Lurah Kaligangsa, dan Ibu Kepala Puskesmas Kaligangsa serta Bapak Kepala Bidang SDMK Dinas Kesehatan Kota Tegal.'
            ],
            [
                'created_at' => '2025-01-15 09:55:42',
                'judul' => 'Imunisasi Polio',
                'foto' => 'vaksinasi.png',
                'subjudul' => 'Sub PIN Polio disambut oleh para ibu balita dengan mendatangi posyandu untuk mendapatkan tetes manis pencegah polio',
                'isi' => 'Ibu Ketua Penggerak PKK Kota Tegal Ny Roro Kusnabila Erfa Dedy Yon Supriyono didampingi Ibu Sekretaris Dinas Kesehatan DrSri Retno Hendrawati, MM juga turut memberikan dukungan suksesnya prpogram Sub PIN Polio dengan menghadiri dan memberikan secar langsung tetes polio pada bayi yang hadir di Posyandu. Tercatat sebanyak 27.674 sasaran bayi bailta dan anak usia 0-10 tahun 11 bulan di Kota Tegal telah mendapatkan tetes manis Polio putaran pertama sejak digelar tanggan 15 Januari 2024 hingga 20 Januari 2024 di Posyandu PAUD TK dan SD serta Puskesmas. Selanjutnya putaran kedua akan digelar di bulan Februari 2024.'
            ],
            [
                'created_at' => '2025-01-11 07:55:42',
                'judul' => 'Penyerahan Vitamin A',
                'foto' => 'berita3.png',
                'subjudul' => 'Penyerahan Vitamin A kepada Posyandu menandai dimulainya Buan Vitamin A pada Februari 2024',
                'isi' => 'Ibu Kepala DinasKesehatan Kota Tegal yang juga berprofesi sebagai Nutrisionis Puskesmas Kota Tegal Timur menyerahkan Vitamin A pada Posyandu di Wilayah Puskesmas Tegal Timur dalam Pertemuan rutin Kader Kesehatan Puskesmas Tegal Timur. Pemberian Vitamin A pada balita akan dilaksanakan di setiap Posyandu ppada Bulan Februari dan Agustus 2024. Selain Vitamin A pada buan Februari mendatang juga akan dilaksanakan Tetes Polio putaran kedua dan Pemberian Obat Cacing. MAri dukung dan Sukseskan program-program esensial bagikesehatan khususnya bayi dan balita.'
            ],
            [
                'created_at' => '2025-01-05 08:55:42',
                'judul' => 'Borong Juara di Lomba Hari Jadi Kota Tegal',
                'foto' => 'berita4.png',
                'subjudul' => 'Dinas Kesehatan Kota Tegal sukses memborong juara di Lomba Hari Jadi Kota Tegal.',
                'isi' => 'Hari Selasa, 30 April 2024, Dinas Kesehatan Kota Tegal yang diwakili Aziz Putra dan Ulfa Rosiani suksesmenjadi Juara Tiga Kelompok Putra dan Kelompok Putri pada Lomba Maca Tegalan yang diadakan Pemkot Tegal.'
            ],
            [
                'created_at' => '2025-01-01 07:55:42',
                'judul' => 'Sosialisasi dan Kick-Off',
                'foto' => 'berita5.png',
                'subjudul' => 'Sosialisasi dan Kick-Off pelaksanaan integrasi pelayanan kesehatan primer.',
                'isi' => 'Pada hari ini Rabu 24 Juli 2024 bertempat di Hall Room Premier Hotel telah terlaksana Kick Off Penerapan Integrasi Pelayanan Kesehatan Primer oleh Bapak Sekretaris Daerah Kota Tegal disaksikan Ibu Kepala Bidang Kesehatan Masyarakat Dinas Kesehatan Provinsi Jawa Tengah. Pada kesempatan ini juga diserahkan secara simbolis Surat Keputusan Wali Kota Tegal tentang Penerapan Pelaksanaan Integrasi Pelayanan Kesehatan Primer beserta Buku Petunjuk Teknis Integrasi Layanan Primer (ILP) kepada Puskesmas Tegal Timur dr Bambang Kuswanto dan Puskesmas Tegal Selatan dr Bagus S, serta penyerahan Buku Bacaan Kader dan Pin Tanda Kecakapan Kader Madya kepada Kader Kesehatan Kelurahan Kraton Ibu Rosiana dan Kader Kesehatan Kelurahan Sumurpanggang Ibu Atik.'
            ],

        ]);
    }
}
