<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\PostDetailController;
use App\Http\Controllers\CommentController;

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LogoutController::class, 'logout'])->name('logout');

Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

Route::get('/blog', [BlogController::class, 'index'])->name('blog');

Route::get('/post/create', [PostController::class, 'create'])->name('create_post');
Route::post('/post/store', [PostController::class, 'store'])->name('store_post');

Route::get('/post/{id}', [PostDetailController::class, 'show'])->name('post_detail');
Route::post('/posts/{post_id}/comments', [CommentController::class, 'store'])->name('store_comment');
Route::delete('/post/{id}', [PostController::class, 'destroy'])->name('delete_post');

// 記事の編集ページ表示
Route::get('/post/{id}/edit', [PostController::class, 'edit'])->name('edit_post');
// 記事の更新
Route::put('/post/{id}', [PostController::class, 'update'])->name('update_post');
Route::delete('/comments/{id}', [CommentController::class, 'destroy'])->name('delete_comment');
