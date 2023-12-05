<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PenggunaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('penggunas')->insert([
            'name' => 'Abu Zakariya Sutrisno',
            'username' => 'sutrisno',
            'password' => 'sutrisno',
            'role' => 'pengajar'
        ]);
    }
}
