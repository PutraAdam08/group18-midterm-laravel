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
Route::post('/create', [CardController::class, 'add_card'])->name('create');
Route::post('/add_category', [CategoryController::class, 'create_category'])->name('add_category');
Route::post('/add_brand', [BrandController::class, 'create_brand'])->name('add_brand');
Route::post('/add_brand', [BrandController::class, 'create_brand'])->name('add_brand');
Route::get('/{card:slug}/edit', function (Card $card) {
    // $card is automatically resolved by the 'slug'
    return view('products.edit', [
        'card' => $card
    ]);
})->name('edit');
Route::put('/{id}/edit', [CardController::class, 'edit_card'] )->name('edit_card');
