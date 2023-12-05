<?php

namespace App\Models;

use App\Models\Mapel;
use App\Models\Santri;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Exam extends Model
{
    use HasFactory;

    protected $fillable = [
        'santri_id',
        'mata_pelajaran_id',
        'tahun_ajaran',
        'nilai_uts',
        'nilai_uas',
    ];

    public function santri()
    {
        return $this->belongsTo(Santri::class);
    }

    public function mapels()
    {
        return $this->belongsTo(Mapel::class);
    }
}
