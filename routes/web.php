<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\HeavyMachineController;

Route::get('/', [HomeController::class,'index']);


Route::resource('posts', PostController::class);
Route::resource('heavy_machines', HeavyMachineController::class);