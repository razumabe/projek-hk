<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Payment;

class PaymentController extends Controller
{
    public function index(){
        return view('payment');
    }

    public function store(Request $request){
        $request->validate([
            'nama_pengirim' => 'required|string',
            'rekening_pengirim' => 'required|string',
            'nominal' => 'required|numeric',
            'pesan' => 'required|string',
        ]);

        // Simpan data pembayaran ke dalam database
        Payment::create([
            'nama_pengirim' => $request->nama_pengirim,
            'rekening_pengirim' => $request->rekening_pengirim,
            'nominal' => $request->nominal,
            'pesan' => $request->pesan,
        ]);

        return redirect()->back()->with('success', 'Pembayaran berhasil disimpan.');
    }

    public function adminIndex(){
        $payment = Payment::all();
        return view('admin.payment.index', compact('payment'));
    }
}
