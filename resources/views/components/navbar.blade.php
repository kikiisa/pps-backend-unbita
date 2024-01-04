<div>
    <header class="fixed-top">
        <div class="bg-blue">
            <div class="container d-none d-md-block">
                <div class="text-start text-white fw-light fs-6 p-2"><i class="fa fa-envelope ms-2"></i>  sipp@ui.ac.id dan humas-ui@ui.ac.id <i class="ms-3 fa fa-location-arrow"></i> Jl. Jaksa Agung Suprapto No. 40
                    Kota Gorontalo, Provinsi Gorontalo
                    Indonesia
            </div>
        </div>
        <nav class="navbar navbar-expand-lg bg-white border-1 border-bottom">
            <div class="container">
                <a class="navbar-brand fw-bold" href="/">
                    <img src="{{asset('template/assets/images/logo1.png')}}" class="" width="200" alt="logo">
    
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="fa fa-list"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-center" id="navbarSupportedContent">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link text-navbar" href="{{Route('artikel')}}">Artikel</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-navbar navFakultas"  href="#">Fakultas</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-navbar navPortofolio" href="#">Portofolio</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-navbar navKontak" href="#">Kontak</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-navbar" href="{{Route('about')}}">Tentang Pascasarjana</a>
                        </li>
                    </ul>
                </div>
                <form class="d-flex mt-2 custom-form" method="GET">
                    <input class="form-control me-2" required="true" name="q" type="search" placeholder="Berita Apa Hari Ini ?" aria-label="Search">
                    <button class="btn bg-blue text-white" type="submit"><i class="fa fa-search"></i></button>
                </form>
            </div>
        </nav>
    </header>
</div>