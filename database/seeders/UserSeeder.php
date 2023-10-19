<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name'=>'Admin',
            'role'=>'admin',
            'email'=>'admin@gmail.com',
            'password'=>Hash::make('admin@gmail.com'),
        ]);
        User::create([
            'name'=>'User',
            'role'=>'user',
            'email'=>'user@gmail.com',
            'password'=>Hash::make('user@gmail.com'),
        ]);
    }
}
