@extends('backend.layouts.master', [
    'judul' => 'Edit Slider',
])
@section('content')
    <section class="section">
        <div class="row">
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-body">
                        <img src="{{asset($data->image)}}" alt="default"  style='height: 100%; width: 100%; object-fit: contain'>
                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-body">
                        <form action="{{Route('slider.update', $data->id)}}" enctype="multipart/form-data" method="post">
                            @method('PUT')
                            @csrf
                            <div class="form-group">
                                <label for="kategori">Nama Slider</label>
                                <input type="text" required placeholder="Nama Slider" value="{{$data->judul}}" name="judul" class="form-control">
                            </div> 
                            <div class="form-group">
                                <label for="">Link</label>
                                <input type="text" name="link" required value="{{$data->link}}" placeholder="Link URL" class="form-control">
                            </div>              
                            <div class="form-group">
                                <label for="gambar">Gambar</label>
                                <br><input type="file" name="gambar" id="gambar" class="form-control-file">
                                <br><small class="text-info">Kosongkan Jika Tidak Ingin Di Ubah</small>
                            </div>   
                            <div class="form-group">
                                <label for="status">Status</label>
                                <select required name="status" id="" class="form-control">
                                    <option value="">--Pilih Status--</option>
                                    <option value="active" {{$data->status == 'active' ? 'selected' : ''}}>Aktif</option>
                                    <option value="inactive" {{$data->status == 'inactive' ? 'selected' : ''}}>Tidak Aktif</option>
                                </select>
                            </div>
                            <button class="btn btn-primary">simpan</button>
                        </form>
                    </div>
                </div>
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
