<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\PostController;


Route::group(['middleware' => ['guest']], function() {
    // ログインフォーム表示
    Route::get('/', [AuthController::class, 'showLogin'])->name('showLogin');

    // ログイン処理
    Route::post('/login', [AuthController::class, 'login'])->name('login');
});

Route::group(['middleware' => ['auth']], function() {
    // ログアウト処理
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    // ホーム画面表示
    Route::get('/home', [MainController::class, 'index'])->name('home');

    Route::post('/create-post', [PostController::class, 'createPost'])->name('create-post');

});

