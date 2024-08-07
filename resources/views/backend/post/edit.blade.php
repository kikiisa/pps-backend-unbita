@extends('backend.layouts.master', ['judul' => 'Change Post']);
@section('content')
    <section class="section">
        <div class="section-body">
            <div class="row justify-content-center">
               
                <div class="col-lg-8">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ Route('post.update',$data->id) }}" method="post" enctype="multipart/form-data">
                                @csrf
                                @method('put')
                                <div class="form-group">
                                    <label for="">Title Post</label>
                                    <input type="text" value="{{ $data->title }}" placeholder="Title Post" name="title" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="deskripsi">Deskripsi Post</label>
                                    <textarea class="form-control" name="deskripsi" rows="3" cols="3" name="deskripsi" id="deskripsi" placeholder="Deskripsi Post">{{$data->deskripsi}}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="">Content</label>
                                    <textarea name="content" id="summernote" placeholder="konten">{{$data->content}}</textarea>
                                    <a href="javascript:void(0)" class="mt-1 btn btn-outline-primary block" data-bs-toggle="modal" data-bs-target="#add">
                                        Tambah Gambar
                                    </a>
                                </div>
                                <div class="form-group">
                                    <label for="category">Kategori</label>
                                    <select name="category" id="category" class="form-control">
                                        <option value="agenda" {{ $data->category == "agenda" ? 'selected' : '' }}>Agenda</option>
                                        <option value="pengumuman" {{ $data->category == "pengumuman" ? 'selected' : '' }}>Pengumuman</option>
                                        <option value="post" {{ $data->category == "post" ? 'selected' : '' }}>Post</option>
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
                <div class="col-lg-4">
                    <div class="card">
                        <img class="card-img" src="{{ asset($data->image) }}" alt="" srcset="">
                        
                    </div>
                </div>
            </div>
        </div>
    </section>
    @include('backend.components.modal-image')
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
