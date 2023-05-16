<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\SignupController;
use App\Http\Controllers\Mypage;
use Illuminate\Support\Facades\Route;

Route::get('',[HomeController::class, 'index']);
Route::get('blogs/{blog}',[HomeController::class, 'show'])->name('blog.show');

Route::get('signup',[SignupController::class, 'index']);
Route::post('signup',[SignupController::class, 'store']);

Route::get('mypage/login', [Mypage\UserLoginController::class, 'index'])->name('login');
Route::post('mypage/login', [Mypage\UserLoginController::class, 'login']);
