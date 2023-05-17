<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;


class Admin extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       User::create([
            'nama' => 'Admin Dinas',
            'email'=> 'dinas@gmail.com',
            'tanggal_daftar' => now(),
            'akses' => 'Admin',
            'email_verified_at' => now(),
            'password' => bcrypt('1234567890'),
            'remember_token' => Str::random(10)
        ]);
    }
}
