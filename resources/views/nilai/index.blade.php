@extends('layouts.main')

@section('title', 'Nilai Siswa')

@section('content')
    @include('partials.datatable')

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Nilai Akademik Siswa</h1>
        <a href="{{ route('nilai.create') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
            <i class="fas fa-plus fa-sm text-white-50"></i> Input Nilai Siswa
        </a>
    </div>

    <!-- DataTales -->
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Rekapitulasi Nilai Siswa</h6>
            <a href="{{ route('nilai.create') }}" class="d-sm-none btn btn-sm btn-primary">
                <i class="fas fa-plus fa-sm"></i>
            </a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th width="5%">No</th>
                            <th>Siswa</th>
                            <th>Kelas</th>
                            <th>Mata Pelajaran</th>
                            <th>Tugas (30%)</th>
                            <th>UTS (30%)</th>
                            <th>UAS (40%)</th>
                            <th>Nilai Akhir</th>
                            <th>Keterangan</th>
                            <th width="12%" class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($nilais as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td class="font-weight-bold">{{ $item->siswa->nama ?? '-' }}</td>
                                <td>{{ $item->siswa->kelas->nama_kelas ?? '-' }}</td>
                                <td>{{ $item->mapel->nama_mapel ?? '-' }}</td>
                                <td class="text-center">{{ $item->nilai_tugas + 0 }}</td>
                                <td class="text-center">{{ $item->nilai_uts + 0 }}</td>
                                <td class="text-center">{{ $item->nilai_uas + 0 }}</td>
                                <td class="text-center font-weight-bold">{{ $item->nilai_akhir + 0 }}</td>
                                <td class="text-center">
                                    <span
                                        class="badge badge-{{ $item->keterangan === 'Lulus' ? 'success' : 'danger' }}">{{ $item->keterangan }}</span>
                                </td>
                                <td class="text-center">
                                    <a href="{{ route('nilai.edit', $item) }}" class="btn btn-warning btn-circle btn-sm"
                                        title="Edit">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="{{ route('nilai.destroy', $item) }}" method="POST" class="d-inline"
                                        onsubmit="return confirm('Hapus nilai ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-circle btn-sm" title="Hapus">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
