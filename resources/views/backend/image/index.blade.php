@extends('backend.layouts.master', [
    'judul' => 'Daftar Gambar',
])
@section('content')
    <section class="section">
        <div class="row">
            <div class="col-lg-4 mb-3">
                <button type="button" class="btn btn-outline-primary block" data-bs-toggle="modal" data-bs-target="#add">
                    Tambah Gambar
                </button>
            </div>
        </div>
        <div class="row justify-content-center">
            @if ($data->count() > 0)       
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Data Gambar</h5>
                       
                    </div>
                    <div class="card-body">
                        <div class="row gallery" data-bs-toggle="modal" data-bs-target="#galleryModal">
                            @foreach ($data as $item)
                            <div class="col-6 col-sm-6 col-lg-3 mt-2 mt-md-0 mb-md-0 mb-2">
                                <a href="#">
                                    <img class="w-100 active" src="{{asset($item->image)}}"  data-bs-target="#Gallerycarousel" data-bs-slide-to="0">
                                </a>
                                <form action="{{Route('image.destroy',$item->id)}}" method="post">
                                    @csrf
                                    @method("DELETE")
                                    <button onclick="return confirm('apakah akan menghapus gambar ini ?')" class="btn btn-danger mt-1"><i class="bi bi-trash"></i></button>
                                    <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#showImage" onclick="return showImage('{{asset($item->image)}}')" class="btn btn-success mt-1"><i class="bi bi-eye"></i></a>
                                    <a href="javascript:void(0)" onclick="return copyToClipboard('{{asset($item->image)}}')" class="btn btn-primary mt-1"><i class="bi bi-clipboard"></i></a>
                                </form>
                            </div>
                            @endforeach
                        </div>
                        {{$data->links()}}
                    </div>
                </div>
               
            @else
                <div class="col-lg-6">
                    <div class="alert alert-danger mt-4 text-center">Belum Ada Data Image</div>
                </div>
            @endif
        </div>

    </section>
    <div class="modal fade text-left modal-borderless" id="add" tabindex="-1" role="dialog"
        aria-labelledby="myModalLabel1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Gambar</h5>
                    <button type="button" class="close rounded-pill" data-bs-dismiss="modal" aria-label="Close">
                        <i data-feather="x"></i>
                    </button>
                </div>
                <form action="{{ route('image.store') }}" method="post" enctype="multipart/form-data">
                    <div class="modal-body">
                        @method('POST')
                        @csrf
                        <div class="form-group">
                            <label for="gambar">Gambar</label>
                            <input type="file" required name="gambar" id="gambar" class="form-control-file">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light-primary" data-bs-dismiss="modal">
                            <i class="bx bx-x d-block d-sm-none"></i>
                            <span class="d-none d-sm-block">Close</span>
                        </button>
                        <button class="btn btn-primary ml-1" type="submit">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal fade text-left modal-borderless" id="showImage" tabindex="-1" role="dialog"
        aria-labelledby="myModalLabel1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <img src="" class="card-img w-100" alt="" srcset="">
                
            </div>
        </div>
    </div>
    <script src="{{ asset('template/assets/extensions/toastify-js/src/toastify.js') }}"></script>
    <script>
        const showImage = (path) =>
        {
           return  document.querySelector(".card-img").src = path;
        }
        const copyToClipboard = (text) => {
            navigator.clipboard.writeText(text);
            Toastify({
                text: "Link Copied",
                duration: 3000,
                close: true,
                backgroundColor: "#19C37D",
            }).showToast();
        }
    </script>
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

    @error('name')
        <script>
            Toastify({
                text: "{{ $message }}",
                duration: 3000,
                close: true,
                backgroundColor: "#D61355",
            }).showToast();
        </script>
    @enderror
    @error('username')
        <script>
            Toastify({
                text: "{{ $message }}",
                duration: 3000,
                close: true,
                backgroundColor: "#D61355",
            }).showToast();
        </script>
    @enderror
    @error('email')
        <script>
            Toastify({
                text: "{{ $message }}",
                duration: 3000,
                close: true,
                backgroundColor: "#D61355",
            }).showToast();
        </script>
    @enderror
@endsection
