<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // User::insert([
        //     'nim' => '1',
        //     'name' => 'Administrator',
        //     'role' => 'admin',
        //     'avatar' => 'default.jpg',
        //     'password' => Hash::make('12345'),
        // ]);

        User::insert([
            'nim' => '123',
            'name' => 'Poetri Lestari',
            'role' => 'wd3',
            'avatar' => 'default.jpg',
            'password' => Hash::make('12345'),
        ]);

        User::insert([
            'nim' => '1234',
            'name' => 'Mashudin',
            'role' => 'prodi',
            'avatar' => 'default.jpg',
            'password' => Hash::make('12345'),
        ]);

        User::insert([
            'nim' => '12345',
            'name' => 'Ahmad Fadillah',
            'role' => 'mahasiswa',
            'avatar' => 'default.jpg',
            'password' => Hash::make('12345'),
        ]);
    }
}
