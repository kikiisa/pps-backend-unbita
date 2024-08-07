@extends('backend.layouts.master', ['judul' => 'List Post']);
@section('content')
<section class="section">
    <div class="section-body">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <a href="{{Route('post.create')}}" class="mb-4 btn btn-primary">Add Post</a>
                        <div class="table-responsive">
                            <table class="table table-striped" id="table1">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Title Post</th>
                                        <th>Count Views</th>
                                        <th>Date Publish</th>
                                        <th>Category</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $item)
                                        <tr>
                                            <td>{{$loop->index+=1}}</td>
                                            <td>{{$item->title}}</td>
                                            <td>{{$item->views}}</td>
                                            <td>{{$item->created_at}}</td>
                                            <td>
                                                @if ($item->category == 'post')
                                                    <span class="badge bg-primary">Post</span>
                                                @elseif ($item->category == 'agenda')
                                                    <span class="badge bg-info">Agenda</span>
                                                @else
                                                    <span class="badge bg-warning">Pengumuman</span>
                                                @endif
                                            </td>
                                            <td>
                                                <form action="{{Route('post.destroy',$item->id)}}" method="post">
                                                    @csrf
                                                    @method("DELETE")
                                                    <button class="border-0 badge bg-danger" onclick="return confirm('apakah anda ingin menghapus  data ini ?')"><i class="bi bi-trash"></i></button>
                                                    <a href="{{Route('post.edit',$item->uuid)}}" class="badge bg-warning"><i class="bi bi-pen"></i></a>
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
<script>
    const openModal = () => {
        $('#add').appendTo("body").modal('show');
    }
</script>
@endsection
