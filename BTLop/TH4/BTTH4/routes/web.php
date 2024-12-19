<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ComputerController;

// Route để xem danh sách máy tính
Route::get('/', [ComputerController::class, 'index'])->name('computers.index');
