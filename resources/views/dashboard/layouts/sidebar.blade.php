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

<!-- Nav Item - Charts -->
<li class="nav-item {{ Request::is('management-posts*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('dashboard.posts.index') }}">
        <i class="fas fa-fw fa-newspaper"></i>
        <span>Berita</span>
    </a>
</li>

<li class="nav-item {{ Request::is('media*') ? 'active' : '' }}">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePelatihan" aria-expanded="true" aria-controls="collapseMedia">
        <i class="fas fa-fw fa-chalkboard"></i>
        <span>Pelatihan</span>
    </a>
    <div id="collapsePelatihan" class="collapse {{ Request::is('media*') ? 'show' : '' }}" aria-labelledby="headingPages" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="">Foto</a>
            <a class="collapse-item" href="">Video</a>
        </div>
    </div>
</li>

<!-- Divider -->
<hr class="sidebar-divider d-none d-md-block">

<!-- Sidebar Toggler (Sidebar) -->
<div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
</div>