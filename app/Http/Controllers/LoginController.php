<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class LoginController extends Controller
{
    // Menampilkan halaman login
    public function showLoginForm()
    {
        return view('auth.login'); // Pastikan view ini ada
    }

    // Menangani login
    public function login(Request $request)
    {
    // Validasi input
    $request->validate([
        'no_induk' => 'required', 
        'password' => 'required', 
    ]);

    // Mencari kredensial pengguna
    $credentials = $request->only('no_induk', 'password'); 

    // Mencoba melakukan login
    if (Auth::attempt($credentials)) {
    $user = Auth::user();
    session(['nis' => $user->no_induk]);

    // Redirect dengan flash message
    if ($user->level === 'siswa') {
        Alert::success('Berhasil !!!', 'Anda Berhasil Login ');
        return redirect()->route('siswa.home');
        
    } elseif ($user->level === 'guru') {
        Alert::success('Berhasil !!!', 'Anda Berhasil Login ');
        return redirect()->route('guru.data');
    }
    }

    // Jika login gagal, tampilkan debug atau pesan error
    Alert::error('Gagal !!!', 'Nis atau Password Salah');
    return redirect()->route('login');
    }

    // Menangani logout
    public function logout()
    {
        Auth::logout(); // Mengeluarkan pengguna
        session()->forget('nis'); // Hapus session nis
        Alert::success('Berhasil', 'Anda Berhasil Logout');
        return redirect()->route('login'); // Mengarahkan kembali ke halaman login
    }
}
