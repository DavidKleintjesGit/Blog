<?php

use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\PostCommentsController;
use App\Http\Controllers\NewsletterController;

Route::view('/',  'index');

Route::post('newsletter', NewsletterController::class);

Route::get('posts', [PostsController::class, 'index']);
Route::get('post/{post:slug}', [PostsController::class, 'show']);
Route::get('admin/post/create', [PostsController::class, 'create']);
Route::post('admin/post/store', [PostsController::class, 'store']);
Route::get('admin/post/edit{post:slug}', [PostsController::class, 'edit']);
Route::post('admin/post/update', [PostsController::class, 'update']);
Route::post('admin/post/destroy/{post:slug}', [PostsController::class, 'destroy']);

Route::post('/post/{post:slug}/comments', [PostCommentsController::class, 'store'])->middleware('auth');

Route::get('register', [RegisterController::class, 'create'])->middleware('guest');
Route::post('register', [RegisterController::class, 'store'])->middleware('guest');

Route::get('login', [SessionController::class, 'create'])->middleware('guest')->name('login');
Route::post('login', [SessionController::class, 'store'])->middleware('guest');
Route::post('logout', [SessionController::class, 'destroy'])->middleware('auth');
