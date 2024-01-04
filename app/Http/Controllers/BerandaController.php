<?php

namespace App\Http\Controllers;

use App\Models\Pengaturan;
use App\Models\Post;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

class BerandaController extends Controller
{

    public function index(Request $request)
    {
      
        $app = Pengaturan::all()->first();
        if ($request->has('q')) {
            $query = $request->q;
            $post = Post::where('category', 'post')
                        ->where(function($q) use ($query) {
                            $q->where('title', 'LIKE', '%' . $query . '%')
                              ->orWhere('content', 'LIKE', '%' . $query . '%');
                        })
                        ->paginate(10);
    
            return response()->view('frontend.artikel.index', compact('app', 'post'));
        }
        $post = Post::where('category','post')->paginate(3);
        $fakultas = Post::latest()->where('category','fakultas');
        $slider = Slider::all()->where('status','active');
        return response()->view('frontend.home.index',compact('app','post','fakultas','slider'));
    }

    public function artikel(Request $request)
    {
        $app = Pengaturan::all()->first();
        if ($request->has('q')) {
            $query = $request->q;
            $post = Post::where('category', 'post')
                        ->where(function($q) use ($query) {
                            $q->where('title', 'LIKE', '%' . $query . '%')
                              ->orWhere('content', 'LIKE', '%' . $query . '%');
                        })
                        ->paginate(10);
    
            return response()->view('frontend.artikel.index', compact('app', 'post'));
        }else{            
            $post = Post::where('category','post')->paginate(10);
            return response()->view('frontend.artikel.index',compact('app','post'));
        }
    }
}
