<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function uploadFile(Request $request)
    {
        if($request->hasFile('file'))
        {
            $request->validate([
                'file' => 'required|file|mimes:png,webp,jpg,jpeg,gif|max:2048'
            ]);
            $file = $request->file('file');
            $name = $file->hashName();
            $file->move(public_path('uploads/post'), $name);
            return response()->json(['success' => true]);
        }else{
            return response()->json(['success' => false]);
        }
    }
}
