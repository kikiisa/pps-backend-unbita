@extends('backend.layouts.master', [
    'judul' => 'File Manager',
])
@section('content')
    <section class="section">
        <div class="row">
            <div class="col-lg-4 mb-3">
                <button type="button" class="btn btn-primary block" data-bs-toggle="modal" data-bs-target="#add">
                    Tambah File
                </button>
            </div>
        </div>
        <div class="row justify-content-center">
            @if ($data->count() > 0)       
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">File Manager</h5>
                    </div>
                    <div class="card-body">
                        <table class="table"  id="table1">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Nama Document</th>
                                    <th scope="col">Tipe File</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $d)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $d->title }}</td>
                                        <td>
                                            @if (substr(strrchr($d->file_path, "."), 1) == "pdf")
                                                PDF
                                                <i class="bi bi-file-pdf-fill text-danger"></i>
                                            @endif
                                            @if (substr(strrchr($d->file_path, "."), 1) == "docx")
                                                DOCX
                                                <i class="bi bi-file-word-fill text-primary"></i>
                                            @endif
                                            @if (substr(strrchr($d->file_path, "."), 1) == "xlsx")
                                                EXCEL
                                                <i class="bi bi-file-excel-fill text-success"></i>
                                            @endif
                                            @if (substr(strrchr($d->file_path, "."), 1) == "pptx")
                                                POWERPOINT
                                                <i class="bi bi-file-powerpoint-fill text-warning"></i>
                                            @endif
                                            
                                        </td>
                                        <td>
                                            <form action="{{Route('file-manager.destroy',$d->id)}}" method="post">
                                                @method('DELETE')
                                                @csrf
                                                <a href="{{Route('file-manager.download',$d->uuid)}}" class="badge bg-success border-0">
                                                    <span class="bi bi-download"></span>
                                                </a>
                                                <button class="badge bg-danger border-0"><i class="bi bi-trash"></i></button>
                                            </form>
                                            
                                        </td>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
               
            @else
                <div class="col-lg-6">
                    <div class="alert alert-danger mt-4 text-center">Belum Ada File</div>
                </div>
            @endif
        </div>

    </section>
    <div class="modal fade text-left modal-borderless" id="add" tabindex="-1" role="dialog"
        aria-labelledby="myModalLabel1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah File</h5>
                    <button type="button" class="close rounded-pill" data-bs-dismiss="modal" aria-label="Close">
                        <i data-feather="x"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{Route('file-manager.index')}}" method="post" enctype="multipart/form-data">
                        @method('POST')
                        @csrf
                        <div class="form-group">
                            <label for="titile">Judul File</label>
                            <input type="text" placeholder="Judul File" name="title" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="deskripsi">Deskripsi</label>
                            <textarea name="deskripsi" class="form-control" id="deskripsi" placeholder="Deskripsi"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="file">File</label>
                            <input type="file" required name="file" id="file" class="form-control-file">
                            <span class="text-info">docx,pdf,csv,xlsx,ppt,pptx</span>
                        </div>
                        <button class="btn btn-primary">Simpan</button>
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
