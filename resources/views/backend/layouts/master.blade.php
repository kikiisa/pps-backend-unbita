<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $judul }}</title>
    <link rel="stylesheet" href="{{asset('template/assets/css/main/app.css')}}">
    <link rel="stylesheet" href="{{asset('template/assets/css/main/app-dark.css')}}">
    <link rel="shortcut icon" href="{{asset('template/assets/images/logo/favicon.svg" type="image/x-icon')}}">
    <link rel="shortcut icon" href="{{asset('template/assets/images/logo/favicon.png" type="image/png')}}">
    <link rel="stylesheet" href="{{asset('template/assets/css/shared/iconly.css')}}">
    <link rel="stylesheet" href="{{ asset('template/assets/extensions/toastify-js/src/toastify.css')}}">
    <link rel="stylesheet" href="{{ asset('template/assets/extensions/simple-datatables/style.css')}}"/>
    <link rel="stylesheet" href="{{ asset('template/assets/css/pages/simple-datatables.css')}}" />
    <link rel="stylesheet" href="{{asset('template/vendor/summernote/summernote.min.css')}}">
</head>
<body>
    <div id="app">
        @include('backend.layouts.sidebar')
        <div id="main">
            <header class="mb-3">
                <a href="#" class="burger-btn d-block d-xl-none">
                    <i class="bi bi-justify fs-3"></i>
                </a>
            </header>
            <div class="page-heading">
                <h3>{{ $judul }}</h3>
            </div>
            <div class="page-content">
                @yield('content')
            </div>
        </div>
    </div>
    <script src="{{ asset('template/assets/js/bootstrap.js')}}"></script>
    <script src="{{ asset('template/assets/js/app.js')}}"></script>
    <script src="{{ asset('template/assets/extensions/simple-datatables/umd/simple-datatables.js')}}"></script>    
    <script src="{{ asset('template/assets/js/pages/simple-datatables.js')}}"></script>
</body>
</html>
