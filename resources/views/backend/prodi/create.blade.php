@extends('backend.layouts.master', ['judul' => 'Tambah Informasi Prodi']);
@section('content')
    <section class="section">   
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <a href="javascript:void(0)" class="mb-3 btn btn-outline-primary block" data-bs-toggle="modal" data-bs-target="#add">
                                Input Gambar
                            </a>
                            <a href="javascript:void(0)" class="mb-3 btn btn-outline-primary block" data-bs-toggle="modal" data-bs-target="#file">
                                Input File
                            </a>
                            <form method="POST" action="{{Route("management-prodi.store")}}">
                                @csrf
                                @method("POST")
                                <div class="form-group">
                                    <label for="title">Nama Prodi</label>
                                    <input type="text" name="name" placeholder="Nama Prodi" class="form-control" id="ti">
                                </div>
                                <div class="form-group">
                                    <label for="logo">Logo</label>
                                    <input type="text" placeholder="Link Gambar" class="form-control" id="logo" name="logo">
                                   
                                </div>
                                <div class="form-group">
                                    <label for="menu">Menu</label>
                                    <input type="text" class="form-control" id="menu" name="menu" placeholder="Masukkan Nama Menu">
                                </div>
                                <div class="form-group">
                                    <label for="visi">Visi</label>
                                    <input type="text" class="form-control" id="visi" name="visi" placeholder="Masukkan visi">
                                </div>
                                <div class="form-group">
                                    <label for="misi">Misi</label>
                                    <input type="text" class="form-control" id="misi" name="misi" placeholder="Masukkan misi">
                                </div>
                                <div class="form-group">
                                    <label for="gambar">Gambar</label>
                                    <input type="text" class="form-control" id="gambar" name="gambar" placeholder="Masukkan URL gambar">
                                    
                                </div>
                                <div class="form-group">
                                    <label for="struktur">Struktur</label>
                                    <input type="text" class="form-control" id="struktur" name="struktur" placeholder="Masukkan struktur">
                                    
                                </div>
                                <div class="form-group">
                                    <label for="deskripsi">Deskripsi</label>
                                    <textarea class="form-control" id="editor" name="deskripsi" rows="3" placeholder="Masukkan deskripsi"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="dokumentPMU">Dokument PMU</label>
                                    <input type="text" class="form-control" id="dokumentPMU" name="dokumentPMU" placeholder="Link Google Drive dokument PMU">
                                </div>
                                <div class="form-group">
                                    <label for="dokumentKKU">Dokument KKU</label>
                                    <input type="text" class="form-control" id="dokumentKKU" name="dokumentKKU" placeholder="Link Google Drive dokument KKU">
                                </div>
                                <div class="form-group">
                                    <label for="dokumentAKR">Dokument AKR</label>
                                    <input type="text" class="form-control" id="dokumentAKR" name="dokumentAKR" placeholder="Link Google Drive dokument AKR">
                                </div>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @include('backend.components.modal-image')
    @include('backend.components.modal-file')
    
    <script src="{{asset('template/vendor/jquery.min.js')}}"></script>
    <script src="{{asset('template/vendor/summernote/summernote.min.js')}}"></script>
    <script>
        $(document).ready(function() {
            $('#editor').summernote();
        });
    </script>
     <script>
        const  copyToClipboard = (text) => {
            navigator.clipboard.writeText(text);

            Toastify({
                text: "Gambar Berhasil Di Salin, Selanjutnya Url Tersebut Di Paste Pada Text Editor",
                duration: 3000,
                close: true,
                backgroundColor: "#19C37D",
            }).showToast();
        };
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
