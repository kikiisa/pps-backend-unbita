@extends('backend.layouts.master', [
    'judul' => 'Daftar Slider',
])
@section('content')
    <section class="section">
        <div class="card">
            <div class="card-header">Slider</div>
            <div class="card-body">
                <button type="button" class="btn btn-outline-primary block" data-bs-toggle="modal" data-bs-target="#add">
                    Tambah Slider
                </button>
                <table class="table table-striped" id="table1">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Judul Slider</th>
                            <th>Gambar</th>
                            <th>Status Slider</th>
                            <th>Action</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $item)
                            <tr>
                                <td>{{ $loop->index + 1 }}</td>
                                <td>{{ $item->judul }}</td>
                                <td>
                                    <img width="90" src="{{ asset($item->image) }}" alt="{{ $item->image }}">
                                </td>
                                <td>
                                    @if ($item->status == 'active')
                                        <span class="badge bg-success">Aktif</span>
                                    @else
                                        <span class="badge bg-danger">Non Aktif</span>
                                    @endif
                                </td>
                                <td>
                                    <form action="{{ Route('slider.destroy', $item->id) }}" method="post">
                                        @method('DELETE')
                                        @csrf
                                        <button class="btn btn-danger"
                                            onclick="return confirm('Menghapus Data slider ? Menghapus Data Transaksi Lainya')"><i
                                                class="bi bi-trash"></i></button>
                                        <a href="{{ Route('slider.edit', $item->uuid) }}" class="btn btn-warning"><i
                                                class="bi bi-pen"></i></a>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>
    <div class="modal fade text-left modal-borderless" id="add" tabindex="-1" role="dialog"
        aria-labelledby="myModalLabel1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Slider</h5>
                    <button type="button" class="close rounded-pill" data-bs-dismiss="modal" aria-label="Close">
                        <i data-feather="x"></i>
                    </button>
                </div>
                <form action="{{ route('slider.store') }}" method="post" enctype="multipart/form-data">
                    <div class="modal-body">
                        @method('POST')
                        @csrf
                        <div class="form-group">
                            <label for="slider">Nama Slider</label>
                            <input type="text" placeholder="Nama Slider" name="judul" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="link">Link Slider</label>
                            <input type="text" name="links" class="form-control" placeholder="Link Slider"
                                class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="gambar">Gambar</label>
                            <input type="file" name="gambar" id="gambar" class="form-control-file">
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
