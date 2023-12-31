<?php

use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\SubjectController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

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

Route::get('/',function(){
    return view('pages.auth.auth-login');
});

Route::middleware(['auth'])->group(function(){
    Route::get('/home', function () {
        return view('pages.app.dashboard-siakad',['type_menu'=>'']);
    });

    Route::resource('user', UserController::class);
    Route::resource('subject', SubjectController::class);
    Route::resource('schedule', ScheduleController::class);
    Route::get('generate-qrcode/{schedule}', [ScheduleController::class,'qrcode'])->name('generate-qrcode');
    Route::put('generate-qrcode-update/{schedule}', [ScheduleController::class,'generateQrCodeUpdate'])->name('generate-qrcode-update');
});
Route::get('/login',function(){
    return view('pages.auth.auth-login');
})->name('login');

Route::get('/register',function(){
    return view('pages.auth.auth-register');
})->name('register');

Route::get('/forgot-password',function(){
    return view('pages.auth.auth-forgot-password');
})->name('forgot-password');

Route::get('/reset-password',function(){
    return view('pages.auth.auth-reset-password');
})->name('reset-password');

