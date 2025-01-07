<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\HeavyMachineController;
use App\Http\Controllers\WorkshopController;
use App\Http\Controllers\MaintenanceServiceController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\SettingController;
use Illuminate\Support\Facades\Auth;

Route::get('/', [HomeController::class,'index']);
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('posts', PostController::class);
Route::resource('orders', OrderController::class)->except('show','create', 'edit','destroy')->middleware('auth');

Route::put('/orders/cancel_order/{order_id}', [OrderController::class, 'cancel_order'])
    ->name('cancel_order')
    ->middleware('auth');

Route::middleware(['isAdmin'])->group(function () {
    Route::get('/orders/{order_type}/{status}', [OrderController::class,'show'])->name('orders.show');

    Route::resource('heavy_machines', HeavyMachineController::class);
    Route::resource('workshops', WorkshopController::class);
    Route::resource('maintenance_services', MaintenanceServiceController::class);

    Route::get('/settings', [SettingController::class, 'index'])->name('settings');
    Route::post('/settings/update', [SettingController::class, 'updateSetting'])->name('settings.update');

});

Auth::routes([
    'reset' => false,
    'email' => false,
]);

Route::get('/profile', [App\Http\Controllers\HomeController::class, 'profile'])->name('profile')->middleware('auth');

