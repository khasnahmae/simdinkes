<?php

namespace Database\Seeders;

use App\Models\Kendaraan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;


class KendaraanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Kendaraan::insert([
            [
                'uuid' => Str::uuid(), // Generate UUID
                'nopol' => 'G8099XE',
                'bbm_limit' => '1000000',
                'nama_kendaraan' => 'Pickup Panther Biru',
                'jenis' => 'Mbrg/pick Up',
                'tahun' => '1997',
                'warna' => 'Biru',
                'no_rangka' => 'MHCTBR54BVC066754',
                'no_mesin' => 'E066754',
                'jenis_bbm' => 'Dexlite',
                'tipe' => 'Izuzu Tbr 54 Prlc / Panther/ Bonte',
            ],
            [
                'uuid' => Str::uuid(), // Generate UUID
                'nopol' => 'G1056XE',
                'bbm_limit' => '1000000',
                'nama_kendaraan' => 'Kijang Biru Umpeg',
                'jenis' => 'Mpnp/minibus',
                'tahun' => '2001',
                'warna' => 'Biru',
                'no_rangka' => 'MHF11KF8310044114',
                'no_mesin' => '7K0465908',
                'jenis_bbm' => 'Pertamax',
                'tipe' => 'Toyota Kijang Spr Lg/kf83',
            ],
            [
                'uuid' => Str::uuid(), // Generate UUID
                'nopol' => 'G9012XE',
                'bbm_limit' => '1000000',
                'nama_kendaraan' => 'Ambulance Labkes',
                'jenis' => 'Ransus/mnb Ambulance',
                'tahun' => '2009',
                'warna' => 'Silver',
                'no_rangka' => 'MHYGDN42V9J329298',
                'no_mesin' => 'G15AID195996',
                'jenis_bbm' => 'Pertalite',
                'tipe' => 'Suzuki Apv Dlx Mt Gc415v',
            ],
            [
                'uuid' => Str::uuid(), // Generate UUID
                'nopol' => 'G67E',
                'bbm_limit' => '1000000',
                'nama_kendaraan' => 'Inova Kepala Dinas',
                'jenis' => 'Mpnp/minibus',
                'tahun' => '2014',
                'warna' => 'Hitam',
                'no_rangka' => 'MHFXW42G9E2283514',
                'no_mesin' => '1TR7755277',
                'jenis_bbm' => 'Pertamax',
                'tipe' => '-',
            ],

        ]);
    }
}
