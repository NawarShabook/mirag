<?php

use App\Http\Controllers\API\HomeController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\PostController;
use App\Http\Controllers\API\OrderController;
Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');

Route::get('/posts', [PostController::class, 'index']);
Route::get('/posts/{post}', [PostController::class, 'show']);


Route::get('/global_data', [HomeController::class, 'global_data']);

Route::get('/maintenance_services', [HomeController::class, 'maintenance_services_index']);
Route::get('/workshops', [HomeController::class, 'workshops_index']);
Route::get('/heavy_machines', [HomeController::class, 'heavy_machines_index']);

Route::get('/user_orders',[OrderController::class,'user_orders'])->middleware('auth:sanctum');
Route::post('/create_order',[OrderController::class,'store'])->middleware('auth:sanctum');
// Route::apiResource('posts', PostController::class)
// ->except(['create', 'store','edit', 'update', 'destroy',]);
