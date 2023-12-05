<?php

namespace App\Http\Controllers;

use App\Models\Exam;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class ExamController extends Controller
{
    public function index()
    {
        $exams = Exam::with('santri', 'mapel')->get();
        
        return view('pengajar.nilai.index', ['exams' => $exams]);
    }
}
