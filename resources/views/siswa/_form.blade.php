<div class="form-group">
    <label for="nis">NIS</label>
    <input type="text" class="form-control @error('nis') is-invalid @enderror" id="nis" name="nis"
        value="{{ old('nis', $siswa?->nis) }}" required>
    @error('nis')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="form-group">
    <label for="nama">Nama Lengkap</label>
    <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama"
        value="{{ old('nama', $siswa?->nama) }}" required>
    @error('nama')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="form-group">
    <label for="kelas_id">Kelas</label>
    <select class="form-control @error('kelas_id') is-invalid @enderror" id="kelas_id" name="kelas_id" required>
        <option value="">-- Pilih Kelas --</option>
        @foreach ($kelas as $item)
            <option value="{{ $item->id }}"
                {{ (string) old('kelas_id', $siswa?->kelas_id) === (string) $item->id ? 'selected' : '' }}>
                {{ $item->nama_kelas }}</option>
        @endforeach
    </select>
    @error('kelas_id')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="form-group">
    <label for="jenis_kelamin">Jenis Kelamin</label>
    <select class="form-control @error('jenis_kelamin') is-invalid @enderror" id="jenis_kelamin" name="jenis_kelamin"
        required>
        <option value="">-- Pilih Jenis Kelamin --</option>
        <option value="L" {{ old('jenis_kelamin', $siswa?->jenis_kelamin) === 'L' ? 'selected' : '' }}>Laki-laki
        </option>
        <option value="P" {{ old('jenis_kelamin', $siswa?->jenis_kelamin) === 'P' ? 'selected' : '' }}>Perempuan
        </option>
    </select>
    @error('jenis_kelamin')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="form-group">
    <label for="no_hp">No HP</label>
    <input type="text" class="form-control @error('no_hp') is-invalid @enderror" id="no_hp" name="no_hp"
        value="{{ old('no_hp', $siswa?->no_hp) }}" placeholder="08xxxxxxxxxx">
    @error('no_hp')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="form-group">
    <label for="alamat">Alamat</label>
    <textarea class="form-control @error('alamat') is-invalid @enderror" id="alamat" name="alamat" rows="3">{{ old('alamat', $siswa?->alamat) }}</textarea>
    @error('alamat')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
