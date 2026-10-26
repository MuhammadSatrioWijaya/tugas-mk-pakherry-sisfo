@php($tingkatPilihan = ['X', 'XI', 'XII'])

<div class="form-group">
    <label for="nama_kelas">Nama Kelas</label>
    <input type="text" class="form-control @error('nama_kelas') is-invalid @enderror" id="nama_kelas"
        name="nama_kelas" value="{{ old('nama_kelas', $kelas?->nama_kelas) }}" placeholder="Contoh: XI RPL 1" required>
    @error('nama_kelas')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="form-group">
    <label for="tingkat">Tingkat</label>
    <select class="form-control @error('tingkat') is-invalid @enderror" id="tingkat" name="tingkat" required>
        <option value="">-- Pilih Tingkat --</option>
        @foreach ($tingkatPilihan as $tingkat)
            <option value="{{ $tingkat }}" {{ old('tingkat', $kelas?->tingkat) === $tingkat ? 'selected' : '' }}>
                {{ $tingkat }}</option>
        @endforeach
    </select>
    @error('tingkat')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="form-group">
    <label for="jurusan">Jurusan</label>
    <input type="text" class="form-control @error('jurusan') is-invalid @enderror" id="jurusan" name="jurusan"
        value="{{ old('jurusan', $kelas?->jurusan) }}" placeholder="Contoh: Rekayasa Perangkat Lunak" required>
    @error('jurusan')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="form-group">
    <label for="tahun_ajaran">Tahun Ajaran</label>
    <input type="text" class="form-control @error('tahun_ajaran') is-invalid @enderror" id="tahun_ajaran"
        name="tahun_ajaran" value="{{ old('tahun_ajaran', $kelas?->tahun_ajaran) }}" placeholder="Contoh: 2025/2026"
        required>
    @error('tahun_ajaran')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
