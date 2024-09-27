<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::insert([
            [
                'username' => 'admin',
                'password' => bcrypt('admin123'),
                'level' => 'admin',
            ],
            [
                'username' => 'operator',
                'password' => bcrypt('operator123'),
                'level' => 'operator',
            ],
            [
                'username' => 'sandi',
                'password' => bcrypt('sandi123'),
                'level' => 'admin',
            ],
            [
                'username' => 'lisa',
                'password' => bcrypt('lisa123'),
                'level' => 'admin',
            ],
            [
                'username' => 'rahma',
                'password' => bcrypt('rahma123'),
                'level' => 'admin',
            ],
        ]);
    }
}
