<?php

use App\Http\Controllers\PageController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\User\CreateController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PageController::class, 'index'])->name('index');

Route::get('/contacts', [PageController::class, 'contact'])->name('contact');

Route::get('/posts',  [PostController::class, 'index'])->name('post.index');

Route::get('/posts/create',  [PostController::class, 'create'])->name('post.create');

Route::post('/posts', [PostController::class, 'store'])->name('post.store');

Route::get('/posts/{post}',  [PostController::class, 'show'])->name('post.show');

Route::get('/posts/{post}/edit',  [PostController::class, 'edit'])->name('post.edit');

Route::patch('/posts/{post}/edit',  [PostController::class, 'update'])->name('post.update');

Route::delete('/posts/{post}',  [PostController::class, 'destroy'])->name('post.destroy');





