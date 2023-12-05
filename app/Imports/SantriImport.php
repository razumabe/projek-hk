<?php

namespace App\Imports;

use App\Models\Santri;
use Maatwebsite\Excel\Concerns\ToModel;

class SantriImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row){
        return new Santri([
            'nis' => $row[0],
            'nama' => $row[1],
            'kelas' => $row[2],
            'tahun_ajaran' => $row[3],
            'status' => $row[4],
        ]);
    }
}
