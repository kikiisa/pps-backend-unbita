@extends('backend.layouts.master', ['judul' => 'Post']);
@section('content')
    <section class="section">
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ Route('post.store') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                @method('post')
                                <div class="form-group">
                                    <label for="">Title Post</label>
                                    <input type="text" placeholder="Title Post" value="{{ old('title') }}"
                                        name="title" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="deskripsi">Deskripsi Post</label>
                                    <textarea class="form-control" rows="3" cols="3" name="deskripsi" id="deskripsi" placeholder="Deskripsi Post"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="">Content</label>
                                    <textarea name="content" id="summernote"></textarea>
                                    <a href="javascript:void(0)" class="mt-1 btn btn-outline-primary block" data-bs-toggle="modal" data-bs-target="#add">
                                        Tambah Gambar
                                    </a>
                                </div>
                                <div class="form-group">
                                    <label for="category">Category</label>
                                    <select name="category" id="" class="form-control">
                                        <option value="">-- Choose Category --</option>
                                        <option value="fakultas">Informasi Fakultas</option>
                                        <option value="post">Post News</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="">Cover</label>
                                    <input type="file" name="image" id="image" class="form-control-file">
                                </div>
                                <button class="btn btn-primary">simpan</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="modal fade" id="add" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Daftar Gambar</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row gallery" data-bs-toggle="modal" data-bs-target="#galleryModal">
                        @foreach ($data as $item)
                        <div class="col-6 col-sm-6 col-lg-3 mt-2 mt-md-0 mb-md-0 mb-2">
                            <a href="#">
                                <img class="w-100 active" src="{{asset($item->image)}}"  data-bs-target="#Gallerycarousel" data-bs-slide-to="0">
                            </a>
                                <a href="javascript:void(0)" class="w-100 btn btn-primary mt-1" onclick="return copyToClipboard('{{asset($item->image)}}')">Salin Gambar<i class="bi bi-clipboard ms-2"></i></a>
                        </div>
                        @endforeach
                    </div>
                    {{$data->links()}}
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <script>
        const  copyToClipboard = (text) => {
            navigator.clipboard.writeText(text);

            Toastify({
                text: "Gambar Berhasil Di Salin, Selanjutnya Url Tersebut Di Paste Pada Text Editor",
                duration: 3000,
                close: true,
                backgroundColor: "#19C37D",
            }).showToast();
        }
    </script>
    <script src="{{asset('template/vendor/jquery.min.js')}}"></script>
    <script src="{{asset('template/vendor/summernote/summernote.min.js')}}"></script>
    <script>
        $(document).ready(function() {
            $('#summernote').summernote();
        });
    </script>
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
