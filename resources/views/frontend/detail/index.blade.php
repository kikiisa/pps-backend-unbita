<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="UTF-8">
    <meta name="description" content="{{$data->deskripsi}}">
    <meta name="keywords" content="Kuliah,Pascasarjana,Unbita,Universitas">
    <meta name="robots" content="index, follow">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="{{asset($app->icon)}}" type="image/x-icon">
    <title>{{$data->title}}</title>
    <link rel="canonical" href="{{Request()->url()}}">
    <!-- Open Graph Tags untuk berbagi di platform media sosial -->
    <meta property="og:title" content="{{$data->title}}">
    <meta property="og:description" content="{{$data->deskripsi}}">
    <meta property="og:image" content="{{asset($data->image)}}">
    <!-- Twitter Card Tags untuk berbagi di Twitter -->
    <meta name="twitter:card" content="summary">
    <meta name="twitter:title" content="{{$data->title}}">
    <meta name="twitter:description" content="{{$data->deskripsi}}">
    <meta name="twitter:image" content="{{asset($data->image)}}">
    <!-- Hreflang Tags untuk situs multibahasa atau multinasional -->
    <!-- Structured Data Markup -->
    <script type="application/ld+json">
        {
            "@context": "https://schema.org",
            "@type": "Organization",
            "name": "{{$data->title}}",
            "url": "{{Request()->url()}}",
            "logo": "{{asset($data->icon)}}"
        }
    </script>
    <link rel="stylesheet" href="{{ asset('frontend/vendor/fontawesome/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/vendor/fontawesome/css/brands.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/vendor/fontawesome/css/solid.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/vendor/fontawesome/css/regular.min.css') }}">
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&family=Poppins:ital,wght@0,100;0,300;0,400;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Quicksand:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('frontend/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/style.css') }}">
</head>

<body class="bg-body-tertiary">
    <x-navbar></x-navbar>
    <section class="content mb-4">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="card border-0">
                        <div class="card-body">
                            <h4 class="fw-bold">{{$data->title}}</h4>
                            <hr>
                           
                            <i class="fa fa-user"></i> Oleh : <strong>Administrator</strong>|<span class="ms-3 text-muted"><i class="fa fa-calendar"></i> {{ \Carbon\Carbon::parse($data->created_at)->translatedFormat('d F Y') }}</span>
                            <div class="row mt-4">
                                <div class="col-lg-12">
                                    <div class="card border-0 bg-transparent">
                                        <img src="{{ asset($data->image) }}" class="card-img" alt="{{$data->title}}">
                                    </div>
                                </div>
                            </div>
                            <div class="post mt-4 fs-4">
                                {!! $data->content !!}
                            </div>
                            
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="card border-0">
                        <div class="card-body">
                            <div class="mt-4 text-start">
                                <p>Share Postingan Ini Ke Social Media</p>
                                <hr>
                                {!! $shareComponent !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <footer class="bg-blue">
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
