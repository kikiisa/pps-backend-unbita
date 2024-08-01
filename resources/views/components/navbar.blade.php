<nav class="navbar navbar-expand-lg bg-white border-1 border-bottom">
    <div class="container">
        <a class="navbar-brand fw-bold" href="/">
            <img src="{{ asset($app->icon) }}" class="" width="40" alt="logo">
            <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/5/55/Logo_Kampus_Merdeka_Kemendikbud.png/1200px-Logo_Kampus_Merdeka_Kemendikbud.png"
                class="" width="50" alt="logo">
            <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/9/9c/Logo_of_Ministry_of_Education_and_Culture_of_Republic_of_Indonesia.svg/330px-Logo_of_Ministry_of_Education_and_Culture_of_Republic_of_Indonesia.svg.png"
                class="" width="40" alt="logo">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="fa fa-list"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-center" id="navbarSupportedContent">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link text-navbar" href="{{ Route('artikel') }}">Berita</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        Program Studi
                        </a>
                        <ul class="dropdown-menu">
                            @foreach ($prodi as $prd)
                                <li><a class="dropdown-item"
                                        href="{{ Route('information', $prd->slug) }}">{{ $prd->name }}</a></li>
                            @endforeach
                        </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-navbar" href="{{ Route('about') }}">Tentang</a>
                </li>
            </ul>
        </div>
        <form class="d-flex mt-2 custom-form" action="{{ Route('search.post') }}" method="POST">
            @csrf
            @method('GET')
            <input class="form-control me-2" type="search" required="true" name="q"
                placeholder="Berita Apa Hari Ini ?" aria-label="Search">
            <button class="btn btn-dark"><i class="fa fa-search"></i></button>
        </form>
        {{-- <form class="d-flex mt-2 custom-form" method="GET">
            <input class="form-control me-2" required="true" name="q" type="search"
                placeholder="Berita Apa Hari Ini ?" aria-label="Search">
            <button class="btn btn-dark" type="submit"><i class="fa fa-search"></i></button>
        </form> --}}

    </div>
</nav>
