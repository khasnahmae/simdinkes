<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::insert([
            [
                'username' => 'sandi',
                'password' => bcrypt('sandi123'),
                'level' => 'admin',
                'uuid' => Str::uuid(), // Generate UUID
            ],
            [
                'username' => 'rahma',
                'password' => bcrypt('rahma123'),
                'level' => 'admin',
                'uuid' => Str::uuid(), // Generate UUID
            ],
            [
                'username' => 'pimpinan',
                'password' => bcrypt('pimpinan123'),
                'level' => 'pemimpin',
                'uuid' => Str::uuid(), // Generate UUID
            ],
            [
                'username' => 'husniari',
                'password' => bcrypt('operator123'),
                'level' => 'operator',
                'uuid' => Str::uuid(), // Generate UUID
            ],
        ]);
    }
}
