@extends('layouts.main')

@section('title', 'Edit Data Nilai')

@section('content')
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Edit Data Nilai</h1>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Form Edit Nilai</h6>
        </div>
        <div class="card-body">
            <form action="{{ route('nilai.update', $nilai) }}" method="POST">
                @csrf
                @method('PUT')
                @include('nilai._form', ['nilai' => $nilai])

                <hr>
                <button type="submit" class="btn btn-primary"><i class="fas fa-save fa-sm"></i> Perbarui</button>
                <a href="{{ route('nilai.index') }}" class="btn btn-secondary">Batal</a>
            </form>
        </div>
    </div>
@endsection
