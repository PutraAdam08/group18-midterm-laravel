<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

// Home route (Optional: a basic welcome page)
Route::get('/', function () {
    return redirect()->route('products.index'); // Redirect to products index
});

// Product resource routes (CRUD functionality)
Route::resource('products', ProductController::class);

