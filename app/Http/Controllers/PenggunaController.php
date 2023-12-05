<?php

namespace App\Http\Controllers;

use App\Models\Pengguna;
use App\Models\Role;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PenggunaController extends Controller
{
    public function index()
    {
        $pengguna = Pengguna::all();
        return view('admin.users.index', compact('pengguna'));
    }

    public function create(){
        $roles = Role::all(); // Ambil semua data role
        return view('admin.users.create', compact('roles'));
    }

    public function store(Request $request){
        $validatedData = $request->validate([
            'name' => 'required',
            'nim' => 'required|unique:penggunas|min:6',
            'email' => 'required|email|unique:penggunas',
            'password' => 'required|min:6|confirmed',
            'roles' => 'required|array|min:1',
            'roles.*' => 'exists:roles,id',
        ]);

        $pengguna = Pengguna::create([
            'name' => $validatedData['name'],
            'nim' => $validatedData['nim'],
            'email' => $validatedData['email'],
            'password' => Hash::make($validatedData['password']),
            'role_id' => $validatedData['roles'][0], // Ambil role pertama dari array roles
        ]);
    
        $pengguna->roles()->attach($validatedData['roles']);

        return redirect('/admin/users')->with('message','User baru berhasil dibuat!');
    }

    public function edit($id)
    {
        $pengguna = Pengguna::findOrFail($id);
        $roles = Role::all(); // Ambil semua data role
        return view('admin.users.edit', compact('pengguna', 'roles'));
    }

    public function update($id, Request $request)
    {
        $pengguna = Pengguna::findOrFail($id);

        $validatedData = $request->validate([
            'name' => 'required',
            'nim' => 'required|min:6|unique:penggunas,nim,' . $id,
            'email' => 'required|email|unique:penggunas,email,' . $id,
            'roles' => 'required|array|min:1',
            'roles.*' => 'exists:roles,id',
        ]);

        // Cek apakah tombol Reset Password ditekan
        if ($request->input('action') === 'password') {
            // Lakukan reset password sesuai dengan NIP/NIM
            $newPassword = $validatedData['nim']; // Gunakan NIP/NIM sebagai password baru
            $pengguna->password = Hash::make($newPassword);
            $pengguna->save();
            
            return redirect('/admin/users')->with('message', 'Password berhasil direset.');
        }

        $pengguna->update([
            'name' => $validatedData['name'],
            'nim' => $validatedData['nim'],
            'email' => $validatedData['email'],
        ]);

        $pengguna->roles()->sync($validatedData['roles']); // Menggunakan sync untuk mengatur roles

        return redirect('/admin/users')->with('message', 'User berhasil diupdate');
        
    }

    public function destroy($id){
        $pengguna = Pengguna::find($id);
        $pengguna->delete();
        return redirect('/admin/users')->with('message', 'User berhasil dihapus!');
    }

    public function resetPassword($nim)
    {
        $pengguna = Pengguna::where('nim', $nim)->firstOrFail();

        $newPassword = $pengguna->nim; // Gunakan NIM sebagai password baru
        $pengguna->password = Hash::make($pengguna->nim);
        $pengguna->save();

        return redirect()->route('admin.users.index')->with('message', 'Password berhasil direset menjadi NIM.');
    }

}
