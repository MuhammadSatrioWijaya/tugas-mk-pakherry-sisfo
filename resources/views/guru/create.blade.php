@extends('layouts.main')

@section('title', 'Tambah Data Guru')

@section('content')
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Tambah Data Guru</h1>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Form Tambah Guru</h6>
        </div>
        <div class="card-body">
            <form action="{{ route('guru.store') }}" method="POST">
                @csrf
                @include('guru._form', ['guru' => null])

                <hr>
                <button type="submit" class="btn btn-primary"><i class="fas fa-save fa-sm"></i> Simpan</button>
                <a href="{{ route('guru.index') }}" class="btn btn-secondary">Batal</a>
            </form>
        </div>
    </div>
@endsection
