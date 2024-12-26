<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\HeavyMachineController;
use App\Http\Controllers\WorkshopController;

Route::get('/', [HomeController::class,'index']);


Route::resource('posts', PostController::class);
Route::resource('heavy_machines', HeavyMachineController::class);
Route::resource('workshops', WorkshopController::class);