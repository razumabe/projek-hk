<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class MapelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $mapels = [
            ['kode' => 'BA', 'nama' => 'Bahasa Arab'],
            ['kode' => 'AQ', 'nama' => 'Aqidah'],
            ['kode' => 'FI', 'nama' => 'Fiqh'],
            ['kode' => 'HA', 'nama' => 'Hadist'],
            ['kode' => 'BI', 'nama' => 'Bahasa Indonesia'],
            ['kode' => 'EN', 'nama' => 'Bahasa Inggris'],
            ['kode' => 'MT', 'nama' => 'Matematika'],
            ['kode' => 'IPA', 'nama' => 'IPA'],
            ['kode' => 'IPS', 'nama' => 'IPS'],
            ['kode' => 'TIK', 'nama' => 'TIK'],
            ['kode' => 'DG', 'nama' => 'Desain Grafis'],
            ['kode' => 'PROG', 'nama' => 'Pemrograman'],
            ['kode' => 'PJ', 'nama' => 'Penjasorkes'],
        ];

        DB::table('mapels')->insert($mapels);
    }
}
