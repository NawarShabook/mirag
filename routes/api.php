<?php

use App\Http\Controllers\API\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\PostController;
use App\Http\Controllers\API\OrderController;


Route::middleware(['auth:sanctum'])->group(function () {

    // Route::get('/user', function (Request $request) {
    //     return $request->user();
    // });

    Route::patch('/change-password', [AuthController::class, 'change_password']);
    Route::get('/user_profile',[AuthController::class,'user_profile']);

    Route::get('/user_orders',[OrderController::class,'user_orders']);
    Route::post('/create_order',[OrderController::class,'store']);
    Route::patch('/cancel_order/{order_id}',[OrderController::class,'cancel_order']);
});


// regitser, login
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

// posts
Route::get('/posts', [PostController::class, 'index']);
Route::get('/posts/{post}', [PostController::class, 'show']);

// data and settings
Route::get('/global_data', [HomeController::class, 'global_data']);
Route::get('/system_info', [HomeController::class, 'system_settings']);

// orders types
Route::get('/maintenance_services', [HomeController::class, 'maintenance_services_index']);
Route::get('/workshops', [HomeController::class, 'workshops_index']);
Route::get('/heavy_machines', [HomeController::class, 'heavy_machines_index']);



// Route::apiResource('posts', PostController::class)
// ->except(['create', 'store','edit', 'update', 'destroy',]);
