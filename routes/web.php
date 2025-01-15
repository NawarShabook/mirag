<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\HeavyMachineController;
use App\Http\Controllers\WorkshopController;
use App\Http\Controllers\MaintenanceServiceController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\Auth\ChangePasswordController;
use App\Http\Controllers\Auth\UserProfileController;
use Illuminate\Support\Facades\Auth;

Route::get('/', [HomeController::class,'index']);
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])
->name('home');

Route::resource('posts', PostController::class);

Auth::routes([
    'reset' => false,
    'email' => false,
]);

Route::middleware(['auth'])->group(function () {
    Route::resource('orders', OrderController::class)
    ->except('show','create', 'edit','destroy');

    Route::put('/orders/cancel_order/{order_id}', [OrderController::class, 'cancel_order'])
    ->name('cancel_order');

    Route::get('/change-password', [ChangePasswordController::class, 'edit'])
    ->name('password.edit');

    Route::patch('/change-password', [ChangePasswordController::class, 'update'])
    ->name('password.update');

    Route::get('/profile', [UserProfileController::class, 'profile'])
    ->name('profile');

});

Route::middleware(['isAdmin'])->group(function () {

    Route::get('/admin-overview', [HomeController::class,'admin_overview'])
    ->name('admin-overview');


    Route::get('/orders/{order_type}/{status}', [OrderController::class,'show'])
    ->name('orders.show');

    Route::resource('heavy_machines', HeavyMachineController::class);
    Route::resource('workshops', WorkshopController::class);
    Route::resource('maintenance_services', MaintenanceServiceController::class);

    Route::get('/settings', [SettingController::class, 'index'])
    ->name('settings');

    Route::post('/settings/update', [SettingController::class, 'updateSetting'])
    ->name('settings.update');

});




