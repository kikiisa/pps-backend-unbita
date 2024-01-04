@extends('backend.layouts.master',['judul' => 'Dashboard'])
@section('content')
    <script src="{{ asset('template/assets/extensions/tinymce/tinymce.min.js')}}"></script>
    <section class="row">
        <div class="col-12 col-lg-12">
            <div class="card ">
                <div class="card-header">
                    <h4>Selamat Datang, <strong>{{Auth::user()->name}}</strong></h4>
                    <hr>
                </div>
            </div>
            <div class="row">
                <div class="col-6 col-lg-3 col-md-6">
                    <div class="card">
                        <div class="card-body px-4 py-4-5">
                            <div class="row">
                                <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                    <div class="stats-icon green">
                                        <i>
                                            <span class="iconly-boldBookmark mt-1"></span>
                                        </i>
                                    </div>
                                </div>
                                <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                    <h6 class="text-muted font-semibold mt-3">Postingan</h6>
                                    <h6 class="font-extrabold mb-0">{{$CountPost}}</h6>
                                </div>
                            </div> 
                        </div>
                    </div>
                </div>
                <div class="col-6 col-lg-3 col-md-6">
                    <div class="card">
                        <div class="card-body px-4 py-4-5">
                            <div class="row">
                                <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                    <div class="stats-icon purple">
                                        <i>
                                            <span class="bi bi-image mt-1"></span>
                                        </i>
                                    </div>
                                </div>
                                <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                    <h6 class="text-muted font-semibold mt-3">Slider</h6>
                                    <h6 class="font-extrabold mb-0">{{$CountSlider}}</h6>
                                </div>
                            </div> 
                        </div>
                    </div>
                </div>
                <div class="col-6 col-lg-3 col-md-6">
                    <div class="card">
                        <div class="card-body px-4 py-4-5">
                            <div class="row">
                                <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                    <div class="stats-icon red">
                                        <i>
                                            <span class="bi bi-image mt-1"></span>
                                        </i>
                                    </div>
                                </div>
                                <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                    <h6 class="text-muted font-semibold mt-3">Total Gambar</h6>
                                    <h6 class="font-extrabold mb-0">{{$album}}</h6>
                                </div>
                            </div> 
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8">
                    <h4>Top 5 Artikel </h4>
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                      <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Post</th>
                                        <th scope="col">Kategori</th>
                                        <th scope="col">Views</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($popularPost as $item)
                                            <tr>
                                            <th scope="row">{{$loop->index+=1}}</th>
                                            <td>{{$item->title}}</td>
                                            <td>
                                                @if ($item->category == 'fakultas')
                                                    <span class="badge bg-info">Informasi Fakultas</span>
                                                @else
                                                    <span class="badge bg-primary">Post News</span>
                                                @endif
                                            </td>
                                            <td>
                                                {{$item->views}}
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
    <script>
        document.addEventListener("DOMContentLoaded", () => {
            const themeOptions = document.body.classList.contains("theme-dark") ? {
                skin: "oxide-dark",
                content_css: "dark",
            } : {
                skin: "oxide",
                content_css: "default",
            }

            tinymce.init({
                selector: "#accement",
                ...themeOptions
            })
            tinymce.init({
                selector: "#dark",
                toolbar: "undo redo styleselect bold italic alignleft aligncenter alignright bullist numlist outdent indent code",
                plugins: "code",
                ...themeOptions,
            })
        })
    </script>
@endsection
