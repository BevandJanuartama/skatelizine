<?php

namespace App\Exports;

use App\Models\Izin;
use App\Models\Dispen;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Concerns\WithHeadings;

class IzinDispenExport implements WithMultipleSheets
{
    use Exportable;

    public function sheets(): array
    {
        $sheets = [];

        // Ambil semua kelas unik dari tabel Izin dan Dispen
        $kelasIzin = Izin::select('kelas')->distinct()->pluck('kelas');
        $kelasDispen = Dispen::select('kelas')->distinct()->pluck('kelas');

        // Gabungkan kelas dari kedua tabel dan hilangkan duplikat
        $allKelas = $kelasIzin->merge($kelasDispen)->unique();

        foreach ($allKelas as $kelas) {
            $sheets[] = new KelasSheet($kelas);
        }

        return $sheets;
    }
}

class KelasSheet implements FromCollection, WithTitle, WithHeadings
{
    protected $kelas;

    public function __construct($kelas)
    {
        $this->kelas = $kelas;
    }

    public function collection()
    {
        // Ambil data siswa per kelas
        return Izin::select('nis', 'nama', 'kelas', 'jurusan', 'wali_kelas')
            ->where('kelas', $this->kelas)
            ->distinct()
            ->get()
            ->map(function ($siswa) {
                $jumlahIzin = Izin::where('nis', $siswa->nis)->count();
                $jumlahDispen = Dispen::where('nis', $siswa->nis)->count();

                return [
                    'NIS' => $siswa->nis,
                    'Nama' => $siswa->nama,
                    'Kelas' => $siswa->kelas,
                    'Jurusan' => $siswa->jurusan,
                    'Wali Kelas' => $siswa->wali_kelas,
                    'Jumlah Izin' => $jumlahIzin,
                    'Jumlah Dispen' => $jumlahDispen,
                ];
            });
    }

    public function title(): string
    {
        return "Kelas {$this->kelas}";
    }

    public function headings(): array
    {
        return [
            'NIS',
            'Nama',
            'Kelas',
            'Jurusan',
            'Wali Kelas',
            'Jumlah Izin',
            'Jumlah Dispen',
        ];
    }
}
