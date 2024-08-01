<?php

namespace App\Http\Controllers;

use App\Models\FileManager;
use Illuminate\Support\Str;
use App\Models\Image;
use App\Models\Prodi;
use Illuminate\Http\Request;

class ProdiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->view("backend.prodi.index",[
            "data" => Prodi::all()
        ]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return response()->view("backend.prodi.create",[
            "image" => Image::paginate(10),
            "files" => FileManager::all(),
        ]);
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
            'name' => 'required|string|max:255',
            'logo' => 'required|string|max:255',
            'menu' => 'required|string|max:255',
            'visi' => 'required|string|max:255',
            'misi' => 'required|string|max:255',
            'gambar' => 'required|string|max:255',
            'struktur' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'dokumentPMU' => 'required|string|max:255',
            'dokumentKKU' => 'required|string|max:255',
            'dokumentAKR' => 'required|string|max:255',
        ],[
            'required' => ':attribute harus diisi',
            'string' => ':attribute harus berupa string',
            'max' => ':attribute maksimal :max karakter',
        ]);    
        $data = Prodi::create([
            
            'name' => $request->name,
            'logo' => $request->logo,
            'slug' => Str::slug($request->name),
            'menu' => $request->menu,
            'visi' => $request->visi,
            'misi' => $request->misi,
            'gambar' => $request->gambar,
            'struktur' => $request->struktur,
            'deskripsi' => $request->deskripsi,
            'dokumentPMU' => $request->dokumentPMU,
            'dokumentKKU' => $request->dokumentKKU,
            'dokumentAKR' => $request->dokumentAKR,
        ]);
        if($data)
        {
            return redirect()->route("management-prodi.index")->with("success","Data Berhasil");
        }else{
            return redirect()->back()->with("error","Data Gagal Disimpan");
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
        $data = Prodi::find($id);
        return response()->view("backend.prodi.edit",[
            "prodi" => $data,
            "files" => FileManager::all(),
            "image"  => Image::paginate(10)
        ]);
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
        $data = Prodi::find($id);
        $data->update([
            'name' => $request->name,
            'logo' => $request->logo,
            'slug' => Str::slug($request->name),
            'menu' => $request->menu,
            'visi' => $request->visi,
            'misi' => $request->misi,
            'gambar' => $request->gambar,
            'struktur' => $request->struktur,
            'deskripsi' => $request->deskripsi,
            'dokumentPMU' => $request->dokumentPMU,
            'dokumentKKU' => $request->dokumentKKU,
            'dokumentAKR' => $request->dokumentAKR,
        ]);
        if($data)
        {
            return redirect()->route("management-prodi.index")->with("success","Data Berhasil");
        }else{
            return redirect()->route("management-prodi.index")->with("error","Data Gagal");
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Prodi::findOrFail($id);
        $data->delete();
        if($data)
        {
            return redirect()->route("management-prodi.index")->with("success","Data Berhasil");
        }else{
            return redirect()->route("management-prodi.index")->with("error","Data Gagal");
        }
    }
}
