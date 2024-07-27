<div class="modal fade" id="add" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Daftar Gambar</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row gallery" data-bs-toggle="modal" data-bs-target="#galleryModal">
                    @foreach ($image as $img)
                    <div class="col-6 col-sm-6 col-lg-4 mt-2 mt-md-0 mb-md-0 mb-2">
                        <div class="card">
                            <a href="#">
                                <img class="w-100 active" src="{{asset($img->image)}}"  data-bs-target="#Gallerycarousel" data-bs-slide-to="0">
                            </a>
                                <a href="javascript:void(0)" class="w-100 btn btn-primary mt-1" onclick="return copyToClipboard('{{asset($img->image)}}')">Salin Gambar<i class="bi bi-clipboard ms-2"></i></a>
                          
                        </div>
                    </div>
                    @endforeach
                </div>
                {{$image->links()}}
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
