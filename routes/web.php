<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('users', [HomeController::class, 'users'])->name('users');
Route::get('registerNewUser',[HomeController::class, 'registerNewUser'])->name('registerNewUser');
Route::post('saveregisteredUser',[HomeController::class, 'saveregisteredUser'])->name('saveregisteredUser');