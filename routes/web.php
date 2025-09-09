<?php

use App\Models\Post;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;

Route::get('/auth', function() {
    // Redirect to login/register if not authenticated
    return view('auth'); // pointing to auth.blade.php
});

Route::get('/home', function() {
        // $allpost = Post::all();
    $allpost = auth()->user()->getPost()->latest()->get();
    return view('home', ['postingss' => $allpost]);
});

// Auth routes
Route::post('/register', [UserController::class,'registration']);
Route::post('/login', [UserController::class,'login']);
Route::post('/logout', [UserController::class,'logout']);

// Post routes
Route::post('/create-post', [PostController::class,'createPost']);
Route::get('/edit-post/{post}', [PostController::class,'showEdit']);
Route::put('/edit-post/{post}', [PostController::class,'updating']);
Route::delete('/delete-post/{post}', [PostController::class,'deleting']);