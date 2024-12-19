<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IssuesController;
Route::get('/', [IssuesController::class, 'index'])->name('index');

Route::get('/create', [IssuesController::class,'create'])->name('create');

Route::post('/', [IssuesController::class,'store'])->name('store');

// Route::get('/edit', [IssuesController::class,'edit'])->name('edit');

// Route::put('/', [IssuesController::class,'update'])->name('update');

// Route::delete('/', [IssuesController::class,'destroy'])->name('destroy');

Route::get('/edit/{id}', [IssuesController::class, 'edit'])->name('edit');
Route::put('/update/{id}', [IssuesController::class, 'update'])->name('update');
Route::delete('/destroy/{id}', [IssuesController::class, 'destroy'])->name('destroy');
