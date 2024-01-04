@extends('frontend.layouts.master', ['judul' => 'PPS - Home'])
@section('content')
    <section class="hero">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 text-center mt-4 py-4">
                    <h1 class="fw-bold text-white">
                        Universitas Bina Taruna
                    </h1>
                    <h2 class="mt-3"><span class="bg-blue text-white p-2 rounded-4 fw-bold">Kampus Pelopor Inovasi</span></h2>
                    <p class="mt-4 text-white">Cerdas Spiritual (SIQ), Intelektual (IQ),
                        Emosional (EQ) dan Sosial (SQ).</p>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-2 col-4 mt-4 py-3">
                    <img src="{{ asset('frontend/img/1.webp') }}" class="animasi" alt="" srcset="">
                </div>
                <div class="col-lg-2 col-4">
                    <img src="{{ asset('frontend/img/2.webp') }}" class="animasi" alt="" srcset="">
                </div>
                <div class="col-lg-2 col-4 mt-4 py-3">
                    <img src="{{ asset('frontend/img/3.webp') }}" class="animasi" alt="" srcset="">
                </div>
            </div>
        </div>
    </section>

    <section class="artikel mt-4 py-4">
        <h2 class="text-center "><span class="fw-bold bg-blue text-white p-2 rounded-4">Artikel Terbaru</span></h2>
        <div class="container bg-blue p-4 mt-4 rounded-3">
            <a href="{{Route('artikel')}}" class="btn btn-light mb-3 fw-bold">Lihat Lebih Banyak</a>
            <div class="row justify-content-start">
                @foreach ($post as $pst)
                    <div class="col-lg-4 mb-2">
                        <div class="card border-0 rounded-2">
                            <img src="{{ asset($pst->image) }}" class="card-img-top rounded-2" alt="...">
                            <div class="card-body">

                                <h6 class="mb-2 fw-bold mt-2">{{ $pst->title }}</h6>
                                <small>
                                    {{ $limitedText = Str::limit($pst->deskripsi, 50) }}
                                    @if (strlen($limitedText) > 50)
                                        {{ $limitedText }}
                                    @endif
                                </small><br>
                                <span class="mb-2 text-dark"><i class="fa fa-calendar"></i><span class="ms-2">{{ \Carbon\Carbon::parse($pst->created_at)->translatedFormat('d F Y') }}</span></span>
                                <br>
                                <a href="{{ route('post.detail', $pst->slug) }}"
                                    class="btn bg-blue text-white mt-1 fw-bold">Lihat Artikel</a>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
            @if ($post->previousPageUrl())
                <a href="{{ $post->previousPageUrl() }}" class="mb-2 mt-3 btn btn-light"><i class="fa fa-arrow-left"></i>
                    Prev</a>
            @endif
            @if ($post->nextPageUrl())
                <a href="{{ $post->nextPageUrl() }}" class="ms-2 mb-2 mt-3 btn btn-light"><i class="fa fa-arrow-right"></i>
                    Next</a>
            @endif
        </div>
    </section>
   
    <section class="fakultas mt-4 py-4 container">
        <h2 class="text-center mb-4"><span class="fw-bold bg-blue text-white p-2 rounded-4">Informasi Fakultas</span></h2>
        <div class="row justify-content-center">
            @forelse ($fakultas as $fkt)
                <div class="col-lg-12">
                    <div class="row mt-4 mb-4">
                        <div class="col-lg-5">
                            <div class="card border-0 bg-transparent">
                                <img src="{{ asset($fkt->image) }}" class="card-img-top rounded-5" alt="">
                            </div>
                        </div>
                        <div class="col-lg-7">
                            <div class="card border-0 bg-transparent ">
                                <h1 class="text-primary fw-bold">{{ $fkt->title }}</h1>
                                <p class="fs-5 fw-light">
                                    {{ $limitedText = Str::limit($fkt->deskripsi, 150) }}
                                    @if (strlen($limitedText) > 150)
                                        {{ $limitedText }}
                                    @endif
                                </p>
                                <div class="card-body">
                                    <a href="{{ route('post.detail', $fkt->slug) }}" class="btn bg-blue text-white fw-bold">Selengkapnya</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-lg-6">
                    <div class="bg-danger p-4 rounded text-white  fw-bold   text-center">
                        Data Fakultas Masih Kosong <i class="fa fa-exclamation"></i>
                    </div>
                </div>
            @endforelse
        </div>
    </section>
    <section class="portofolio mt-4 py-4 container">
        <h2 class="text-center mb-4"><span class="fw-bold bg-blue text-white p-2 rounded-4">Portofolio</span></h2>
        <div class="row justify-content-center">
            @if ($slider->count() > 0)
                <div class="col-lg-12">
                    <swiper-container autoplay="true">
                        @foreach ($slider as $sl)
                            <swiper-slide lazy="true">
                                <div class="card" onclick="return moveToPage('{{ $sl->link }}')">
                                    <img class="card-img" src="{{ asset($sl->image) }}" loading="lazy" />
                                </div>
                            </swiper-slide>
                        @endforeach
                    </swiper-container>
                </div>
            @else
                <div class="col-lg-6">
                    <div class="bg-danger p-4 rounded text-white  fw-bold   text-center">
                        Data Portofilio Masih Kosong <i class="fa fa-exclamation"></i>
                    </div>
                </div>
            @endif
        </div>
    </section>
    <section class="kontak mt-4 py-4 container mb-4">
        <h2 class="text-center mb-4"><span class="fw-bold bg-blue text-white p-2 rounded-4">Kontak</span></h2>
        <p class="text-center">Kami siap membantu Anda dengan segala pertanyaan dan informasi yang diperlukan. Jangan ragu untuk menghubungi kami kapan saja. Kami senang bisa menjadi bagian dari perjalanan Anda. Terima kasih.</p>
        <div class="container  p-4 mt-4 rounded-3">
            <div class="row justify-content-center">
                <div class="col-lg-6 mt-4">
                    <div class="card border-0 bg-transparent">
                        <p>
                            <a href="https://wa.me/{{$app->phone}}" class="link-social"><i class="fa fa-phone fa-2x"></i></a>
                            <span class="ms-2">
                                Whatsapps / Nomor Telepon
                            </span>
                        </p>
                        <p>
                            <a href="" class="link-social"><i class="fa fa-envelope fa-2x"></i></a>
                            <span class="ms-2">
                                E-Mail
                            </span>
                        </p>
                        <p>
                            <a href="" class="link-social"><i class="fa-brands fa-youtube   fa-2x"></i></a>
                            <span class="ms-2">
                                Youtube
                            </span>
                        </p>
                        <p>
                            <a href="" class="link-social"><i class="fa-brands fa-instagram   fa-2x"></i></a>
                            <span class="ms-2">
                                Instagram
                            </span>
                        </p>
                    </div>
                </div>
                <div class="col-lg-6 mt-4">
                  
                        <div class="form-group mb-3">
                            <label class="fw-bold mb-2" for="nama">Nama Lengkap</label>
                            <input type="text" placeholder="Nama Lengkap" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label class="fw-bold mb-2" for="email">Email</label>
                            <input type="text" placeholder="Email" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label class="fw-bold mb-2" for="deskripsi">Deskripsi</label>
                            <textarea placeholder="Deskripsi" name="" class="form-control" id="deskripsi" cols="50"
                                rows="50"></textarea>
                        </div>
                        <button onclick="return alertError()" class="btn bg-blue w-100 text-white fw-bold">simpan</button>
                </div>
            </div>
        </div>
    </section>
    <script src="{{ asset('template/vendor/swiper.min.js') }}"></script>
    <script src="{{ asset('template/assets/extensions/toastify-js/src/toastify.js') }}"></script>
    <script>
       const alertError = () => 
       {
           Toastify({
               text: 'Masih Belum Beropersi',
               duration: 3000,
               close: true,
               backgroundColor: "#D61355",
           }).showToast();
       }
    </script>
    <script>
        const moveToPage = (params) =>
        {
            document.location.href = params
        }
    </script>
@endsection
