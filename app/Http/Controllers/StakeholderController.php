<?php

namespace App\Http\Controllers;

use App\Models\Pengguna;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator; // Tambahkan baris ini

class StakeholderController extends Controller
{
    public function password(){
        //Menampilkan view pergantian password apabila user belum pernah login
        $user = Pengguna::find(Auth::user()->id);
        if($user->isLogin == 1){
            return redirect(route('home'));
        }else{
            return view('password',compact('user'));
        }
    }

    public function passstore(Request $request, $id){
        //fungsi store data password baru pengganti password lama ketika pertama login

        // Menggunakan Validator
        $validator = Validator::make($request->all(), [
            'password' => 'required|min:6|confirmed',
        ]);

        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        }

        $data = Pengguna::find($id);

        if (Hash::check($request->password, $data->password)) {
            return back()->with('alert', 'Password tidak boleh sama dengan password lama.');
        } else {
            $data->password = Hash::make($request->password);
            $data->isLogin = '1';
            $data->save();

            return redirect()->route('admin');
        }
    }
}
