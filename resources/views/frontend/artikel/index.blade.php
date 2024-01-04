@extends('frontend.layouts.master', ['judul' => 'PPS - Artikel'])
@section('content')
    <section class="artikel" style="margin-top: 120px">
        <div class="container p-4 rounded-3">
            @if ($post->count() > 0)
                <div class="row justify-content-start">
                    @if (request()->q)
                        <h4 class="text-start">Hasil Pencarian : <strong>{{ request()->q }}</strong></h4>
                    @endif
                    <h4></h4>
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
                    {{$post->links()}}
                </div>
            @else
                <div class="row justify-content-center">
                    <div class="col-lg-6">
                        <div class="card border-0 bg-transparent">
                            <img src="{{asset('frontend/img/404.png')}}" class="card-img" alt="" srcset="">
                            <div class="bg-danger p-4 text-white fw-bold text-center">Maaf, Data Tidak Di Temukan</div>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </section>

    <script src="{{ asset('template/vendor/swiper.min.js') }}"></script>
    <script>
        const moveToPage = (params) =>
        {
            document.location.href = params
        }
    </script>
@endsection
