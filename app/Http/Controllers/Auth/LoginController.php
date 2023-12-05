<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;




class LoginController extends Controller
{
    protected function guard()
    {
        return Auth::guard('pengguna'); // Sesuaikan dengan nama guard Anda
    }
    
    public function showLoginForm()
    {
        return view('auth.login'); // Gantilah 'auth.login' dengan nama view formulir login Anda.
    }


    public function login(Request $request)
    {
        $input = $request->all();

        $this->validate($request, [
            'username' => 'required',
            'password' => 'required',
        ]);

        $fieldType = filter_var($request->username, FILTER_VALIDATE_EMAIL) ? 'email' : 'nim';
        if (Auth::attempt([$fieldType => $input['username'], 'password' => $input['password']])) 
        {
            $pengguna = Auth::user();
            // dd($pengguna->roles);
            if ($pengguna->isLogin == 1) {
                return redirect()->route('admin'); 
            } else {
                return redirect()->route('password');
            }
        } else {
            return redirect()->route('login')
                ->with('alert', 'NIM / Email-Address And Password Salah.');
        }
    }

    public function logout()
    {
        Auth::logout(); // Melakukan logout pengguna
        return redirect()->route('home'); // Redirect kembali ke halaman login atau halaman utama setelah logout.
    }
}
