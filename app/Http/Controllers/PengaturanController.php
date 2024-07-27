<?php

namespace App\Http\Controllers;

use App\Models\Pengaturan;
use App\Models\Prodi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class PengaturanController extends Controller
{
    private $path = 'uploads/settings';
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Pengaturan::all()->first();
        return response()->view('backend.pengaturan.index', compact('data'));
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

    public function about()
    {
        $app = Pengaturan::all()->first();
        $prodi = Prodi::all();
        return response()->view('frontend.about.index', compact('app', 'prodi'));
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
        $data = Pengaturan::all()->first();
        if ($request->hasFile("icon")) {
            $request->validate([
                'icon' => 'required|file|mimes:png,webp,jpg,jpeg,gif|max:2048',
                'title' => 'required',
                'deskripsi' => 'required',
                'phone' => 'required',
                'visi_misi' => 'required',
                'about' => 'required',
                'total_mahasiswa' => 'required',
                'total_pengajar' => 'required',
                'total_lulusan' => 'required',
            ]);
            File::delete($data->icon);
            $file = $request->file("icon");
            $name = $file->hashName();
            $file->move(public_path($this->path), $name);
            $data->update([
                'title' => $request->title,
                'deskripsi' => $request->deskripsi,
                'phone' => $request->phone,
                'visi_misi' => $request->visi_misi,
                'about' => $request->about,
                'total_mahasiswa' => $request->total_mahasiswa,
                'total_pengajar' => $request->total_pengajar,
                'total_lulusan' => $request->total_lulusan,
            ]);
            if ($data) {
                return redirect()->route('pengaturan.index')->with('success', 'Pengaturan updated successfully');
            } else {
                
                return redirect()->back()->with('error', 'Something went wrong');
            }
        } else {
            $request->validate([
                'title' => 'required',
                'deskripsi' => 'required',
                'phone' => 'required',
                'visi_misi' => 'required',
                'about' => 'required',
                'total_mahasiswa' => 'required',
                'total_pengajar' => 'required',
                'total_lulusan' => 'required',
               

            ]);
            $data->update([
                'title' => $request->title,
                'deskripsi' => $request->deskripsi,
                'phone' => $request->phone,
                'visi_misi' => $request->visi_misi,
                'about' => $request->about,
                'total_mahasiswa' => $request->total_mahasiswa,
                'total_pengajar' => $request->total_pengajar,
                'total_lulusan' => $request->total_lulusan,
            ]);
            if ($data) {
                return redirect()->route('pengaturan.index')->with('success', 'Pengaturan updated successfully');
            } else {
                return redirect()->back()->with('error', 'Something went wrong');
            }
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
        //
    }
}
