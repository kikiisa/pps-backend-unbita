@extends('backend.layouts.master', ['judul' => 'Pengaturan']);
@section('content')
    <section class="section">   
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ Route('pengaturan.update',$data->id) }}" method="post" enctype="multipart/form-data">
                                @csrf
                                @method('put')
                                <div class="form-group">
                                    <label for="title">Title Apps</label>
                                    <input placeholder="Title" name="title" type="text" value="{{$data->title}}" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="deskripsi">Deskripsi</label>
                                    <textarea name="deskripsi" id="deskripsi" placeholder="Deskripsi" class="form-control">{{$data->deskripsi}}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="phone">Whatsapps</label>
                                    <input type="text" name="phone" value="{{$data->phone}}" class="form-control">
                                </div>
                                
                                <div class="form-group">
                                    <label for="visi_misi">Visi & Misi</label>
                                    <textarea name="visi_misi" class="form-control" id="visi_misi" cols="30" rows="10">{{$data->visi_misi}}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="about">Tentang Pasca sarjana</label>
                                    <textarea name="about"  class="form-control" id="editor" cols="30" rows="10">{{$data->about}}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="icon">Icon Aplikasi</label>
                                    <div class="card">
                                        <div class="card-img">
                                            <img src="{{asset($data->icon)}}" alt="" srcset="">
                                        </div>
                                    </div>
                                    <input type="file" name="icon" id="icon" class="form-control-file">
                                </div>
                                <div class="form-group">
                                    <label for="total_mahasiswa">Total Mahasiswa</label>
                                    <input type="text" class="form-control" value="{{$data->total_mahasiswa}}" id="total_mahasiswa" name="total_mahasiswa" placeholder="Masukkan total mahasiswa">
                                </div>
                                
                                <!-- Total Pengajar -->
                                <div class="form-group">
                                    <label for="total_pengajar">Total Pengajar</label>
                                    <input type="text" class="form-control" value="{{$data->total_pengajar}}" id="total_pengajar" name="total_pengajar" placeholder="Masukkan total pengajar">
                                </div>
                                
                                <!-- Total Lulusan -->
                                <div class="form-group">
                                    <label for="total_lulusan">Total Lulusan</label>
                                    <input type="text" class="form-control" id="total_lulusan" value="{{$data->total_lulusan}}" name="total_lulusan" placeholder="Masukkan total lulusan">
                                </div>
                                <button class="btn btn-primary">simpan</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script src="{{asset('template/vendor/jquery.min.js')}}"></script>
    <script src="{{asset('template/vendor/summernote/summernote.min.js')}}"></script>
    <script>
        $(document).ready(function() {
            $('#visi_misi').summernote();
            $('#editor').summernote();
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
