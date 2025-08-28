<?php

namespace App\Http\Controllers;

use App\Exports\IzinDispenExport;
use App\Models\Izin;
use App\Models\Dispen;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class GuruController extends Controller
{
    public function index() {
        $izin = Izin::all();
        $dispen = Dispen::all();
        return view('guru.data', compact('izin', 'dispen'));
    }

    public function updateIzinValidasi(Request $request, $id) {
        $izin = Izin::findOrFail($id);
        $izin->validasi = $request->input('validasi');
        $izin->save();
        return redirect()->route('guru.data');
    }

    public function updateDispenValidasi(Request $request, $id) {
        $dispen = Dispen::findOrFail($id);
        $dispen->validasi = $request->input('validasi');
        $dispen->save();
        return redirect()->route('guru.data');
    }
    public function exportIzinDispen()
    {
        return Excel::download(new IzinDispenExport, 'izin_dispen_per_kelas.xlsx');
    }

    public function diagramUtama()
{
    // Gunakan REGEXP untuk menghindari tumpang tindih X, XI, XII
    $izinCounts = [
        'X' => Izin::whereRaw("kelas REGEXP '^X[A-Z]$'")->count(),
        'XI' => Izin::whereRaw("kelas REGEXP '^XI[A-Z]$'")->count(),
        'XII' => Izin::whereRaw("kelas REGEXP '^XII[A-Z]$'")->count(),
    ];

    $dispenCounts = [
        'X' => Dispen::whereRaw("kelas REGEXP '^X[A-Z]$'")->count(),
        'XI' => Dispen::whereRaw("kelas REGEXP '^XI[A-Z]$'")->count(),
        'XII' => Dispen::whereRaw("kelas REGEXP '^XII[A-Z]$'")->count(),
    ];

    // Ambil hanya array nilai agar cocok dengan Chart.js (bukan object)
    $izinData = array_values($izinCounts);
    $dispenData = array_values($dispenCounts);

    return view('guru.diagram', compact('izinData', 'dispenData'));
}

public function diagramKelas($kelas)
{
    $subKelas = ['A', 'B', 'C', 'D', 'E', 'F', 'G']; // Subkelas yang ada
    $data = [];

    foreach ($subKelas as $sk) {
        $data['izin'][] = Izin::where('kelas', $kelas . $sk)->count();
        $data['dispen'][] = Dispen::where('kelas', $kelas . $sk)->count();
    }

    return view('guru.diagram_kelas', [
        'kelas' => $kelas,
        'subKelas' => $subKelas,
        'data' => $data,
    ]);
}

public function diagramPerSiswa($kelas, $subkelas)
{
    $dataSiswa = Izin::where('kelas', $kelas . $subkelas)->get();

    return view('guru.diagram_siswa', compact('kelas', 'subkelas', 'dataSiswa'));
}


}
