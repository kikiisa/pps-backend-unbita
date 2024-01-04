<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\Post;
use App\Models\Slider;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $CountPost = Post::all()->count();
        $CountSlider = Slider::all()->count();
        $album = Image::all()->count();
        $popularPost = Post::orderBy('views', 'desc')->take(5)->get();
        return response()->view('backend.dashboard.index',compact('CountPost','CountSlider','album','popularPost'));
    }
}
