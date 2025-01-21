<?php

namespace Database\Seeders;

use App\Models\Feedback;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


class FeedbackSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Feedback::insert([
            [
                'kerapihan' => '5',
                'kecepatan' => '5',
                'kepuasan' => '5',
                'deskripsi' => 'Pegawai bekerja dengan sigap melayani masyarakat.',
                'nama' => 'Sarah H',
                'telepon' => '08876538267'
            ],
            [
                'kerapihan' => '5',
                'kecepatan' => '4',
                'kepuasan' => '5',
                'deskripsi' => 'Ya mereka melayani dengan sepenuh hati.',
                'nama' => 'Linda T',
                'telepon' => '08126538267'
            ],
            [
                'kerapihan' => '5',
                'kecepatan' => '5',
                'kepuasan' => '5',
                'deskripsi' => 'Sangat ramah dan pelayanan yang cepat',
                'nama' => 'Noraly S',
                'telepon' => '08566538267'
            ],
            [
                'kerapihan' => '4',
                'kecepatan' => '5',
                'kepuasan' => '5',
                'deskripsi' => 'Sangat puas dengan pelayanan yang diberikan',
                'nama' => 'Acelin',
                'telepon' => '08236538267'
            ],
        ]);
    }
}
