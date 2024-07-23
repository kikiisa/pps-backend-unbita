<nav class="navbar navbar-expand-lg bg-white border-1 border-bottom">
    <div class="container">
        <a class="navbar-brand fw-bold" href="/">
            <img src="{{ asset('template/assets/images/logo1.png') }}" class="" width="200"
                alt="logo">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
            aria-expanded="false" aria-label="Toggle navigation">
            <span class="fa fa-list"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-center" id="navbarSupportedContent">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link text-navbar" href="{{ Route('artikel') }}">Artikel</a>
                </li>
                @foreach ($prodi as $prd)
                    <li class="nav-item">
                        <a class="nav-link text-navbar " href="{{Route('information',$prd->slug)}}">{{$prd->name}}</a>
                    </li>
                @endforeach
                
                <li class="nav-item">
                    <a class="nav-link text-navbar" href="{{ Route('about') }}">Tentang Fais</a>
                </li>
            </ul>
        </div>
        <form class="d-flex mt-2 custom-form" method="GET">
            <input class="form-control me-2" required="true" name="q" type="search"
                placeholder="Berita Apa Hari Ini ?" aria-label="Search">
            <button class="btn btn-dark" type="submit"><i class="fa fa-search"></i></button>
        </form>
    </div>
</nav>