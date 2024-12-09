<?php

namespace Database\Seeders;

use App\Models\Ruangan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class RuanganSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Ruangan::insert([
            [
                'nama' => 'Germas',
                'deskripsi' => '',
                'uuid' => Str::uuid(), // Generate UUID
            ],
            [
                'nama' => 'Cerdik',
                'deskripsi' => '',
                'uuid' => Str::uuid(), // Generate UUID
            ],
            
        ]);
    }
}
