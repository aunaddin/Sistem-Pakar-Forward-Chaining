<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name'     => 'developer',
            'username' => 'adminwan',
            'email'    => 'adminwan1@gmail.com', // ganti dengan email kamu
            'password' => Hash::make('adminwan'), // ganti password sesuai keinginan
        ]);
    }
}