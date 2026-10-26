<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\Kelas;
use App\Models\Mapel;
use App\Models\Nilai;
use App\Models\Siswa;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function index(): View
    {
        $totalSiswa = Siswa::count();
        $totalGuru = Guru::count();
        $totalKelas = Kelas::count();
        $totalMapel = Mapel::count();

        $recentSiswa = Siswa::with('kelas')->latest()->take(5)->get();
        $recentNilai = Nilai::with(['siswa', 'mapel'])->latest()->take(5)->get();

        // Data grafik: jumlah siswa per kelas
        $dataKelas = Kelas::withCount('siswas')->orderBy('nama_kelas')->get();
        $grafikKelasLabel = $dataKelas->pluck('nama_kelas')->values();
        $grafikKelasJumlah = $dataKelas->pluck('siswas_count')->values();

        // Data grafik: komposisi kelulusan nilai
        $totalLulus = Nilai::where('keterangan', 'Lulus')->count();
        $totalTidakLulus = Nilai::where('keterangan', 'Tidak Lulus')->count();

        return view('dashboard', compact(
            'totalSiswa',
            'totalGuru',
            'totalKelas',
            'totalMapel',
            'recentSiswa',
            'recentNilai',
            'grafikKelasLabel',
            'grafikKelasJumlah',
            'totalLulus',
            'totalTidakLulus'
        ));
    }
}
