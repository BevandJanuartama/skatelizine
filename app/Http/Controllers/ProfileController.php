<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use RealRashid\SweetAlert\Facades\Alert;

class ProfileController extends Controller
{
    // Menampilkan halaman profil
    public function index()
    {
        $profile = Auth::user();
        return view('siswa.profile', compact('profile'));
    }
    

    // Memperbarui data profil
    public function update(Request $request)
    {
        // Validasi input
        $request->validate([
            'alamat' => 'required|string|max:255', 
            'password' => 'nullable|string|min:8|confirmed', 
        ]);

        // Mendapatkan user yang sedang login
        $user = Auth::user();
        
        // Jika user tidak ditemukan
        if (!$user) {
            return redirect()->route('siswa.profile')->with('error', 'User tidak ditemukan');
        }

        // Update request
        $user->alamat = $request->alamat;
        $user->password = $request->password;

        // Update password jika diisi
        if ($request->filled('password')) {
        }

        // Menyimpan perubahan
        try {         
            /** @var \App\Models\User $user **/
            $user->save();
            Alert::success('Berhasil !!!', 'Profil berhasil diperbarui');
                return redirect()->route('siswa.profile');

        }   catch (\Exception $e) {
            Alert::error('Gagal !!!', 'Password dan konfirmasi password tidak cocok');
                return redirect()->route('siswa.profile');
        }
    }
}
