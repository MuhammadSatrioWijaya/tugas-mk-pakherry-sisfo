<?php

namespace App\Http\Controllers;

use App\Models\Mapel;
use App\Models\Nilai;
use App\Models\Siswa;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class NilaiController extends Controller
{
    public function index(): View
    {
        $nilais = Nilai::with(['siswa.kelas', 'mapel'])->latest()->get();

        return view('nilai.index', compact('nilais'));
    }

    public function create(): View
    {
        $siswas = Siswa::with('kelas')->orderBy('nama')->get();
        $mapels = Mapel::orderBy('nama_mapel')->get();

        return view('nilai.create', compact('siswas', 'mapels'));
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $this->validasi($request);

        Nilai::create($this->hitungNilai($validated));

        return redirect()->route('nilai.index')
            ->with('success', 'Data nilai berhasil disimpan.');
    }

    public function edit(Nilai $nilai): View
    {
        $nilai->load(['siswa', 'mapel']);

        $siswas = Siswa::with('kelas')->orderBy('nama')->get();
        $mapels = Mapel::orderBy('nama_mapel')->get();

        return view('nilai.edit', compact('nilai', 'siswas', 'mapels'));
    }

    public function update(Request $request, Nilai $nilai): RedirectResponse
    {
        $validated = $this->validasi($request, $nilai);

        $nilai->update($this->hitungNilai($validated));

        return redirect()->route('nilai.index')
            ->with('success', 'Data nilai berhasil diperbarui.');
    }

    public function destroy(Nilai $nilai): RedirectResponse
    {
        $nilai->delete();

        return redirect()->route('nilai.index')
            ->with('success', 'Data nilai berhasil dihapus.');
    }

    /**
     * Hitung nilai akhir = (tugas * 0.3) + (uts * 0.3) + (uas * 0.4)
     * dan tentukan keterangan berdasarkan KKM mata pelajaran.
     *
     * @param  array<string, mixed>  $data
     * @return array<string, mixed>
     */
    private function hitungNilai(array $data): array
    {
        $mapel = Mapel::findOrFail($data['mapel_id']);

        $nilaiAkhir = round(
            ($data['nilai_tugas'] * 0.3) + ($data['nilai_uts'] * 0.3) + ($data['nilai_uas'] * 0.4),
            2
        );

        $data['nilai_akhir'] = $nilaiAkhir;
        $data['keterangan'] = $nilaiAkhir >= $mapel->kkm ? 'Lulus' : 'Tidak Lulus';

        return $data;
    }

    /**
     * @return array<string, mixed>
     */
    private function validasi(Request $request, ?Nilai $nilai = null): array
    {
        $pesan = $this->pesanValidasi();
        $pesan['mapel_id.unique'] = 'Nilai untuk siswa dan mata pelajaran ini sudah ada. Silakan edit data nilai yang sudah ada.';

        return $request->validate([
            'siswa_id' => ['required', 'exists:siswas,id'],
            'mapel_id' => [
                'required',
                'exists:mapels,id',
                Rule::unique('nilais', 'mapel_id')
                    ->where(fn ($query) => $query->where('siswa_id', $request->input('siswa_id')))
                    ->ignore($nilai?->id),
            ],
            'nilai_tugas' => ['required', 'numeric', 'between:0,100'],
            'nilai_uts' => ['required', 'numeric', 'between:0,100'],
            'nilai_uas' => ['required', 'numeric', 'between:0,100'],
        ], $pesan, [
            'siswa_id' => 'Siswa',
            'mapel_id' => 'Mata pelajaran',
            'nilai_tugas' => 'Nilai tugas',
            'nilai_uts' => 'Nilai UTS',
            'nilai_uas' => 'Nilai UAS',
        ]);
    }
}
