@extends('layouts.main')

@section('title', 'Data Kelas')

@section('content')
    @include('partials.datatable')

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Data Kelas</h1>
        <a href="{{ route('kelas.create') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
            <i class="fas fa-plus fa-sm text-white-50"></i> Tambah Kelas
        </a>
    </div>

    <!-- DataTales -->
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Daftar Kelas</h6>
            <a href="{{ route('kelas.create') }}" class="d-sm-none btn btn-sm btn-primary">
                <i class="fas fa-plus fa-sm"></i>
            </a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th width="5%">No</th>
                            <th>Nama Kelas</th>
                            <th>Tingkat</th>
                            <th>Jurusan</th>
                            <th>Tahun Ajaran</th>
                            <th>Jumlah Siswa</th>
                            <th width="12%" class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($kelas as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td class="font-weight-bold">{{ $item->nama_kelas }}</td>
                                <td>{{ $item->tingkat }}</td>
                                <td>{{ $item->jurusan }}</td>
                                <td>{{ $item->tahun_ajaran }}</td>
                                <td><span class="badge badge-info">{{ $item->siswas_count }} siswa</span></td>
                                <td class="text-center">
                                    <a href="{{ route('kelas.edit', $item) }}" class="btn btn-warning btn-circle btn-sm"
                                        title="Edit">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="{{ route('kelas.destroy', $item) }}" method="POST" class="d-inline"
                                        onsubmit="return confirm('Hapus kelas {{ $item->nama_kelas }}?')">
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
