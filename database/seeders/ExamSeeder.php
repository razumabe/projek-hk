<?php

namespace Database\Seeders;

use App\Models\Mapel;
use App\Models\Santri;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ExamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $santris = Santri::all();
        $mapels = Mapel::all();
        
        // Loop untuk setiap santri, mata pelajaran, dan tahun ajaran
        foreach ($santris as $santri) {
            foreach ($mapels as $mapel) {
                // Misalnya, kita akan mengisi nilai random untuk UTS dan UAS
                $nilai_uts = rand(50, 100);
                $nilai_uas = rand(50, 100);
                
                // Tambahkan data nilai ke dalam tabel exams
                DB::table('exams')->insert([
                    'santri_id' => $santri->id,
                    'mapel_id' => $mapel->id,
                    'tahun_ajaran' => 2023, // Tahun ajaran sesuaikan dengan yang digunakan
                    'nilai_uts' => $nilai_uts,
                    'nilai_uas' => $nilai_uas,
                ]);
            }
        }
    }
}
