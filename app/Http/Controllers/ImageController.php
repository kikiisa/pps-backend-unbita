<?php

namespace App\Http\Controllers;

use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Ramsey\Uuid\Uuid;

class ImageController extends Controller
{
    private $path = 'uploads/image';
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Image::paginate(10);
        return response()->view('backend.image.index', ['data' => $data]);
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
            'judul' => 'required',
            'deskripsi' => 'required',
            'gambar' => 'required|mimes:jpeg,jpg,png,webp|max:2048',
            'category' => 'required',
        ]);
        $gambar = $request->file('gambar');
        $name = $gambar->hashName();
        $gambar->move($this->path,$name);
        $data = Image::create([
            'uuid' => Uuid::uuid4()->toString(), // Pastikan untuk mengimpor dan menggunakan Str jika belum
            'judul' => $request->judul, // Variabel $judul berisi data judul yang ingin disimpan
            'deskripsi' => $request->deskripsi, // Variabel $deskripsi berisi data deskripsi
            'image' => $this->path . '/' . $name, // Path ke lokasi gambar
            'category' => $request->category, // Variabel $category berisi data kategori
        ]);
        if($data)
        {
            return redirect()->route('image.index')->with('success','Data Berhasil');
        }else{
            return redirect()->route('image.index')->with('error','Data Gagal Disimpan');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Image::findOrFail($id);
        File::delete($data->image);
        $data->delete();
        if($data)
        {
            return redirect()->route('image.index')->with('success','Data Berhasil Di Hapus');
        }else{
            return redirect()->route('image.index')->with('error','Data Gagal Di Hapus');
        }
    }
}
