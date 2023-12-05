<?php

namespace App\Models;

use App\Models\Exam;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Santri extends Model
{
    use HasFactory;

    protected $fillable = ['nis', 'nama', 'kelas', 'tahun_ajaran', 'status'];

    public function exams()
    {
        return $this->hasMany(Exam::class);
    }

}
