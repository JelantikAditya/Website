<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;


class AuthController extends Controller
{
    public function showRegisterForm()
    {
        return view('auth.register');
    }    
    public function showLoginForm()
    {
        return view('auth.login');
    }    
    public

function register(Request $request)
{
    // Validasi input
      $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:5|confirmed',
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->save();

        // Langsung redirect ke halaman login
        return redirect('/login')->with('success', 'Registrasi berhasil! Silakan login.');

}    
 public function login(Request $request)
{
    // Validasi input
    $request->validate([
        'email' => 'required|email', // Tambahkan validasi format email
        'password' => 'required'
    ]);

    // Cari user berdasarkan email
    $user = User::where('email', $request->email)->first();

    // Cek apakah user ada dan password cocok
    if (!$user || !Hash::check($request->password, $user->password)) {
        // Jika gagal, kembalikan ke halaman sebelumnya dengan pesan error
        return back()->with('error', 'Email atau password salah!');
    }

    // Jika berhasil, simpan data user ke session
    // Menggunakan pendekatan yang lebih eksplisit untuk menyimpan detail penting
    session([
        'logged_in' => true,      // Tanda bahwa user sudah login
        'user_id'   => $user->id,
        'user_name' => $user->name,
        'user'      => $user      // Opsional: Simpan seluruh objek user
    ]);

    // Redirect ke halaman dashboard
    return redirect('/dashboard');
}

 public function logout(Request $request)
{
    // Hapus semua data session
    session()->flush();
    // Redirect ke halaman login
    return redirect('/login');
}
}
