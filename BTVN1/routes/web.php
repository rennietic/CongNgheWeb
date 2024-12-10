<?php

use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index']);
Route::get('posts', [PostController::class, 'index']);
