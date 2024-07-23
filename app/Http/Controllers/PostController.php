<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\Pengaturan;
use App\Models\Post;
use App\Models\Prodi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Ramsey\Uuid\Uuid;
use Illuminate\Support\Str;

class PostController extends Controller
{
    private $path = 'uploads/post';
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Post::all();
        return response()->view('backend.post.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $image = Image::paginate(10);
        return response()->view('backend.post.create',compact('image'));
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
            'title' => 'required',
            'content' => 'required',
            'category' => 'required',
            'deskripsi' => 'required',
            'image' => 'required|file|mimes:png,webp,jpg,jpeg,gif|max:2048'
        ]);
        $file = $request->file('image');
        $name = $file->hashName();
        $file->move(public_path($this->path), $name);
        $send = Post::create([
            'uuid' => Uuid::uuid4()->toString(),
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'content' => $request->content,
            'image' => $this->path . '/' . $name,
            'deskripsi' => $request->deskripsi,
            'category' => $request->category,
            'views' => 0
        ]);
        if ($send) {
            return redirect()->route('post.index')->with('success', 'Post created successfully');
        } else {
            return redirect()->back()->with('error', 'Something went wrong');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request,$id)
    {
        
        $app = Pengaturan::all()->first();
        $data = Post::all()->where('slug', $id);
        $shareComponent = \Share::page(
            request()->url(),
        )
        ->facebook()
        ->twitter()
        ->linkedin()
        ->telegram()
        ->whatsapp();
        if($data->count() > 0)
        {
            $pst = $data->first();
            $userAggent = $request->header('User-Agent');
            $ip = $request->ip();
            $viewKey = 'post_' . $pst->id . '_viewed_' . md5($userAggent . $ip);
            if (!$request->session()->has($viewKey)) {
                // Jika belum ada, tambahkan view_count dan simpan key di session
                $pst->update([
                    'views' => +1
                ]);
                $request->session()->put($viewKey, true);
            }
            return response()->view('frontend.detail.index', ['data' => $data->first(), 'app' => $app,'shareComponent' => $shareComponent,'prodi' => Prodi::all()->take(3)]);
        }else{
            abort(404,'Maaf Data Postingan Tidak Di Temukan');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Post::all()->where('uuid', $id)->first();
        $image = Image::paginate(10);
        return response()->view('backend.post.edit', ['data' => $data,"image" => $image]);
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
        $data = Post::findOrFail($id);
        if($request->hasFile('image'))
        {   
            $request->validate([
                'title' => 'required',
                'content' => 'required',
                'category' => 'required',
                'deskripsi' => 'required',
                'image' => 'required|file|mimes:png,webp,jpg,jpeg,gif|max:2048'
            ]);
            File::delete($data->image);
            $file = $request->file("image");
            $nama = $file->hashName();
            $file->move(public_path($this->path),$nama);
            $data->update([
                'title' => $request->title,
                'slug' => Str::slug($request->title),
                'content' => $request->content,
                'image' => $this->path . '/' . $nama,
                'deskripsi' => $request->deskripsi,
                'category' => $request->category,
            ]);
            if($data)
            {
                return redirect()->route('post.index')->with('success','Data Berhasil');
            }else{
                return redirect()->route('post.index')->with('error','Data Gagal Disimpan');
            }
        }else{
            $request->validate([
                'title' => 'required',
                'content' => 'required',
                'category' => 'required',
                'deskripsi' => 'required',
            ]);
            $data->update([
                'title' => $request->title,
                'slug' => Str::slug($request->title),
                'content' => $request->content,
                'deskripsi' => $request->deskripsi,
                'category' => $request->category,
            ]);
            if($data)
            {
                return redirect()->route('post.index')->with('success','Data Berhasil');
            }else{
                return redirect()->route('post.index')->with('error','Data Gagal Disimpan');
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
        $data = Post::find($id);
        File::delete($data->image);
        $data->delete();
        return redirect()->route('post.index')->with('success', 'Post deleted successfully');
    }
}
