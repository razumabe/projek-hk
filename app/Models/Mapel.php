<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mapel extends Model
{
    use HasFactory;

    protected $fillable = ['kode', 'nama'];

    public function exams()
    {
        return $this->hasMany(Exam::class);
    }
}
