<?php

namespace App\Http\Controllers;

use App\Imports\SantriImport;
use App\Models\Santri;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class SantriController extends Controller
{
    public function index(){
        $santri = Santri::all();
        return view('pengajar.santri.index', compact('santri'));
    }

    public function create()
    {
        return view('pengajar.santri.create');
    }

    public function store(Request $request){
        $validatedData = $request->validate([
            'nis' => 'required|unique:santris', // Pastikan NIS unik
            'nama' => 'required',
            'kelas' => 'required',
            'tahun_ajaran' => 'required',
            'status' => 'required',
        ]);

        Santri::create($validatedData);

        return redirect()->route('santris.index')->with('success', 'Data santri telah ditambahkan.');
    }

    public function edit($id)
    {
        $santri = Santri::findOrFail($id);
        return view('pengajar.santri.edit', compact('santri'));
    }



    public function importSantri(Request $request){
        $request->validate([
            'file' => 'required|file|mimes:xls,xlsx',
        ]);

        $file = $request->file('file');

        Excel::import(new SantriImport, $file);
        session()->flash('success', 'Data santri berhasil diimpor.');

        return redirect()->route('santris')->with('success', 'Data Santri berhasil diimpor.');
    }
}
