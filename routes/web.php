<?php

use App\Http\Controllers\Ajax\AjaxEventController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\GoogleController;
use App\Http\Controllers\MediaController;
use App\Http\Controllers\SettingController;
use App\Http\Middleware\CheckLoginMiddleware;
use App\Http\Middleware\CheckLogoutMiddleware;
use App\Http\Controllers\EventController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::group([
    'middleware' => CheckLogoutMiddleware::class,
], function () {
    Route::get('login', [AuthController::class, 'login'])->name('login');
    Route::post('login', [AuthController::class, 'processLogin'])->name('processLogin');

    Route::get('register', [AuthController::class, 'register'])->name('register');
    Route::post('register', [AuthController::class, 'processRegister'])->name('processRegister');

    Route::get('forgot-password', [AuthController::class, 'forgotPassword'])->name('forgotPassword');
    Route::post('forgot-password', [AuthController::class, 'processForgotPassword'])->name('processForgotPassword');

    Route::get('reset-password', [AuthController::class, 'resetPassword'])->name('resetPassword');
    Route::post('reset-password', [AuthController::class, 'processResetPassword'])->name('processResetPassword');
});

Route::group([
     'middleware' => CheckLoginMiddleware::class,
], function () {
    Route::get('logout', [AuthController::class, 'logout'])->name('logout');

    Route::get('/', [DashboardController::class, '__invoke'])->name('index');

//    Event
    Route::prefix('events')->name('events.')->group(function () {
        Route::get('analytics', [EventController::class, 'analytics'])->name('analytics');
        Route::get('attendant-events', [EventController::class, 'scanQrCode'])->name('scanQrCode');
        Route::get('create', [EventController::class, 'create'])->name('create');
        Route::get('index', [EventController::class, 'index'])->name('index');
        Route::post('store', [EventController::class, 'store'])->name('store');
        Route::get('edit/{event}', [EventController::class, 'edit'])->name('edit');
        Route::post('update/{event}', [EventController::class, 'update'])->name('update');
        Route::delete('delete/{event}', [EventController::class, 'destroy'])->name('destroy');
        Route::get('google-sheet-import', [GoogleController::class, '__invoke'])->name('google.import');
    });


    Route::resource('media', MediaController::class);

//  Setting
    Route::get('setting', [SettingController::class, 'index'])->name('setting.index');
    Route::post('setting', [SettingController::class, 'store'])->name('setting.store');

    Route::prefix('ajax')->name('ajax.')->group(function () {
        Route::get('events', [AjaxEventController::class , 'index'])->name('events.index');
        Route::delete('delete/{event}', [AjaxEventController::class , 'destroy'])->name('events.destroy');
    });
});
