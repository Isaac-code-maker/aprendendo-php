<?php

use App\Models\Upost;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UPostController;

Route::get('/', function () {
    $posts = [];
    if(auth()->check()){

    $posts = auth()->user()->usersCoolPost()->latest()->get();

    }

    return view('home', ['posts' => $posts]);
});

Route::post('/register', [UserController::class, 'register']);
Route::post('/logout', [UserController::class, 'logout']); 
Route::post('/login', [UserController::class, 'login']);


Route::post('/create-post', [UPostController::class, 'createPost']);

Route::get('/edit-post/{post}', [UPostController::class, 'showEditScreen']);
Route::put('/edit-post/{post}', [UPostController::class, 'actuallyUpdatePost']);
Route::delete('/delete-post/{post}', [UPostController::class, 'deletePost']);

