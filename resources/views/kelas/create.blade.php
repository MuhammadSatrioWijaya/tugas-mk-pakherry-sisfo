@extends('layouts.main')

@section('title', 'Tambah Data Kelas')

@section('content')
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Tambah Data Kelas</h1>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Form Tambah Kelas</h6>
        </div>
        <div class="card-body">
            <form action="{{ route('kelas.store') }}" method="POST">
                @csrf
                @include('kelas._form', ['kelas' => null])

                <hr>
                <button type="submit" class="btn btn-primary"><i class="fas fa-save fa-sm"></i> Simpan</button>
                <a href="{{ route('kelas.index') }}" class="btn btn-secondary">Batal</a>
            </form>
        </div>
    </div>
@endsection
