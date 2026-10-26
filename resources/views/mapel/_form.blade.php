<div class="form-group">
    <label for="kode_mapel">Kode Mapel</label>
    <input type="text" class="form-control @error('kode_mapel') is-invalid @enderror" id="kode_mapel"
        name="kode_mapel" value="{{ old('kode_mapel', $mapel?->kode_mapel) }}" placeholder="Contoh: MP-PWPB" required>
    @error('kode_mapel')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="form-group">
    <label for="nama_mapel">Nama Mapel</label>
    <input type="text" class="form-control @error('nama_mapel') is-invalid @enderror" id="nama_mapel"
        name="nama_mapel" value="{{ old('nama_mapel', $mapel?->nama_mapel) }}"
        placeholder="Contoh: Pemrograman Web &amp; Perangkat Bergerak" required>
    @error('nama_mapel')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="form-group">
    <label for="kkm">Nilai KKM</label>
    <input type="number" min="0" max="100" step="1" class="form-control @error('kkm') is-invalid @enderror"
        id="kkm" name="kkm" value="{{ old('kkm', $mapel?->kkm ?? 75) }}" required>
    @error('kkm')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
