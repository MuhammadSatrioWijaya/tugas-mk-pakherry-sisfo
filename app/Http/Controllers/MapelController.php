<?php

namespace App\Http\Controllers;

use App\Models\Mapel;
use Illuminate\Database\QueryException;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class MapelController extends Controller
{
    public function index(): View
    {
        $mapels = Mapel::orderBy('kode_mapel')->get();

        return view('mapel.index', compact('mapels'));
    }

    public function create(): View
    {
        return view('mapel.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $this->validasi($request);

        Mapel::create($validated);

        return redirect()->route('mapel.index')
            ->with('success', 'Data mata pelajaran berhasil ditambahkan.');
    }

    public function edit(Mapel $mapel): View
    {
        return view('mapel.edit', compact('mapel'));
    }

    public function update(Request $request, Mapel $mapel): RedirectResponse
    {
        $validated = $this->validasi($request, $mapel);

        $mapel->update($validated);

        return redirect()->route('mapel.index')
            ->with('success', 'Data mata pelajaran berhasil diperbarui.');
    }

    public function destroy(Mapel $mapel): RedirectResponse
    {
        if ($mapel->nilais()->exists()) {
            return redirect()->route('mapel.index')
                ->with('error', 'Mata pelajaran "'.$mapel->nama_mapel.'" tidak dapat dihapus karena sudah memiliki data nilai.');
        }

        try {
            $mapel->delete();
        } catch (QueryException $e) {
            return redirect()->route('mapel.index')
                ->with('error', 'Data mata pelajaran gagal dihapus karena masih digunakan oleh data lain.');
        }

        return redirect()->route('mapel.index')
            ->with('success', 'Data mata pelajaran berhasil dihapus.');
    }

    /**
     * @return array<string, mixed>
     */
    private function validasi(Request $request, ?Mapel $mapel = null): array
    {
        return $request->validate([
            'kode_mapel' => ['required', 'string', 'max:255', Rule::unique('mapels', 'kode_mapel')->ignore($mapel?->id)],
            'nama_mapel' => ['required', 'string', 'max:255'],
            'kkm' => ['required', 'integer', 'between:0,100'],
        ], $this->pesanValidasi(), [
            'kode_mapel' => 'Kode mapel',
            'nama_mapel' => 'Nama mapel',
            'kkm' => 'Nilai KKM',
        ]);
    }
}
