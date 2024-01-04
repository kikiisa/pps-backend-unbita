<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function index()
    {
        return response()->view('backend.auth.index');
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);   
        
        $credential = $request->only('email', 'password');
        if(auth()->attempt($credential)){
            $request->session()->regenerate();
            return redirect()->route('dashboard');
        }
        return redirect()->back()->withErrors(['email' => 'The provided credentials do not match our records.']);
    }
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/')->with('success','Berhasil Logout');
    }
}