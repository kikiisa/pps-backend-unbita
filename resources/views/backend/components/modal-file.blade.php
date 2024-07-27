<div class="modal fade" id="file" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Daftar File</h5>
                
            </div>
            <div class="modal-body">
                <table class="table"  id="table1">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nama Document</th>
                            <th scope="col">Tipe File</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($files as $d)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $d->title }}</td>
                                <td>
                                    @if (substr(strrchr($d->file_path, "."), 1) == "pdf")
                                        PDF
                                        <i class="bi bi-file-pdf-fill text-danger"></i>
                                    @endif
                                    @if (substr(strrchr($d->file_path, "."), 1) == "docx")
                                        DOCX
                                        <i class="bi bi-file-word-fill text-primary"></i>
                                    @endif
                                    @if (substr(strrchr($d->file_path, "."), 1) == "xlsx")
                                        EXCEL
                                        <i class="bi bi-file-excel-fill text-success"></i>
                                    @endif
                                    @if (substr(strrchr($d->file_path, "."), 1) == "pptx")
                                        POWERPOINT
                                        <i class="bi bi-file-powerpoint-fill text-warning"></i>
                                    @endif
                                    
                                </td>
                                <td>
                                  
                                        <a href="{{Route('file-manager.download',$d->uuid)}}" class="badge bg-success border-0">
                                            <span class="bi bi-download"></span>
                                        </a>
                                        <button onclick="return copyToClipboardFile('{{asset($d->file_path)}}')" class="badge bg-danger border-0"><i class="bi bi-clipboard"></i></button>
                                </td>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<script>
    const  copyToClipboardFile = (text) => {
        navigator.clipboard.writeText(text);
        Toastify({
            text: "File Berhasil Di Salin, Selanjutnya Url Tersebut Di Paste Pada Text Editor",
            duration: 3000,
            close: true,
            backgroundColor: "#19C37D",
        }).showToast();
    };
</script>