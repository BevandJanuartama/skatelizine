<?php 

namespace App\Http\Controllers;

use App\Models\Izin;
use App\Models\Dispen; 
use App\Models\User; 
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class SiswaController extends Controller
{
    public function index()
{
    $nis = session('nis'); // Ambil no_induk dari session

    // Filter data izin dan dispen berdasarkan nis pengguna yang login
    $izin = Izin::where('nis', $nis)->get();
    $dispen = Dispen::where('nis', $nis)->get();

    // Pilih tampilan berdasarkan nama route
    if (request()->route()->getName() == 'siswa.riwayat') {
        return view('siswa.riwayat', compact('izin', 'dispen'));

    } elseif (request()->route()->getName() == 'siswa.beranda') {
        return view('siswa.beranda', compact('izin', 'dispen'));
    }

    return view('siswa.home', compact('izin', 'dispen'));
}


    public function createIzin() {
        // Ambil data siswa yang sedang login berdasarkan NIS yang ada di session
        $nis = session('nis');
        $siswa = User::where('no_induk', $nis)->first();

        return view('siswa.izin', compact('siswa')); 
    }

    public function storeIzin(Request $request) {
        // dd($request->all());
        $request->validate([
            'nis' => 'required',
            'nama' => 'required',
            'kelas' => 'required',
            'jurusan' => 'required',
            'wali_kelas' => 'required',
            'alasan' => 'required',
            'foto' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $fotoPath = $request->file('foto')->store('foto_siswa', 'public');

        Izin::create([
            'nis' => $request->nis,
            'nama' => $request->nama,
            'kelas' => $request->kelas,
            'jurusan' => $request->jurusan,
            'wali_kelas' => $request->wali_kelas,
            'alasan' => $request->alasan,
            'foto' => $fotoPath,
            'validasi' => 'Proses',
        ]);
        Alert::success('Berhasil !!!', 'Izin berhasil diajukan');
        return redirect()->route('siswa.riwayat');
    }

    public function createDispen() {
        // Ambil data siswa yang sedang login berdasarkan NIS yang ada di session
        $nis = session('nis');
        $siswa = User::where('no_induk', $nis)->first();

        return view('siswa.dispen', compact('siswa')); 
    }

    public function storeDispen(Request $request) {
        $request->validate([
            'nis' => 'required',
            'nama' => 'required',
            'kelas' => 'required',
            'jurusan' => 'required',
            'wali_kelas' => 'required',
            'alasan' => 'required',
            'foto' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $fotoPath = $request->file('foto')->store('foto_siswa', 'public');

        Dispen::create([
            'nis' => $request->nis,
            'nama' => $request->nama,
            'kelas' => $request->kelas,
            'jurusan' => $request->jurusan,
            'wali_kelas' => $request->wali_kelas,
            'alasan' => $request->alasan,
            'foto' => $fotoPath,
            'validasi' => 'Proses',
        ]);
        Alert::success('Berhasil !!!', 'Dispen berhasil diajukan');
        return redirect()->route('siswa.riwayat');
    }
}
