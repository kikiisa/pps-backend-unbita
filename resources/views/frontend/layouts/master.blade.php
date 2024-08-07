<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="UTF-8">
    <meta name="description" content="{{ $app->deskripsi }}">
    <meta name="keywords" content="Kuliah,Pascasarjana,Unbita,Universitas">
    <meta name="robots" content="index, follow">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="{{ asset($app->icon) }}" type="image/x-icon">
    <title>{{ $app->title }}</title>
    <link rel="canonical" href="{{ Request()->url() }}">
    <!-- Open Graph Tags untuk berbagi di platform media sosial -->
    <meta property="og:title" content="{{ $app->title }}">
    <meta property="og:description" content="{{ $app->deskripsi }}">
    <meta property="og:image" content="{{ asset($app->icon) }}">
    <!-- Twitter Card Tags untuk berbagi di Twitter -->
    <meta name="twitter:card" content="summary">
    <meta name="twitter:title" content="{{ $app->title }}">
    <meta name="twitter:description" content="{{ $app->deskripsi }}">
    <meta name="twitter:image" content="{{ asset($app->icon) }}">
    <!-- Hreflang Tags untuk situs multibahasa atau multinasional -->
    <!-- Structured Data Markup -->
    <script type="application/ld+json">
        {
            "@context": "https://schema.org",
            "@type": "Organization",
            "name": "{{$app->title}}",
            "url": "{{Request()->url()}}",
            "logo": "{{asset($app->icon)}}"
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
</head>

<body>

    <header class="fixed-top">
        
        @include('components.information')
        @include('components.navbar')
    </header>
    @yield('content')
    @include('components.footer')
    <script src="{{ asset('frontend/vendor/fontawesome/js/all.min.js') }}"></script>
    <script src="{{ asset('frontend/vendor/fontawesome/js/brands.min.js') }}"></script>
    <script src="{{ asset('frontend/vendor/fontawesome/js/regular.min.js') }}"></script>
    <script src="{{ asset('frontend/vendor/fontawesome/js/solid.min.js') }}"></script>
    <script src="{{ asset('frontend/js/bootstrap.bundle.min.js') }}"></script>
   
</body>

</html>
