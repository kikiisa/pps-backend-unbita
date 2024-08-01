<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="UTF-8">
    <meta name="description" content="{{ $app->deskripsi }}">
    <meta name="keywords" content="Universitas Bina Taruna Gorontalo">
    <meta name="robots" content="index, follow">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="{{ $information->logo }}" type="image/x-icon">
    <title>{{ $information->name }}</title>
    <link rel="canonical" href="{{ Request()->url() }}">
    <!-- Open Graph Tags untuk berbagi di platform media sosial -->
    <meta property="og:title" content="{{ $information->name }}">
    <meta property="og:image" content="{{ $information->icon }}">
    <script type="application/ld+json">
        {
            "@context": "https://schema.org",
            "@type": "Organization",
            "name": "{{$information->title}}",
            "url": "{{Request()->url()}}",
            "logo": "{{$information->icon}}"
        }
    </script>
    <link rel="stylesheet" href="{{ asset('frontend/vendor/fontawesome/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/vendor/fontawesome/css/brands.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/vendor/fontawesome/css/solid.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/vendor/fontawesome/css/regular.min.css') }}">
    <link rel="stylesheet" href="{{ asset('template/assets/extensions/toastify-js/src/toastify.css') }}">
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&family=Poppins:ital,wght@0,100;0,300;0,400;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Quicksand:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('frontend/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/style.css') }}">
    <style>
        .visi {
            border-bottom-left-radius: 20px;
            border-bottom-right-radius: 20px;
        }

        .card {
            border-radius: 20px;
        }
    </style>
</head>

<body class="bg-body-tertiary">
    <header class="fixed-top">
        <div class="bg-primary">
            <div class="container d-none d-md-block">
                <div class="text-start text-white fw-light fs-6 p-2"><i class="fa fa-phone ms-2"></i>
                    {{ $app->phone }}<i class="ms-3 fa fa-location-arrow"></i> Jl. Jaksa Agung Suprapto No. 40
                    Kota Gorontalo, Provinsi Gorontalo
                    Indonesia
                </div>
            </div>
        </div>
        @include('components.navbar')
    </header>
    <section class="hero">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 text-center mt-4 py-4 content-hero">
                    <h2 class="fw-bold text-white title-website">
                        Program Studi {{ $information->name }}
                    </h2>
                    <h6 class="mt-3"><span class="bg-primary text-white p-2 rounded-4 fw-bold">UNIVERSITAS BINA TARUNA
                            GORONTALO</span></h6>
                </div>
            </div>
        </div>
    </section>
    <section class="bg-dark text-white visi">
        <div class="container p-2">
            <h5 class="text-white content-hero text-center mb-2">{{ $information->visi }}</h5>
        </div>
    </section>
    <section class="mt-4 mb-4">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 mb-4 bg-white rounded-4">
                    <div class="container p-3 fs-4" style="text-align: justify;">
                        <h5 class="fw-bold">Tentang {{$information->name}}</h5>
                        <hr>
                        {!! $information->deskripsi !!}
                    </div>
                </div>
                <div class="col-lg-6 mb-4">
                    <div class="card border-0">
                        <div class="img">
                            <img src="{{ $information->gambar }}" class="img-thumbnail" alt="" srcset="">
                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="card border-0">
                        <div class="card-body">
                            <h4 class="fw-bold">Download File Document Program Studi</h4>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Nama Document</th>
                                        <th scope="col">Download</th>
                                        <th scope="col">Di upload</th>
                                        <th scope="col">Di update</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th scope="row">1</th>
                                        <td>File Kurikulum</td>
                                        <td><a href="{{ $information->documentKKU }}" class="btn btn-dark">Download</a>
                                        </td>
                                        <td>
                                            {{ $information->created_at->diffForHumans() }}
                                        </td>
                                        <td>
                                            {{ $information->updated_at->diffForHumans() }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">2</th>
                                        <td>File Akreditasi</td>
                                        <td><a href="{{ $information->documentAKR }}" class="btn btn-dark">Download</a>
                                        </td>
                                        <td>
                                            {{ $information->created_at->diffForHumans() }}
                                        </td>
                                        <td>
                                            {{ $information->updated_at->diffForHumans() }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">3</th>
                                        <td>File Penjaminan Mutu</td>
                                        <td><a href="{{ $information->dokumentPMU }}" class="btn btn-dark">Download</a>
                                        </td>
                                        <td>
                                            {{ $information->created_at->diffForHumans() }}
                                        </td>
                                        <td>
                                            {{ $information->updated_at->diffForHumans() }}
                                        </td>
                                    </tr>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>
    <footer class="bg-primary">
        <div class="container fw-bold text-white text-center py-3">Copyright &copy; 2023 Bina Taruna Gorontalo | Pusat
            IT</div>
    </footer>
    <script src="{{ asset('frontend/vendor/fontawesome/js/all.min.js') }}"></script>
    <script src="{{ asset('frontend/vendor/fontawesome/js/brands.min.js') }}"></script>
    <script src="{{ asset('frontend/vendor/fontawesome/js/regular.min.js') }}"></script>
    <script src="{{ asset('frontend/vendor/fontawesome/js/solid.min.js') }}"></script>
    <script src="{{ asset('frontend/js/bootstrap.bundle.min.js') }}"></script>

</body>

</html>
