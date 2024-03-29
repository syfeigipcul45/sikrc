<!-- Sidebar - Brand -->
<a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{url('')}}">
    <div class="sidebar-brand-text mx-3">KPHP Kendilo</div>
</a>

<!-- Divider -->
<hr class="sidebar-divider my-0">

<!-- Nav Item - Dashboard -->
<li class="nav-item {{ Request::is('home*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('beranda') }}">
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
            <a class="collapse-item" href="{{ route('dashboard.materi_pelatihan.index') }}">Materi Pelatihan</a>
        </div>
    </div>
</li>

<li class="nav-item {{ Request::is('management-alumni*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('dashboard.alumni.index') }}">
        <i class="fas fa-fw fa-building"></i>
        <span>Alumni KRC</span>
    </a>
</li>

<li class="nav-item {{ Request::is('management-media*') ? 'active' : '' }}">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseMedia" aria-expanded="true" aria-controls="collapseMedia">
        <i class="fas fa-fw fa-photo-video"></i>
        <span>Media</span>
    </a>
    <div id="collapseMedia" class="collapse {{ Request::is('management-media*') ? 'show' : '' }}" aria-labelledby="headingPages" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="{{ route('dashboard.media_photo.index') }}">Foto</a>
            <a class="collapse-item" href="{{ route('dashboard.media_video.index') }}">Video</a>
        </div>
    </div>
</li>

<li class="nav-item {{ Request::is('management-promosi*') ? 'active' : '' }}">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseProduk" aria-expanded="true" aria-controls="collapseProduk">
        <i class="fas fa-fw fa-handshake"></i>
        <span>Promosi</span>
    </a>
    <div id="collapseProduk" class="collapse {{ Request::is('management-promosi*') ? 'show' : '' }}" aria-labelledby="headingPages" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="{{ route('dashboard.produk.index') }}">Produk</a>
            <a class="collapse-item" href="{{ route('dashboard.kerja_sama.index') }}">Kerja Sama</a>
        </div>
    </div>
</li>

<!-- Divider -->
<hr class="sidebar-divider d-none d-md-block">
<!-- Heading -->
<div class="sidebar-heading">
    Pengaturan
</div>

@hasrole('superadmin')
<li class="nav-item {{ Request::is('management-users*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('dashboard.users.index') }}">
        <i class="fas fa-fw fa-users"></i>
        <span>Users</span>
    </a>
</li>
@endhasrole

<li class="nav-item {{ Request::is('management-testimonial*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('dashboard.testimonial.index') }}">
        <i class="fas fa-fw fa-comment-dots"></i>
        <span>Testimonial</span>
    </a>
</li>

<li class="nav-item {{ Request::is('management-images*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('dashboard.hero_images.index') }}">
        <i class="fas fa-fw fa-images"></i>
        <span>Gambar Utama</span>
    </a>
</li>

<li class="nav-item {{ Request::is('management-setting*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('dashboard.settings.index') }}">
        <i class="fas fa-fw fa-cog"></i>
        <span>Pengaturan</span>
    </a>
</li>

<!-- Sidebar Toggler (Sidebar) -->
<div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
</div>