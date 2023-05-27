<?php

namespace Database\Seeders;

use Database\Seeders\Admin;
use Database\Seeders\Users;
use Database\Seeders\Kecamatan;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(Admin::class);
        $this->call(Users::class);
    }
}
