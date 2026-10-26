@extends('layouts.main')

@section('title', 'Dashboard Akademik')

@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><i class="fas fa-tachometer-alt mr-2 text-primary"></i>Dashboard Akademik</h1>
    </div>

    <!-- Content Row - Cards Summary -->
    <div class="row">

        <!-- Total Siswa Card -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Total Siswa</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $totalSiswa }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-user-graduate fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Total Guru Card -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Total Guru</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $totalGuru }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-chalkboard-teacher fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Total Kelas Card -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                Total Kelas</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $totalKelas }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-door-open fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Total Mapel Card -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                Mata Pelajaran</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $totalMapel }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-book fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Content Row - Charts -->
    <div class="row">

        <!-- Bar Chart: Siswa per Kelas -->
        <div class="col-xl-8 col-lg-7">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Jumlah Siswa per Kelas</h6>
                </div>
                <div class="card-body">
                    <div class="chart-bar">
                        <canvas id="chartSiswaPerKelas"></canvas>
                    </div>
                </div>
            </div>
        </div>

        <!-- Donut Chart: Kelulusan -->
        <div class="col-xl-4 col-lg-5">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Status Kelulusan Nilai</h6>
                </div>
                <div class="card-body">
                    <div class="chart-pie pt-4 pb-2">
                        <canvas id="chartKelulusan"></canvas>
                    </div>
                    <div class="mt-4 text-center small">
                        <span class="mr-2"><i class="fas fa-circle text-success"></i> Lulus</span>
                        <span class="mr-2"><i class="fas fa-circle text-danger"></i> Tidak Lulus</span>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Content Row - Tables & Activity -->
    <div class="row">

        <!-- Recent Siswa -->
        <div class="col-xl-6 col-lg-6 mb-4">
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary"><i class="fas fa-users mr-1"></i> Siswa Terdaftar Terbaru
                    </h6>
                    <a href="{{ route('siswa.index') }}" class="btn btn-sm btn-outline-primary">Lihat Semua</a>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-hover align-items-center table-flush mb-0">
                            <thead class="thead-light">
                                <tr>
                                    <th>NIS</th>
                                    <th>Nama Siswa</th>
                                    <th>Kelas</th>
                                    <th>Gender</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($recentSiswa as $siswa)
                                    <tr>
                                        <td><span class="badge badge-secondary">{{ $siswa->nis }}</span></td>
                                        <td class="font-weight-bold">{{ $siswa->nama }}</td>
                                        <td>{{ $siswa->kelas->nama_kelas ?? '-' }}</td>
                                        <td>
                                            <span
                                                class="badge badge-{{ $siswa->jenis_kelamin == 'L' ? 'primary' : 'danger' }}">
                                                {{ $siswa->jenis_kelamin == 'L' ? 'Laki-Laki' : 'Perempuan' }}
                                            </span>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4" class="text-center py-4 text-muted">Belum ada data siswa</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- Recent Nilai -->
        <div class="col-xl-6 col-lg-6 mb-4">
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary"><i class="fas fa-star mr-1"></i> Input Nilai Terbaru</h6>
                    <a href="{{ route('nilai.index') }}" class="btn btn-sm btn-outline-primary">Lihat Semua</a>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-hover align-items-center table-flush mb-0">
                            <thead class="thead-light">
                                <tr>
                                    <th>Siswa</th>
                                    <th>Mapel</th>
                                    <th>Nilai Akhir</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($recentNilai as $nilai)
                                    <tr>
                                        <td class="font-weight-bold">{{ $nilai->siswa->nama ?? '-' }}</td>
                                        <td>{{ $nilai->mapel->nama_mapel ?? '-' }}</td>
                                        <td><span class="badge badge-info">{{ $nilai->nilai_akhir }}</span></td>
                                        <td>
                                            <span
                                                class="badge badge-{{ $nilai->keterangan == 'Lulus' ? 'success' : 'danger' }}">
                                                {{ $nilai->keterangan }}
                                            </span>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4" class="text-center py-4 text-muted">Belum ada input nilai</td>
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

@push('scripts')
    <!-- Page level plugins -->
    <script src="{{ asset('vendor/chart.js/Chart.min.js') }}"></script>

    <script>
        // Gaya default yang sama dengan demo chart pada template SB Admin 2
        Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
        Chart.defaults.global.defaultFontColor = '#858796';

        // Bar Chart - Jumlah siswa per kelas
        new Chart(document.getElementById('chartSiswaPerKelas'), {
            type: 'bar',
            data: {
                labels: @json($grafikKelasLabel),
                datasets: [{
                    label: 'Jumlah Siswa',
                    backgroundColor: '#4e73df',
                    hoverBackgroundColor: '#2e59d9',
                    borderColor: '#4e73df',
                    data: @json($grafikKelasJumlah),
                }],
            },
            options: {
                maintainAspectRatio: false,
                layout: { padding: { left: 10, right: 25, top: 25, bottom: 0 } },
                scales: {
                    xAxes: [{
                        gridLines: { display: false, drawBorder: false },
                        maxBarThickness: 40,
                    }],
                    yAxes: [{
                        ticks: { beginAtZero: true, precision: 0, padding: 10 },
                        gridLines: {
                            color: 'rgb(234, 236, 244)',
                            zeroLineColor: 'rgb(234, 236, 244)',
                            drawBorder: false,
                            borderDash: [2],
                            zeroLineBorderDash: [2],
                        },
                    }],
                },
                legend: { display: false },
                tooltips: {
                    titleMarginBottom: 10,
                    titleFontColor: '#6e707e',
                    titleFontSize: 14,
                    backgroundColor: 'rgb(255,255,255)',
                    bodyFontColor: '#858796',
                    borderColor: '#dddfeb',
                    borderWidth: 1,
                    xPadding: 15,
                    yPadding: 15,
                    displayColors: false,
                    caretPadding: 10,
                },
            },
        });

        // Doughnut Chart - Status kelulusan
        new Chart(document.getElementById('chartKelulusan'), {
            type: 'doughnut',
            data: {
                labels: ['Lulus', 'Tidak Lulus'],
                datasets: [{
                    data: [{{ $totalLulus }}, {{ $totalTidakLulus }}],
                    backgroundColor: ['#1cc88a', '#e74a3b'],
                    hoverBackgroundColor: ['#17a673', '#be2617'],
                    hoverBorderColor: 'rgba(234, 236, 244, 1)',
                }],
            },
            options: {
                maintainAspectRatio: false,
                tooltips: {
                    backgroundColor: 'rgb(255,255,255)',
                    bodyFontColor: '#858796',
                    borderColor: '#dddfeb',
                    borderWidth: 1,
                    xPadding: 15,
                    yPadding: 15,
                    displayColors: false,
                    caretPadding: 10,
                },
                legend: { display: false },
                cutoutPercentage: 80,
            },
        });
    </script>
@endpush
