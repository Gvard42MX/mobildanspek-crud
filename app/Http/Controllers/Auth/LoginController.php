<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    // Menampilkan halaman login
    public function showLoginForm()
    {
        return view('auth.login'); // Menampilkan view untuk login
    }

    // Menangani proses login
    public function login(Request $request)
    {
        // Validasi input
        $request->validate([
            'login' => 'required', // Bisa berupa nama atau email
            'password' => 'required',
        ]);

        // Tentukan apakah input yang diberikan adalah email atau nama
        $loginType = filter_var($request->login, FILTER_VALIDATE_EMAIL) ? 'email' : 'name';

        // Ambil login credentials berdasarkan tipe (email atau nama)
        $credentials = [
            $loginType => $request->login,
            'password' => $request->password,
        ];

        // Coba login menggunakan kredensial yang disediakan
        if (Auth::attempt($credentials)) {
            // Jika berhasil login, redirect ke halaman CRUD Mobil
            return redirect()->route('mobils.index')->with('success', 'Logged in successfully.');
        }

        // Jika login gagal, kembali ke halaman login dengan error
        return back()->withErrors([
            'login' => 'The provided credentials do not match our records.',
        ]);
    }

    // Menangani proses logout
    public function logout(Request $request)
    {
        Auth::logout();
        return redirect('/login');  // Redirect ke halaman login setelah logout
    }
}
