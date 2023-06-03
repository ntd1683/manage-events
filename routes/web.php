<?php

use App\Http\Controllers\Ajax\AjaxEventController;
use App\Http\Controllers\Ajax\AjaxGoogleController;
use App\Http\Controllers\Ajax\AjaxProfileController;
use App\Http\Controllers\Ajax\AjaxScanQrCodeController;
use App\Http\Controllers\Ajax\AjaxUserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\GoogleController;
use App\Http\Controllers\ManageEventController;
use App\Http\Controllers\MediaController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ScanQrcodeController;
use App\Http\Controllers\SettingController;
use App\Http\Middleware\CheckLoginMiddleware;
use App\Http\Middleware\CheckLogoutMiddleware;
use App\Http\Controllers\EventController;
use App\Http\Middleware\CheckVipMemberMiddleware;
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
    Route::get('verify-email', [AuthController::class, 'verifyEmail'])->name('verifyEmail');

    Route::get('/', [DashboardController::class, '__invoke'])->name('index');

//    Event
    Route::prefix('events')->name('events.')->group(function () {
        Route::get('analytics', [EventController::class, 'analytics'])->name('analytics');
        Route::get('scan-qrcode', [ScanQrcodeController::class, '__invoke'])->name('scanQrCode');
        Route::get('create', [EventController::class, 'create'])->name('create');
        Route::get('/', [EventController::class, 'index'])->name('index');
        Route::get('show/{event}', [EventController::class, 'show'])->name('show');
        Route::post('store', [EventController::class, 'store'])->name('store');
        Route::get('edit/{event}', [EventController::class, 'edit'])->name('edit');
        Route::post('update/{event}', [EventController::class, 'update'])->name('update');
        Route::delete('delete/{event}', [EventController::class, 'destroy'])->name('destroy');
        Route::get('google-sheet-import', [GoogleController::class, '__invoke'])->name('google.import');
    });


    Route::resource('media', MediaController::class);

//  Setting
    Route::get('setting', [SettingController::class, 'index'])->name('setting');
    Route::post('setting', [SettingController::class, 'store'])->name('setting.store');

//    Profile
    Route::get('profile', [ProfileController::class, 'index'])->name('profile');
    Route::post('profile', [ProfileController::class, 'store'])->name('profile.store');

//    Ajax
    Route::prefix('ajax')->name('ajax.')->group(function () {
        Route::get('user/check-email', [AjaxUserController::class , 'checkEmailUser'])->name('user.check-email');
        Route::get('events', [AjaxEventController::class , 'index'])->name('events.index');
        Route::get('events/analytics', [AjaxEventController::class , 'analytics'])->name('events.analytics');
        Route::get('events/store', [AjaxEventController::class , 'store'])->name('events.store');
        Route::delete('delete/{event}', [AjaxEventController::class , 'destroy'])->name('events.destroy');
        Route::post('scan-qrcode', [AjaxScanQrCodeController::class , '__invoke'])->name('scan-qrcode');
        Route::post('google-spreadsheet', [AjaxGoogleController::class, 'import'])->name('google-spreadsheet');
        Route::post('profile/avatar', [AjaxProfileController::class , 'uploadAvatar'])->name('profile.avatar');
        Route::post('profile/change-password', [AjaxProfileController::class , 'changePassword'])->name('profile.changePassword');
        Route::post('profile/verify-email', [AjaxProfileController::class , 'verifyEmail'])->name('profile.verifyEmail');
    });
});

Route::group([
    'middleware' => CheckVipMemberMiddleware::class,
], function () {
    Route::prefix('events')->name('events.')->group(function () {
        Route::get('manage', [ManageEventController::class, 'index'])->name('manage');
        Route::post('manage/store', [ManageEventController::class, 'store'])->name('manage.store');
    });
});
