@extends('backend.layouts.master', ['judul' => 'Management Prodi']);
@section('content')
    <section class="section">
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <a href="{{ Route('management-prodi.create') }}" class="btn btn-outline-primary block">
                                Tambah Prodi
                            </a>
                            <table class="table table-striped" id="table1">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Prodi</th>
                                     
                                        <th>Action</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $item)
                                        <tr>
                                            <td>{{ $loop->index + 1 }}</td>
                                            <td>{{$item->name}}</td>
                                            <td>
                                                <form action="{{ Route('management-prodi.destroy', $item->id) }}" method="post">
                                                    @method('DELETE')
                                                    @csrf
                                                    <button class="btn btn-danger"
                                                        onclick="return confirm('Menghapus Data slider ? Menghapus Data Transaksi Lainya')"><i
                                                            class="bi bi-trash"></i></button>
                                                    <a href="{{ Route('management-prodi.edit', $item->id) }}" class="btn btn-warning"><i
                                                            class="bi bi-pen"></i></a>
                                                </form>

                                            </td>
                                            
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
      
    </section>
    <script src="{{ asset('template/vendor/jquery.min.js') }}"></script>
    <script src="{{ asset('template/vendor/summernote/summernote.min.js') }}"></script>
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
