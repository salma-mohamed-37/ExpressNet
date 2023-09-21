<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\PostsController;
use App\Mail\LikeNotification;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('new.index');
});

Route::get('/dashboard', [PostController::class , 'explore'])
->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/profilePosts',[PostController::class , 'viewAccountPosts'])->middleware(['auth', 'verified'])->name('profilePosts');;

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

//Route::GET("/explore",[PostController::class , 'explore'])->middleware(['auth', 'verified'])->name('dashboard');;

Route::POST('/add', [PostController::class,'store'])->middleware(['auth', 'verified']);
Route::GET('/delete/{id}' ,[PostController::class,'destroy'])->middleware(['auth', 'verified']);

Route::GET("/like/{id}",[LikeController::class , 'store'])->middleware(['auth', 'verified']);
Route::GET("/likes/{id}",[LikeController::class , 'show'])->middleware(['auth', 'verified']);

Route::GET("comment/{id}/{comment}" , [CommentController::class , 'store'])->middleware(['auth', 'verified']);
Route::GET("/comments/{id}",[CommentController::class , 'show'])->middleware(['auth', 'verified']);
