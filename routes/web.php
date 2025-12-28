<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// routes/web.php
Route::get('/', fn () => view('home'));

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', fn () => view('dashboard'));
});

Route::middleware(['auth', 'isAdmin'])->prefix('admin')->group(function () {
    Route::resource('products', ProductController::class);
});

