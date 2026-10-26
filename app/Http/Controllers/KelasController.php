<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use Illuminate\Database\QueryException;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class KelasController extends Controller
{
    public function index(): View
    {
        $kelas = Kelas::withCount('siswas')->orderBy('nama_kelas')->get();

        return view('kelas.index', compact('kelas'));
    }

    public function create(): View
    {
        return view('kelas.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $this->validasi($request);

        Kelas::create($validated);

        return redirect()->route('kelas.index')
            ->with('success', 'Data kelas berhasil ditambahkan.');
    }

    public function edit(Kelas $kela): View
    {
        return view('kelas.edit', ['kelas' => $kela]);
    }

    public function update(Request $request, Kelas $kela): RedirectResponse
    {
        $validated = $this->validasi($request);

        $kela->update($validated);

        return redirect()->route('kelas.index')
            ->with('success', 'Data kelas berhasil diperbarui.');
    }

    public function destroy(Kelas $kela): RedirectResponse
    {
        if ($kela->siswas()->exists()) {
            return redirect()->route('kelas.index')
                ->with('error', 'Kelas "'.$kela->nama_kelas.'" tidak dapat dihapus karena masih memiliki siswa.');
        }

        try {
            $kela->delete();
        } catch (QueryException $e) {
            return redirect()->route('kelas.index')
                ->with('error', 'Data kelas gagal dihapus karena masih digunakan oleh data lain.');
        }

        return redirect()->route('kelas.index')
            ->with('success', 'Data kelas berhasil dihapus.');
    }

    /**
     * @return array<string, mixed>
     */
    private function validasi(Request $request): array
    {
        return $request->validate([
            'nama_kelas' => ['required', 'string', 'max:255'],
            'tingkat' => ['required', 'in:X,XI,XII'],
            'jurusan' => ['required', 'string', 'max:255'],
            'tahun_ajaran' => ['required', 'string', 'max:20', 'regex:/^\d{4}\/\d{4}$/'],
        ], $this->pesanValidasi(), [
            'nama_kelas' => 'Nama kelas',
            'tingkat' => 'Tingkat',
            'jurusan' => 'Jurusan',
            'tahun_ajaran' => 'Tahun ajaran',
        ]);
    }
}
