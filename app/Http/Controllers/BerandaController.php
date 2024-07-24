<?php

namespace App\Http\Controllers;

use App\Models\Pengaturan;
use App\Models\Post;
use App\Models\Prodi;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

class BerandaController extends Controller
{

    public function index(Request $request)
    {
      
        $app = Pengaturan::all()->first();
        $prodi = Prodi::all()->take(3);
        if ($request->has('q')) {
            $query = $request->q;
            $post = Post::where('category', 'post')
                        ->where(function($q) use ($query) {
                            $q->where('title', 'LIKE', '%' . $query . '%')
                              ->orWhere('content', 'LIKE', '%' . $query . '%');
                        })
                        ->paginate(10);
    
            return response()->view('frontend.artikel.index', compact('app', 'post','prodi'));
        }
        $post = Post::where('category','post')->paginate(3);
        $fakultas = Post::latest()->where('category','fakultas');
        $slider = Slider::all()->where('status','active');

        return response()->view('frontend.home.index',compact('app','post','fakultas','slider','prodi'));
    }

    public function artikel(Request $request)
    {
        $app = Pengaturan::all()->first();
        $prodi = Prodi::all()->take(3);
        
        if ($request->has('q')) {
            $query = $request->q;
            $post = Post::where('category', 'post')
                        ->where(function($q) use ($query) {
                            $q->where('title', 'LIKE', '%' . $query . '%')
                              ->orWhere('content', 'LIKE', '%' . $query . '%');
                        })
                        ->paginate(10);
    
            return response()->view('frontend.artikel.index', compact('app', 'post','prodi'));
        }else{            
            $post = Post::where('category','post')->paginate(10);
            return response()->view('frontend.artikel.index',compact('app','post','prodi'));
        }
    }

    public function informasi($slug)
    {
        $prodi = Prodi::all()->where("slug",$slug);
        if($prodi->isEmpty())
        {
            return abort(404);
        }
        $app = Pengaturan::all()->first();
        return response()->view('frontend.prodi.index',[
           "prodi" => $prodi,
           "app" => $app,
           "information" => $prodi->first() 
        ]);
    }
}
