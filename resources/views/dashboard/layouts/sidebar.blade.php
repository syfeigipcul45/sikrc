<!-- Sidebar - Brand -->
<a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{url('')}}">
    <div class="sidebar-brand-text mx-3">KPHP Kendilo</div>
</a>

<!-- Divider -->
<hr class="sidebar-divider my-0">

<!-- Nav Item - Dashboard -->
<li class="nav-item {{ Request::is('home*') ? 'active' : '' }}">
    <a class="nav-link" href="">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Dashboard</span>
    </a>
</li>

<!-- Divider -->
<hr class="sidebar-divider">

<!-- Heading -->
<div class="sidebar-heading">
    Main Menu
</div>

<li class="nav-item {{ Request::is('management-profil*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('dashboard.profil.index') }}">
        <i class="fas fa-fw fa-clipboard"></i>
        <span>Profil</span>
    </a>
</li>

<li class="nav-item {{ Request::is('management-posts*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('dashboard.posts.index') }}">
        <i class="fas fa-fw fa-newspaper"></i>
        <span>Berita</span>
    </a>
</li>

<li class="nav-item {{ Request::is('management-instructur*') ? 'active' : '' }}">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePengajar" aria-expanded="true" aria-controls="collapseMedia">
        <i class="fas fa-fw fa-users"></i>
        <span>Pengajar</span>
    </a>
    <div id="collapsePengajar" class="collapse {{ Request::is('management-instructur*') ? 'show' : '' }}" aria-labelledby="headingPages" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="{{ route('dashboard.kategori_pengajar.index') }}">Kategori Pengajar</a>
            <a class="collapse-item" href="{{ route('dashboard.instructur.index') }}">Daftar Pengajar</a>
        </div>
    </div>
</li>

<li class="nav-item {{ Request::is('management-facility*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('dashboard.fasilitas.index') }}">
        <i class="fas fa-fw fa-building"></i>
        <span>Fasilitas</span>
    </a>
</li>

<li class="nav-item {{ Request::is('management-training*') ? 'active' : '' }}">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTema" aria-expanded="true" aria-controls="collapseMedia">
        <i class="fas fa-fw fa-users"></i>
        <span>Pelatihan</span>
    </a>
    <div id="collapseTema" class="collapse {{ Request::is('management-training*') ? 'show' : '' }}" aria-labelledby="headingPages" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="{{ route('dashboard.tema_pelatihan.index') }}">Tema Pelatihan</a>
            <a class="collapse-item" href="{{ route('dashboard.jadwal_pelatihan.index') }}">Jadwal Pelatihan</a>
            <a class="collapse-item" href="{{ route('dashboard.instructur.index') }}">Materi Pelatihan</a>
        </div>
    </div>
</li>

<!-- Divider -->
<hr class="sidebar-divider d-none d-md-block">

<!-- Sidebar Toggler (Sidebar) -->
<div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
</div>