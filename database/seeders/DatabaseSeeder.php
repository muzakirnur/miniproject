<?php

namespace Database\Seeders;

use App\Models\Dosen;
use App\Models\Enrollment;
use App\Models\Mahasiswa;
use App\Models\Matakuliah;
use App\Models\User;
use Database\Factories\EnrollmentFactory;
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
        User::factory(100)->create();
        Dosen::factory(10)->create();
        Matakuliah::factory(10)->create();
        Mahasiswa::factory(100)->create();
        Enrollment::factory(100)->create();
        User::create([
            'name' => 'Muzakir Nur',
            'email' => 'muzakir@km.solutif.co.id',
            'access' => true,
            'password' => bcrypt('password')
        ]);
    }
}
