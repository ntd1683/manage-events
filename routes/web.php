<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\GoogleController;
use App\Http\Middleware\CheckLoginMiddleware;
use App\Http\Middleware\CheckLogoutMiddleware;
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

Route::prefix('google')->name('google.')->group(function () {
    Route::get('', [GoogleController::class, 'index'])->name('import');
});

Route::group([
     'middleware' => CheckLoginMiddleware::class,
], function () {
    Route::get('logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/', function () {
        return view('index');
    })->name('index');
});
