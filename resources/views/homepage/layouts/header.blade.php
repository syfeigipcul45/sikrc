<nav class="navbar navbar-expand-lg navbar-light shadow-sm">
    <div class="container">
        <a class="navbar-brand" href="{{ route('home') }}">
            <img src="{{ getOption()->logo }}" style="height: 70px;" alt="Image" class="img-fluid">
        </a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupport" aria-controls="navbarSupport" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupport">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item {{ Request::is('/') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('home') }}">Home</a>
                </li>
                <li class="nav-item dropdown {{ Request::is('profil*') ? 'active' : '' }}">
                    <a href="#" class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Profil</a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        @foreach(getProfil() as $profil)
                        <a class="dropdown-item" href="{{ route('homepage.profil.detail', $profil->slug) }}">{{ $profil->name }}</a>
                        @endforeach
                    </div>
                </li>
                <li class="nav-item {{ Request::is('berita*') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('homepage.post.post') }}">Berita</a>
                </li>
                <li class="nav-item {{ Request::is('pengajar*') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('homepage.pengajar.index') }}">Pengajar</a>
                </li>
                <li class="nav-item {{ Request::is('fasilitas*') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('homepage.fasilitas.index') }}">Fasilitas</a>
                </li>
                <li class="nav-item dropdown {{ Request::is('pelatihan*') ? 'active' : '' }}">
                    <a href="#" class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Pelatihan</a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="{{ route('homepage.pelatihan.jadwal_pelatihan') }}">Jadwal Pelatihan</a>
                        <a class="dropdown-item" href="{{ route('homepage.pelatihan.materi_pelatihan') }}">Materi Pelatihan</a>
                    </div>
                </li>
                <li class="nav-item {{ Request::is('alumni-krc*') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('homepage.alumni.index') }}">Alumni KRC</a>
                </li>
                <li class="nav-item dropdown {{ Request::is('media*') ? 'active' : '' }}">
                    <a href="#" class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Media</a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="{{ route('homepage.media.photo') }}">Galeri Foto</a>
                        <a class="dropdown-item" href="{{ route('homepage.media.video') }}">Galeri Video</a>
                    </div>
                </li>
                <li class="nav-item dropdown {{ Request::is('promosi*') ? 'active' : '' }}">
                    <a href="#" class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Promosi</a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="{{ route('homepage.promosi.produk') }}">Produk</a>
                        <a class="dropdown-item" href="{{ route('homepage.promosi.kerja_sama') }}">Kerja Sama</a>
                    </div>
                </li>
                <li class="nav-item {{ Request::is('produk*') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('homepage.kontak.index') }}">Kontak</a>
                </li>
            </ul>
        </div>
        <!-- .navbar-collapse -->
    </div>
    <!-- .container -->
</nav>