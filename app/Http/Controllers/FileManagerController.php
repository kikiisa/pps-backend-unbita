<?php

namespace App\Http\Controllers;

use App\Models\FileManager;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Ramsey\Uuid\Uuid;

class FileManagerController extends Controller
{
    private $path = "uploads/files/";
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->view("backend.file.index",[
            "data" => FileManager::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            "title" => "required",
            "deskripsi" => "required",
            "file" => "required|mimes:docx,pdf,csv,xlsx,ppt,pptx"
        ],[
            "file.mimes" => "File harus berupa docx,pdf,csv,xlsx,ppt,pptx",
            "title.required" => "Judul File tidak boleh kosong",
            "deskripsi.required" => "Deskripsi File tidak boleh kosong"
        ]);
        $file = $request->file('file');
        $filename = $file->hashName();
        $file->move($this->path, $filename);
        
        $data = FileManager::create([
            "uuid" => Uuid::uuid4()->toString(),
            "title" => $request->title,
            "deskripsi" => $request->deskripsi,
            "file_path" => $this->path . $filename
        ]);        
        if($data)
        {
            return redirect()->route("file-manager.index")->with("success", "File Berhasil di simpan");
        }else{
            return redirect()->route("file-manager.index")->with("error", "File Gagal di simpan");
        }

    }

    public function download($id)
    {
        $file = FileManager::where('uuid', $id)->firstOrFail();
        if(!$file){
            return redirect()->route("file-manager.index")->with("error", "File tidak ditemukan");
        }
        return response()->download($file->file_path);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\FileManager  $fileManager
     * @return \Illuminate\Http\Response
     */
    public function show(FileManager $fileManager)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\FileManager  $fileManager
     * @return \Illuminate\Http\Response
     */
    public function edit(FileManager $fileManager)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\FileManager  $fileManager
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, FileManager $fileManager)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\FileManager  $fileManager
     * @return \Illuminate\Http\Response
     */
    public function destroy(FileManager $fileManager)
    {
        $data = FileManager::findOrFail($fileManager->id);
        File::delete($data->file_path);
        $data->delete();
        return redirect()->route("file-manager.index")->with("success", "File Berhasil di hapus");
    }
}
