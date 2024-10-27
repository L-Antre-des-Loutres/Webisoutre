<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\MinecraftController;
use App\Http\Controllers\ServeurController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/exemple', [IndexController::class, 'exempleView']);

// Minecraft
Route::get('/minecraft', [MinecraftController::class, 'index']);
