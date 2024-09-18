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
                'username' => 'operatoratk',
                'password' => bcrypt('opatk123'),
                'level' => 'opatk',
            ],
            [
                'username' => 'operatorbbm',
                'password' => bcrypt('opbbm123'),
                'level' => 'opbbm',
            ],
            [
                'username' => 'pimpinan',
                'password' => bcrypt('pimpinan123'),
                'level' => 'pimpinan',
            ],
        ]);
    }
}
