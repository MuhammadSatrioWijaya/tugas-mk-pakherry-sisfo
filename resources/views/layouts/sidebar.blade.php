<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('dashboard') }}">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-graduation-cap"></i>
        </div>
        <div class="sidebar-brand-text mx-3">SISFO <sup>AKADEMIK</sup></div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item {{ request()->routeIs('dashboard', 'home') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('dashboard') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Data Master
    </div>

    <!-- Nav Item - Data Master Collapse Menu -->
    @php($masterAktif = request()->routeIs('kelas.*', 'siswa.*', 'guru.*', 'mapel.*'))
    <li class="nav-item {{ $masterAktif ? 'active' : '' }}">
        <a class="nav-link {{ $masterAktif ? '' : 'collapsed' }}" href="#" data-toggle="collapse"
            data-target="#collapseMaster" aria-expanded="{{ $masterAktif ? 'true' : 'false' }}"
            aria-controls="collapseMaster">
            <i class="fas fa-fw fa-database"></i>
            <span>Data Master</span>
        </a>
        <div id="collapseMaster" class="collapse {{ $masterAktif ? 'show' : '' }}" aria-labelledby="headingMaster"
            data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Kelola Data:</h6>
                <a class="collapse-item {{ request()->routeIs('kelas.*') ? 'active' : '' }}"
                    href="{{ route('kelas.index') }}">Data Kelas</a>
                <a class="collapse-item {{ request()->routeIs('siswa.*') ? 'active' : '' }}"
                    href="{{ route('siswa.index') }}">Data Siswa</a>
                <a class="collapse-item {{ request()->routeIs('guru.*') ? 'active' : '' }}"
                    href="{{ route('guru.index') }}">Data Guru</a>
                <a class="collapse-item {{ request()->routeIs('mapel.*') ? 'active' : '' }}"
                    href="{{ route('mapel.index') }}">Mata Pelajaran</a>
            </div>
        </div>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Akademik
    </div>

    <!-- Nav Item - Nilai -->
    <li class="nav-item {{ request()->routeIs('nilai.*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('nilai.index') }}">
            <i class="fas fa-fw fa-star"></i>
            <span>Nilai Siswa</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
