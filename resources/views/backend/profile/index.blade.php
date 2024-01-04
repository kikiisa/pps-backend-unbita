@extends('backend.layouts.master', [
    'judul' => 'Profile',
])
@section('content')
    <section class="section">
        <div class="card">
            <div class="card-header">Profile</div>
            <div class="card-body">
                <form action="{{Route('profile.update',Auth::user()->id)}}" method="POST">
                    @csrf
                    @method("PUT")
                    <div class="form-group">
                        <label for="name" class="form-label">Nama Lengkap</label>
                        <input type="text" name="name" id="name" value="{{ Auth::user()->name }}" class="form-control" placeholder="Your Name">
                    </div>
                    <div class="form-group">
                        <label for="email" class="form-label">Email</label>
                        <input type="text" name="email" value="{{ Auth::user()->email }}" id="email" class="form-control" placeholder="Your Email">
                    </div>
                    <small class="text-info mb-3">Kosongkan Jika Tidak Ingin Mengupdate Password</small>
                    <div class="form-group">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" name="password" id="password" class="form-control" placeholder="Your Password">
                    </div>
                    <div class="form-group">
                        <label for="password_confirmation" class="form-label">Konfirmasi Password</label>
                        <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" placeholder="Your Password">
                    </div>
                    <div class="form-group">
                        <button  class="btn btn-primary">simpan perubahan</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
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
@endsection
