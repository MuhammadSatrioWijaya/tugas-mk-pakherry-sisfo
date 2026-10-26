@extends('layouts.main')

@section('title', 'Detail Data Siswa')

@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Detail Data Siswa</h1>
        <a href="{{ route('siswa.index') }}" class="d-none d-sm-inline-block btn btn-sm btn-secondary shadow-sm">
            <i class="fas fa-arrow-left fa-sm text-white-50"></i> Kembali
        </a>
    </div>

    <div class="row">

        <!-- Profil Siswa -->
        <div class="col-xl-4 col-lg-5">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Profil Siswa</h6>
                </div>
                <div class="card-body">
                    <div class="text-center mb-4">
                        <img class="img-profile rounded-circle mb-2" style="width: 6rem; height: 6rem;"
                            src="{{ asset('img/undraw_profile.svg') }}" alt="Foto profil">
                        <h5 class="font-weight-bold text-gray-800 mb-0">{{ $siswa->nama }}</h5>
                        <span class="badge badge-secondary">{{ $siswa->nis }}</span>
                    </div>
                    <table class="table table-sm table-borderless mb-0">
                        <tr>
                            <th width="40%">Kelas</th>
                            <td>{{ $siswa->kelas->nama_kelas ?? '-' }}</td>
                        </tr>
                        <tr>
                            <th>Jenis Kelamin</th>
                            <td>{{ $siswa->jenis_kelamin === 'L' ? 'Laki-laki' : 'Perempuan' }}</td>
                        </tr>
                        <tr>
                            <th>No HP</th>
                            <td>{{ $siswa->no_hp ?? '-' }}</td>
                        </tr>
                        <tr>
                            <th>Alamat</th>
                            <td>{{ $siswa->alamat ?? '-' }}</td>
                        </tr>
                    </table>
                </div>
                <div class="card-footer">
                    <a href="{{ route('siswa.edit', $siswa) }}" class="btn btn-warning btn-sm">
                        <i class="fas fa-edit fa-sm"></i> Edit
                    </a>
                </div>
            </div>
        </div>

        <!-- Riwayat Nilai -->
        <div class="col-xl-8 col-lg-7">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Riwayat Nilai Mata Pelajaran</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Mata Pelajaran</th>
                                    <th class="text-center">KKM</th>
                                    <th class="text-center">Tugas</th>
                                    <th class="text-center">UTS</th>
                                    <th class="text-center">UAS</th>
                                    <th class="text-center">Nilai Akhir</th>
                                    <th class="text-center">Keterangan</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($siswa->nilais as $nilai)
                                    <tr>
                                        <td class="font-weight-bold">{{ $nilai->mapel->nama_mapel ?? '-' }}</td>
                                        <td class="text-center">{{ $nilai->mapel->kkm ?? '-' }}</td>
                                        <td class="text-center">{{ $nilai->nilai_tugas + 0 }}</td>
                                        <td class="text-center">{{ $nilai->nilai_uts + 0 }}</td>
                                        <td class="text-center">{{ $nilai->nilai_uas + 0 }}</td>
                                        <td class="text-center font-weight-bold">{{ $nilai->nilai_akhir + 0 }}</td>
                                        <td class="text-center">
                                            <span
                                                class="badge badge-{{ $nilai->keterangan === 'Lulus' ? 'success' : 'danger' }}">{{ $nilai->keterangan }}</span>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="7" class="text-center text-muted py-4">Siswa ini belum memiliki
                                            data nilai.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
