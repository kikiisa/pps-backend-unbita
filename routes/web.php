<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BerandaController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FileManagerController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\PengaturanController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProdiController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SliderController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/',[BerandaController::class,'index'])->name('beranda');
Route::get('/login',[AuthController::class,'index'])->name('auth');
Route::post('/login',[AuthController::class,'store'])->name('auth.store');
Route::get('/logout',[AuthController::class,'logout'])->name('auth.logout');


Route::get("/search",[BerandaController::class,'search'])->name('search.post');
Route::get('/post/{slug}',[PostController::class,'show'])->name('post.detail');
Route::get('/tentang-kami',[PengaturanController::class,'about'])->name('about');
Route::get('/artikel',[BerandaController::class,'artikel'])->name('artikel');
Route::get("/informasi/{slug}",[BerandaController::class,"informasi"])->name("information");
Route::get("download-file/{id}",[FileManagerController::class,"download"])->name("file-manager.download");


Route::prefix('account')->group(function(){
    Route::middleware('auth')->group(function(){
        Route::get('dashboard',[DashboardController::class,'index'])->name('dashboard');
        Route::resource('post',PostController::class);
        Route::resource('profile',ProfileController::class);
        Route::resource('pengaturan',PengaturanController::class);
        Route::resource('slider',SliderController::class);
        Route::resource('image',ImageController::class);
        Route::resource("management-prodi",ProdiController::class);
        Route::resource("file-manager",FileManagerController::class);
    });
});
