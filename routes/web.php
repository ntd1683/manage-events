<?php

use App\Http\Controllers\Ajax\AjaxEventController;
use App\Http\Controllers\Ajax\AjaxGoogleController;
use App\Http\Controllers\Ajax\AjaxNotifyController;
use App\Http\Controllers\Ajax\AjaxProfileController;
use App\Http\Controllers\Ajax\AjaxScanQrCodeController;
use App\Http\Controllers\Ajax\AjaxUserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ChangeLanguageController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\GoogleController;
use App\Http\Controllers\ManageEventController;
use App\Http\Controllers\MediaController;
use App\Http\Controllers\NotifyController;
use App\Http\Controllers\PolicyController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ScanQrcodeController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\SocialAuthController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\CheckBossMiddleware;
use App\Http\Middleware\CheckLoginMiddleware;
use App\Http\Middleware\CheckLogoutMiddleware;
use App\Http\Controllers\EventController;
use App\Http\Middleware\CheckVipMemberMiddleware;
use App\Http\Middleware\Locale;
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

//    social
    Route::get('/redirect/{social}', [SocialAuthController::class, 'redirect'])->name('login.social.redirect');
    Route::get('/callback/{social}', [SocialAuthController::class, 'callback'])->name('login.social.callback');
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

//    Profile
    Route::get('profile', [ProfileController::class, 'index'])->name('profile');
    Route::post('profile', [ProfileController::class, 'update'])->name('profile.update');

//    Ajax
    Route::prefix('ajax')->name('ajax.')->group(function () {
        Route::get('user/check-email', [AjaxUserController::class , 'checkEmailUser'])->name('user.check-email');
        //users
        Route::get('users/analytics', [AjaxUserController::class, 'analytics'])->name('users.analytics');
        Route::delete('users/delete/{user}', [AjaxUserController::class, 'destroy'])->name('users.destroy');

        //events
        Route::get('events', [AjaxEventController::class , 'index'])->name('events.index');
        Route::get('events/analytics', [AjaxEventController::class , 'analytics'])->name('events.analytics');
        Route::get('events/store', [AjaxEventController::class , 'store'])->name('events.store');
        Route::delete('events/delete/{event}', [AjaxEventController::class , 'destroy'])->name('events.destroy');

        Route::post('scan-qrcode', [AjaxScanQrCodeController::class , 'attendant'])->name('scan-qrcode');
        Route::get('getCodeEvent', [AjaxScanQrCodeController::class, 'getCode'])->name('scan-qrcode.getcode');

        Route::post('google-spreadsheet', [AjaxGoogleController::class, 'import'])->name('google-spreadsheet');

        //profile
        Route::post('profile/avatar', [AjaxProfileController::class , 'uploadAvatar'])->name('profile.avatar');
        Route::post('profile/change-password', [AjaxProfileController::class , 'changePassword'])->name('profile.changePassword');
        Route::post('profile/verify-email', [AjaxProfileController::class , 'verifyEmail'])->name('profile.verifyEmail');

        //notify
        Route::get('notify', [AjaxNotifyController::class , 'index'])->name('notify.index');
        Route::get('notify/analytics', [AjaxNotifyController::class , 'analytics'])->name('notify.analytics');
        Route::delete('notify/delete/{notify}', [AjaxNotifyController::class , 'destroy'])->name('notify.destroy');
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

//Notify
Route::group([
    'middleware' => CheckBossMiddleware::class,
], function () {
    Route::prefix('notify')->name('notify.')->group(function () {
        Route::get('analytics', [NotifyController::class, 'analytics'])->name('analytics');
    });
    Route::resource('notify', NotifyController::class);
    Route::resource('users', UserController::class);
//  Setting
    Route::get('setting', [SettingController::class, 'index'])->name('setting');
    Route::post('setting', [SettingController::class, 'store'])->name('setting.store');
});
Route::get('events/register-events/{event}', [EventController::class, 'registerNoAccount'])->name('events.register-events');
Route::post('events/process-register-events', [EventController::class, 'processRegisterNoAccount'])->name('events.process-register-events');

Route::get('privacy-policy', [PolicyController::class, 'privacy'])->name('privacy');
Route::get('term-of-you', [PolicyController::class, 'termOfUse'])->name('termOfUse');

Route::get('test', [TestController::class, '__invoke']);

//Locale
Route::group(['middleware' => Locale::class], function () {
    Route::get('change-language', [ChangeLanguageController::class, '__invoke'])
        ->name('change-language');
});
