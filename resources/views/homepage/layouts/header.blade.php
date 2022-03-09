<div class="container container-menu">
    <div class="d-flex align-items-center">
        <div class="site-logo">
            <a href="{{ route('home') }}" class="d-block">
                <img src="{{ getOption()->logo }}" style="height: 70px;" alt="Image" class="img-fluid">
            </a>
        </div>
        <div class="mr-auto">
            <nav class="site-navigation position-relative text-right" role="navigation">
                <ul class="site-menu main-menu js-clone-nav mr-auto d-none d-lg-block">
                    <li class="{{ Request::is('/') ? 'active' : '' }}">
                        <a href="{{ route('home') }}" class="nav-link text-left">Home</a>
                    </li>
                    <li class="has-children {{ Request::is('profil*') ? 'active' : '' }}">
                        <a href="#" class="nav-link text-left">Profil</a>
                        <ul class="dropdown">
                            @foreach(getProfil() as $profil)
                            <li><a href="{{ route('homepage.profil.detail', $profil->slug) }}">{{ $profil->name }}</a></li>
                            @endforeach
                        </ul>
                    </li>
                    <li class="{{ Request::is('berita*') ? 'active' : '' }}">
                        <a href="{{ route('homepage.post.post') }}" class="nav-link text-left">Berita</a>
                    </li>
                    <li class="{{ Request::is('pengajar*') ? 'active' : '' }}">
                        <a href="{{ route('homepage.pengajar.index') }}" class="nav-link text-left">Pengajar</a>
                    </li>
                    <li class="{{ Request::is('fasilitas*') ? 'active' : '' }}">
                        <a href="{{ route('homepage.fasilitas.index') }}" class="nav-link text-left">Fasilitas</a>
                    </li>
                    <li class="has-children {{ Request::is('pelatihan*') ? 'active' : '' }}">
                        <a href="#" class="nav-link text-left">Pelatihan</a>
                        <ul class="dropdown">
                            <li><a href="{{ route('homepage.pelatihan.jadwal_pelatihan') }}">Jadwal Pelatihan</a></li>
                            <li><a href="{{ route('homepage.pelatihan.materi_pelatihan') }}">Materi Pelatihan</a></li>
                        </ul>
                    </li>
                    <li class="{{ Request::is('alumni-krc*') ? 'active' : '' }}">
                        <a href="{{ route('homepage.alumni.index') }}" class="nav-link text-left">Alumni KRC</a>
                    </li>
                    <li class="has-children {{ Request::is('media*') ? 'active' : '' }}">
                        <a href="#" class="nav-link text-left">Media</a>
                        <ul class="dropdown">
                            <li><a href="{{ route('homepage.media.photo') }}">Foto</a></li>
                            <li><a href="{{ route('homepage.media.video') }}">Video</a></li>
                        </ul>
                    </li>
                    <li class="has-children {{ Request::is('promosi*') ? 'active' : '' }}">
                        <a href="#" class="nav-link text-left">Promosi</a>
                        <ul class="dropdown">
                            <li><a href="{{ route('homepage.promosi.produk') }}">Produk</a></li>
                            <li><a href="{{ route('homepage.promosi.kerja_sama') }}">Kerja Sama</a></li>
                        </ul>
                    </li>
                    <li class="{{ Request::is('kontak*') ? 'active' : '' }}">
                        <a href="{{ route('homepage.kontak.index') }}" class="nav-link text-left">Kontak</a>
                    </li>
                </ul>
            </nav>

        </div>
        <!-- <div class="ml-auto">
            <div class="social-wrap">
                <a href="{{ getOption()->facebook }}" target="_blank"><span class="icon-facebook"></span></a>
                <a href="{{ getOption()->instagram }}" target="_blank"><span class="icon-instagram"></span></a>
                <a href="{{ getOption()->youtube }}" target="_blank"><span class="icon-youtube"></span></a>

                <a href="#" class="d-inline-block d-lg-none site-menu-toggle js-menu-toggle text-black"><span class="icon-menu h3"></span></a>
            </div>
        </div> -->

    </div>
</div>