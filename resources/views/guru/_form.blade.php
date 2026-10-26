<div class="form-group">
    <label for="nip">NIP</label>
    <input type="text" class="form-control @error('nip') is-invalid @enderror" id="nip" name="nip"
        value="{{ old('nip', $guru?->nip) }}" required>
    @error('nip')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="form-group">
    <label for="nama">Nama Lengkap</label>
    <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama"
        value="{{ old('nama', $guru?->nama) }}" required>
    @error('nama')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="form-group">
    <label for="jenis_kelamin">Jenis Kelamin</label>
    <select class="form-control @error('jenis_kelamin') is-invalid @enderror" id="jenis_kelamin" name="jenis_kelamin"
        required>
        <option value="">-- Pilih Jenis Kelamin --</option>
        <option value="L" {{ old('jenis_kelamin', $guru?->jenis_kelamin) === 'L' ? 'selected' : '' }}>Laki-laki</option>
        <option value="P" {{ old('jenis_kelamin', $guru?->jenis_kelamin) === 'P' ? 'selected' : '' }}>Perempuan</option>
    </select>
    @error('jenis_kelamin')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="form-group">
    <label for="email">Email</label>
    <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email"
        value="{{ old('email', $guru?->email) }}" placeholder="nama@sekolah.sch.id">
    @error('email')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="form-group">
    <label for="no_hp">No HP</label>
    <input type="text" class="form-control @error('no_hp') is-invalid @enderror" id="no_hp" name="no_hp"
        value="{{ old('no_hp', $guru?->no_hp) }}" placeholder="08xxxxxxxxxx">
    @error('no_hp')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="form-group">
    <label for="alamat">Alamat</label>
    <textarea class="form-control @error('alamat') is-invalid @enderror" id="alamat" name="alamat" rows="3">{{ old('alamat', $guru?->alamat) }}</textarea>
    @error('alamat')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
