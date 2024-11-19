<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UPostController;

Route::get('/', function () {
    return view('home');
});

Route::post('/register', [UserController::class, 'register']);
Route::post('/logout', [UserController::class, 'logout']); 
Route::post('/login', [UserController::class, 'login']);


Route::post('/create-post', [UPostController::class, 'createPost']);