@extends('frontend.layouts.master', ['judul' => 'PPS - Tentang Kami'])
@section('content')
<section class="content mb-4">
    <div class="container">
        <div class="row justify-content-center">
            
            <div class="col-lg-8">
                <div class="card border-0">
                    <div class="card-body">
                        <h4 class="fw-bold text-center">{{$app->title}}</h4>
                        <div class="post  fs-6 mt-3">
                            <h4>Visi & Misi</h4>
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
            <div class="col-lg-4">
                <div class="card border-0 bg-white">
                    <img src="{{ asset($app->icon) }}" class="card-img" alt="{{$app->title}}">
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
