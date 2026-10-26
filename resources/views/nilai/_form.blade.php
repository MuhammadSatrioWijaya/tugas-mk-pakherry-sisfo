<div class="form-group">
    <label for="siswa_id">Siswa</label>
    <select class="form-control @error('siswa_id') is-invalid @enderror" id="siswa_id" name="siswa_id" required>
        <option value="">-- Pilih Siswa --</option>
        @foreach ($siswas as $item)
            <option value="{{ $item->id }}"
                {{ (string) old('siswa_id', $nilai?->siswa_id) === (string) $item->id ? 'selected' : '' }}>
                {{ $item->nis }} - {{ $item->nama }} ({{ $item->kelas->nama_kelas ?? '-' }})</option>
        @endforeach
    </select>
    @error('siswa_id')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="form-group">
    <label for="mapel_id">Mata Pelajaran</label>
    <select class="form-control @error('mapel_id') is-invalid @enderror" id="mapel_id" name="mapel_id" required>
        <option value="">-- Pilih Mata Pelajaran --</option>
        @foreach ($mapels as $item)
            <option value="{{ $item->id }}" data-kkm="{{ $item->kkm }}"
                {{ (string) old('mapel_id', $nilai?->mapel_id) === (string) $item->id ? 'selected' : '' }}>
                {{ $item->nama_mapel }} (KKM {{ $item->kkm }})</option>
        @endforeach
    </select>
    @error('mapel_id')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="form-row">
    <div class="form-group col-md-4">
        <label for="nilai_tugas">Nilai Tugas (30%)</label>
        <input type="number" min="0" max="100" step="0.01"
            class="form-control @error('nilai_tugas') is-invalid @enderror" id="nilai_tugas" name="nilai_tugas"
            value="{{ old('nilai_tugas', isset($nilai) ? $nilai->nilai_tugas + 0 : '') }}" required>
        @error('nilai_tugas')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group col-md-4">
        <label for="nilai_uts">Nilai UTS (30%)</label>
        <input type="number" min="0" max="100" step="0.01"
            class="form-control @error('nilai_uts') is-invalid @enderror" id="nilai_uts" name="nilai_uts"
            value="{{ old('nilai_uts', isset($nilai) ? $nilai->nilai_uts + 0 : '') }}" required>
        @error('nilai_uts')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group col-md-4">
        <label for="nilai_uas">Nilai UAS (40%)</label>
        <input type="number" min="0" max="100" step="0.01"
            class="form-control @error('nilai_uas') is-invalid @enderror" id="nilai_uas" name="nilai_uas"
            value="{{ old('nilai_uas', isset($nilai) ? $nilai->nilai_uas + 0 : '') }}" required>
        @error('nilai_uas')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
</div>

<div class="alert alert-info small mb-0" id="pratinjauNilai">
    <i class="fas fa-calculator mr-1"></i>
    Nilai akhir = (Tugas &times; 30%) + (UTS &times; 30%) + (UAS &times; 40%).
    Pratinjau: <strong id="pratinjauAkhir">-</strong> <span id="pratinjauStatus"></span>
</div>

@push('scripts')
    <script>
        $(function () {
            function hitung() {
                var tugas = parseFloat($('#nilai_tugas').val());
                var uts = parseFloat($('#nilai_uts').val());
                var uas = parseFloat($('#nilai_uas').val());
                var kkm = parseFloat($('#mapel_id option:selected').data('kkm'));

                if (isNaN(tugas) || isNaN(uts) || isNaN(uas)) {
                    $('#pratinjauAkhir').text('-');
                    $('#pratinjauStatus').text('');
                    return;
                }

                var akhir = Math.round((tugas * 0.3 + uts * 0.3 + uas * 0.4) * 100) / 100;
                $('#pratinjauAkhir').text(akhir);

                if (isNaN(kkm)) {
                    $('#pratinjauStatus').text('');
                } else {
                    $('#pratinjauStatus').text(akhir >= kkm ? '(Lulus)' : '(Tidak Lulus)');
                }
            }

            $('#nilai_tugas, #nilai_uts, #nilai_uas, #mapel_id').on('input change', hitung);
            hitung();
        });
    </script>
@endpush
