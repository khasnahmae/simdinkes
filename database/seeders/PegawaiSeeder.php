<?php

namespace Database\Seeders;

use App\Models\Pegawai;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class PegawaiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Pegawai::insert([
            [
                'user_id' => '1',
                'nama' => 'Sandi',
                'nip' => '12345',
                'bidang' => 'Umum',
                'uuid' => Str::uuid(), // Generate UUID
            ],
            [
                'user_id' => '2',
                'nama' => 'Rahma',
                'nip' => '123456',
                'bidang' => 'Umum',
                'uuid' => Str::uuid(), // Generate UUID
            ],
            [
                'user_id' => '3',
                'nama' => 'Windi',
                'nip' => '1234567',
                'bidang' => 'Umum',
                'uuid' => Str::uuid(), // Generate UUID
            ],
            [
                'user_id' => '4',
                'nama' => 'Husni Ari',
                'nip' => '12345678',
                'bidang' => 'Umum',
                'uuid' => Str::uuid(), // Generate UUID
            ],
        ]);
    }
}
