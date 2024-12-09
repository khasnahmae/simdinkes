<?php

namespace Database\Seeders;

use App\Models\Ttd;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TtdSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Ttd::insert([
            [
                'nama_kasie' => 'Sandi',
                'ttd_kasie' => 'kasie.png',
                'nama_pimpinan' => 'Windi',
                'ttd_pimpinan' => 'pimpinan.png',
            ],
            
        ]);
    }
}
