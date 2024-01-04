    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Login</title>
        <link rel="stylesheet" href="{{ asset('template/assets/css/main/app.css') }}">
        <link rel="stylesheet" href="{{ asset('template/assets/css/main/app-dark.css') }}">
        <link rel="shortcut icon" href="{{ asset('template/assets/images/logo/favicon.svg" type="image/x-icon') }}">
        <link rel="shortcut icon" href="{{ asset('template/assets/images/logo/favicon.png" type="image/png') }}">
        <link rel="stylesheet" href="{{ asset('template/assets/css/shared/iconly.css') }}">
        <link rel="stylesheet" href="{{ asset('template/assets/extensions/toastify-js/src/toastify.css') }}">
    </head>
    <body>
        <div class="row justify-content-center">
            <div class="col-lg-4 mt-4">
                <div class="card">
                    <div class="card-body">
                        <div class="auth-logo text-center">
                            <img src="{{ asset('template/assets/images/logo.png') }}" class="bg-dark rounded-circle" width="90" alt="" srcset="">
                        </div>
                        <h1 class="text-center auth-title mt-2">PPS</h1>
                        <p class="text-center auth-subtitle">Silahkan masuk.</p>
                        <form method="POST" action="{{Route('auth.store')}}">
                            @method("POST")
                            @csrf
                            <div class="form-group position-relative has-icon-left mb-4">
                                <input required type="text" name="email" class="form-control form-control-xl" placeholder="Email">
                                <div class="form-control-icon">
                                    <i class="bi bi-envelope"></i>
                                </div>
                            </div>
                            <div class="form-group position-relative has-icon-left mb-4">
                                <input required type="password" name="password" class="form-control form-control-xl" placeholder="Password">
                                <div class="form-control-icon">
                                    <i class="bi bi-shield-lock"></i>
                                </div>
                            </div>
                            <button class="btn btn-primary btn-block btn-lg shadow-lg">Log in</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <script src="{{ asset('template/assets/extensions/toastify-js/src/toastify.js') }}"></script>
        @if (count($errors) > 0)
            <script>
                var errors = @json($errors->all());
                Toastify({
                    text: errors,
                    duration: 3000,
                    close: true,
                    backgroundColor: "#D61355",
                }).showToast();
            </script>
        @enderror
        @if (session()->has('success'))
            <script>
                Toastify({
                    text: "{{ session('success') }}",
                    duration: 3000,
                    close: true,
                    backgroundColor: "#19C37D",
                }).showToast();
            </script>
        @endif

        @if (session()->has('error'))
            <script>
                Toastify({
                    text: "{{ session('error') }}",
                    duration: 3000,
                    close: true,
                    backgroundColor: "#D61355",
                }).showToast();
            </script>
        @endif
        <script src="{{ asset('template/assets/js/bootstrap.js') }}"></script>
        <script src="{{ asset('template/assets/js/app.js') }}"></script>
        <script src="{{ asset('template/assets/extensions/simple-datatables/umd/simple-datatables.js') }}"></script>
        <script src="{{ asset('template/assets/js/pages/simple-datatables.js') }}"></script>
    </body>

    </html>
