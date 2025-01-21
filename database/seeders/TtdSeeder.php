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
                'nama_kasie' => 'Sandi Saputro, S.Kom',
                'ttd_kasie' => 'ttd1.png',
                'nama_pimpinan' => 'Windi Prasetyo, SE., M.Si',
                'ttd_pimpinan' => 'ttd2.png',
            ],

        ]);
    }
}
