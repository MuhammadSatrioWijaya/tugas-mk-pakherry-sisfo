@extends('layouts.main')

@section('title', 'Input Nilai Siswa')

@section('content')
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Input Nilai Siswa</h1>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Form Input Nilai</h6>
        </div>
        <div class="card-body">
            <form action="{{ route('nilai.store') }}" method="POST">
                @csrf
                @include('nilai._form', ['nilai' => null])

                <hr>
                <button type="submit" class="btn btn-primary"><i class="fas fa-save fa-sm"></i> Simpan</button>
                <a href="{{ route('nilai.index') }}" class="btn btn-secondary">Batal</a>
            </form>
        </div>
    </div>
@endsection
