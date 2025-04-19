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
use App\Http\Controllers\MailController;

Route::get('/', [HomeController::class,'index']);
Route::get('/home', [HomeController::class, 'index'])
->name('home');

Route::get('/download', [HomeController::class, 'mobile_app_download'])
->name('mobile-app-download');

Route::get('/download-app', [HomeController::class, 'download_app'])
->name('download-app');

Route::resource('posts', PostController::class);

Auth::routes([
    'reset' => false,
    'email' => false,
]);

Route::post('/send-email', [MailController::class,'sendEmail'])->name('sendEmail');

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

    Route::get('/delete-account', [UserProfileController::class, 'show_delete_account'])
    ->name('delete-account.show');

    Route::post('/delete-account', [UserProfileController::class, 'delete_account'])
    ->name('delete-account.destroy');

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




