<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::group(["middleware" => "auth"], function(){
    Route::get('users/attendance/{code_id}',[UserController::class,'markAttendance'])->name('mark.attendance-qr');
    Route::resource('users',UserController::class);
});
