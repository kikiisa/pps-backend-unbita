@extends('frontend.layouts.master')
@section('content')
    <section class="hero">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 text-center mt-4 py-4 content-hero">
                    <h2 class="fw-bold text-white title-website">
                       Semua {{$category}}
                    </h2>
                </div>
            </div>
        </div>
    </section>
    @if ($category == "agenda")
        <section class="agenda">
            <div class="container p-4 rounded-3">
                @if ($post->count() > 0)
                    @foreach ($post as $item)
                    <div class="col-lg-12 mb-4">
                        <div class="card border-0 bg-white shadow rounded">
                            <div class="row no-gutters">
                                <div class="col-md-4">
                                    <img src="{{asset($item->image)}}" class="card-img" alt="Agenda Image">
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <span class="mb-2 text-dark">
                                            <i class="fa fa-calendar"></i>
                                            <span class="ms-2">{{ \Carbon\Carbon::parse($item->created_at)->translatedFormat('d F Y') }}</span>
                                        </span>
                                        <h5 class="card-title">{{$item->title}}</h5>
                                        <div class="">
                                            {!! $item->content !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    @endforeach
                @else
                    <div class="row justify-content-center">
                        <div class="col-lg-6">
                            <div class="card border-0 bg-transparent">
                                <img src="{{ asset('frontend/img/404.png') }}" class="card-img" alt="" srcset="">
                                <div class="bg-danger p-4 text-white fw-bold text-center">Maaf, Data Tidak Di Temukan</div>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </section>
    @endif
    @if ($category == "pengumuman")
        <section class="agenda">
            <div class="container p-4 rounded-3">
                @if ($post->count() > 0)
                    @foreach ($post as $item)
                    <div class="col-lg-12 mb-4">
                        <div class="card border-0 bg-white shadow rounded">
                            <div class="row no-gutters">
                                <div class="col-md-4">
                                    <img src="{{ asset($item->image) }}"class="card-img" alt="Announcement Image">
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <h5 class="card-title">
                                            <i class="fas fa-bullhorn announcement-icon"></i>Pengumuman
                                        </h5>
                                        <span class="mb-2 text-dark">
                                            <i class="fa fa-calendar"></i>
                                            <span class="ms-2">{{ \Carbon\Carbon::parse($item->created_at)->translatedFormat('d F Y') }}</span>
                                        </span>
                                        <p class="card-text">
                                            <blockquote>
                                                {{$item->content}}
                                            </blockquote>
                                        </p>
                                       
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            
                    @endforeach
                @else
                    <div class="row justify-content-center">
                        <div class="col-lg-6">
                            <div class="card border-0 bg-transparent">
                                <img src="{{ asset('frontend/img/404.png') }}" class="card-img" alt="" srcset="">
                                <div class="bg-danger p-4 text-white fw-bold text-center">Maaf, Data Tidak Di Temukan</div>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </section>
    @endif
    <script src="{{ asset('template/vendor/swiper.min.js') }}"></script>    
@endsection
