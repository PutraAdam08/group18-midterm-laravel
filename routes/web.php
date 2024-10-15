<?php

use App\Http\Controllers\BrandController;
use App\Http\Controllers\CardController;
use App\Http\Controllers\CategoryController;
use App\Models\Card;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

// Home route (Optional: a basic welcome page)
Route::get('/', function () {
    //$cards = Card::filter(request(['search', 'category']))->latest();
    $cards = Card::latest()->get();
    return view('index', [
        'cards' => $cards
    ]);
});

Route::get('/create', function() {
    return view('products.create');
})->name('create');
Route::post('/create', [CardController::class, 'add_card']);
Route::post('/add_category', [CategoryController::class, 'create_category'])->name('add_category');
Route::post('/add_brand', [BrandController::class, 'create_brand'])->name('add_brand');
Route::put('/edit', [CardController::class, 'edit_user'])->name('edit');