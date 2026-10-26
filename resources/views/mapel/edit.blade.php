@extends('layouts.main')

@section('title', 'Edit Data Mata Pelajaran')

@section('content')
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Edit Data Mata Pelajaran</h1>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Form Edit Mata Pelajaran</h6>
        </div>
        <div class="card-body">
            <form action="{{ route('mapel.update', $mapel) }}" method="POST">
                @csrf
                @method('PUT')
                @include('mapel._form', ['mapel' => $mapel])

                <hr>
                <button type="submit" class="btn btn-primary"><i class="fas fa-save fa-sm"></i> Perbarui</button>
                <a href="{{ route('mapel.index') }}" class="btn btn-secondary">Batal</a>
            </form>
        </div>
    </div>
@endsection
