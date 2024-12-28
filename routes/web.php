<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\HeavyMachineController;
use App\Http\Controllers\WorkshopController;
use App\Http\Controllers\MaintenanceServiceController;
use App\Http\Controllers\SettingController;

Route::get('/', [HomeController::class,'index']);


Route::resource('posts', PostController::class);
Route::resource('heavy_machines', HeavyMachineController::class);
Route::resource('workshops', WorkshopController::class);
Route::resource('maintenance_services', MaintenanceServiceController::class);

Route::get('/settings', [SettingController::class, 'index'])->name('settings');
Route::post('/settings/update', [SettingController::class, 'updateSetting'])->name('settings.update');
