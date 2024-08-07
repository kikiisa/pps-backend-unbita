@extends('frontend.layouts.master', ['judul' => 'PPS - Home'])
@section('content')
    <link rel="stylesheet" href="{{ asset('template/assets/extensions/simple-datatables/style.css') }}" />
    <link rel="stylesheet" href="{{ asset('template/assets/css/pages/simple-datatables.css') }}" />
    <section style="margin-top: 120px">
        <div class="row justify-content-center">
            <div class="col-lg-10 text-center">
                @if ($slider->count() > 0)
                    <swiper-container autoplay="true">
                        @foreach ($slider as $sl)
                            <swiper-slide lazy="true">
                                <div class="card" onclick="return moveToPage('{{ $sl->link }}')">
                                    <img class="card-img" src="{{ asset($sl->image) }}" loading="lazy" />
                                </div>
                            </swiper-slide>
                        @endforeach
                    </swiper-container>
                @else
                    <div class="col-lg-6 text-center">
                        <div class="bg-danger p-4 rounded text-dark  fw-bold   text-center">
                            Data Galery Masih Kosong <i class="fa fa-exclamation"></i>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </section>
   
    <section class="artikel mt-4 py-4">
        <h4 class="text-center "><span class="fw-bold bg-primary text-dark p-2 rounded-4">Berita Dan Informasi</span></h4>
        @if ($post->count() > 0)
            <div class="container p-4 mt-4 rounded-3">
                <a href="{{ Route('artikel') }}" class="bg-primary p-2 rounded-4 text-dark  mb-3 fw-bold">Lihat Lebih
                    Banyak</a>
                <div class="row justify-content-start mt-3">
                    @foreach ($post as $pst)
                        <div class="col-lg-4 mb-2">
                            <div class="card border-0 rounded-2 shadow">
                                <div class="card-body">
                                    <img src="{{ asset($pst->image) }}" class="card-img-top rounded-2 mb-3" alt="...">
                                    <span class="mb-2 text-dark"><i class="fa fa-calendar"></i><span
                                            class="ms-2">{{ \Carbon\Carbon::parse($pst->created_at)->translatedFormat('d F Y') }}</span></span>
                                    <h6 class="mb-2 fw-bold mt-2">{{ $pst->title }}</h6>
                                    <small>
                                        {{ $limitedText = Str::limit($pst->deskripsi, 50) }}
                                        @if (strlen($limitedText) > 50)
                                            {{ $limitedText }}
                                        @endif
                                    </small><br>

                                    <br>
                                    <a href="{{ route('post.detail', $pst->slug) }}"
                                        class="bg-primary p-2 text-dark fw-bold rounded"
                                        style="text-decoration: none">Lihat Artikel</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                @if ($post->previousPageUrl())
                    <a href="{{ $post->previousPageUrl() }}" class="btn btn-dark text-dark fw-bold"> <i
                            class="fa fa-arrow-left"> </i> Prev</a>
                @endif
                @if ($post->nextPageUrl())
                    <a href="{{ $post->nextPageUrl() }}" class="btn btn-dark text-dark fw-bold">Next <i
                            class="fa fa-arrow-right"></i></a>
                @endif
            </div>
        @else
            <div class="row justify-content-center mt-4">
                <div class="col-lg-6">
                    <div class="bg-danger p-4 rounded text-dark  fw-bold   text-center">
                        Berita Dan Informasi Masih Kosong <i class="fa fa-exclamation"></i>
                    </div>
                </div>
            </div>
        @endif
    </section>

    <section class="mt-4 py-4 container">
        <h4 class="text-center mb-4"><span class="fw-bold bg-primary text-dark p-2 rounded-4">File Document</span></h4>
        <div class="row justify-content-center rounded">
            <div class="col-lg-12">
                <div class="card border-0 rounded-4">
                    <div class="card-body">
                        <table class="table" id="table1">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Nama Document</th>
                                    <th scope="col">Tipe File</th>
                                    <th scope="col">Download</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($fileManager as $d)
                                    <tr>

                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $d->title }}</td>
                                        <td>
                                            @if (substr(strrchr($d->file_path, '.'), 1) == 'pdf')
                                                PDF
                                                <i class="bi bi-file-pdf-fill text-danger"></i>
                                            @endif
                                            @if (substr(strrchr($d->file_path, '.'), 1) == 'docx')
                                                DOCX
                                                <i class="bi bi-file-word-fill text-primary"></i>
                                            @endif
                                            @if (substr(strrchr($d->file_path, '.'), 1) == 'xlsx')
                                                EXCEL
                                                <i class="bi bi-file-excel-fill text-success"></i>
                                            @endif
                                            @if (substr(strrchr($d->file_path, '.'), 1) == 'pptx')
                                                POWERPOINT
                                                <i class="bi bi-file-powerpoint-fill text-warning"></i>
                                            @endif

                                        </td>
                                        <td>

                                            <a href="{{ Route('file-manager.download', $d->uuid) }}"
                                                style="text-decoration:none;" class="badge bg-success border-0">
                                                Download
                                            </a>

                                        </td>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script src="{{ asset('template/vendor/swiper.min.js') }}"></script>
    <script src="{{ asset('template/assets/extensions/toastify-js/src/toastify.js') }}"></script>
    <script src="{{ asset('template/assets/extensions/simple-datatables/umd/simple-datatables.js') }}"></script>
    <script src="{{ asset('template/assets/js/pages/simple-datatables.js') }}"></script>
    <script>
        const alertError = () => {
            Toastify({
                text: 'Masih Belum Beropersi',
                duration: 3000,
                close: true,
                backgroundColor: "#D61355",
            }).showToast();
        }
    </script>
    <script>
        const moveToPage = (params) => {
            document.location.href = params
        }
    </script>
@endsection
