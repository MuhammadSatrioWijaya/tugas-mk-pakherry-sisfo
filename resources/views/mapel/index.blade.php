@extends('layouts.main')

@section('title', 'Data Mata Pelajaran')

@section('content')
    @include('partials.datatable')

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Data Mata Pelajaran</h1>
        <a href="{{ route('mapel.create') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
            <i class="fas fa-plus fa-sm text-white-50"></i> Tambah Mata Pelajaran
        </a>
    </div>

    <!-- DataTales -->
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Daftar Mata Pelajaran</h6>
            <a href="{{ route('mapel.create') }}" class="d-sm-none btn btn-sm btn-primary">
                <i class="fas fa-plus fa-sm"></i>
            </a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th width="5%">No</th>
                            <th>Kode Mapel</th>
                            <th>Nama Mapel</th>
                            <th>KKM</th>
                            <th width="12%" class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($mapels as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td><span class="badge badge-secondary">{{ $item->kode_mapel }}</span></td>
                                <td class="font-weight-bold">{{ $item->nama_mapel }}</td>
                                <td>{{ $item->kkm }}</td>
                                <td class="text-center">
                                    <a href="{{ route('mapel.edit', $item) }}" class="btn btn-warning btn-circle btn-sm"
                                        title="Edit">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="{{ route('mapel.destroy', $item) }}" method="POST" class="d-inline"
                                        onsubmit="return confirm('Hapus mata pelajaran {{ $item->nama_mapel }}?')">
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
