@extends('frontend.layouts.master', ['judul' => 'Tentang Kami'])
@section('content')
<section class="hero">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 text-center mt-4 content-hero">
                <h2 class="fw-bold text-white title-website">
                    Tentang Fakultas
                </h2>
            </div>
        </div>
    </div>
</section>
<section class="bg-dark text-white visi">
    <div class="container p-2">
        <h5 class="text-white content-hero text-center mb-2">Visi : {{ $app->visi }}</h5>
    </div>
</section>
<section class="mt-4">
    <div class="container">
        <div class="row justify-content-center">   
            <div class="col-lg-12">
                <div class="card border-0">
                    <div class="card-body">
                        <h4 class="fw-bold text-center">{{$app->title}}</h4>
                        <div class="post  fs-6 mt-3">
                            <h4>Misi</h4>
                            <hr>
                            {!! $app->visi_misi !!}
                        </div>
                        <div class="post  fs-6 mt-3">
                            <h4>Tentang {{$app->title}}</h4>
                            <hr>
                            {!! $app->about !!}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-12 mt-3">
                <div class="card border-0 bg-white">
                    <img src="{{ asset($app->icon) }}" class="card-img" alt="{{$app->title}}">
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
