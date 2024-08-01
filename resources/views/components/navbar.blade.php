<nav class="navbar navbar-expand-lg bg-white border-1 border-bottom">
    <div class="container">
        <a class="navbar-brand fw-bold" href="/">
            <img src="{{ asset('template/assets/images/logo1.png') }}" class="" width="200" alt="logo">
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
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        Program Studi
                    </a>
                    <ul class="dropdown-menu">
                        @foreach ($prodi as $prd)
                            <li><a class="dropdown-item" href="{{ Route('information', $prd->slug) }}">{{ $prd->name }}</a></li>
                        @endforeach 
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-navbar" href="{{ Route('about') }}">Tentang</a>
                </li>
            </ul>
        </div>
        <form class="d-flex mt-2 custom-form" action="{{Route("search.post")}}"  method="POST">
            @csrf
            @method("GET")
            <input class="form-control me-2" type="search" required="true" name="q"
                placeholder="Berita Apa Hari Ini ?" aria-label="Search">
            <button class="btn btn-dark"><i class="fa fa-search"></i></button>
        </form>
    </div>
</nav>
