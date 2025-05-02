<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});

Route::get('/products', [ProductController::class, 'getAll'])->name('products');

Route::get('/addProduct', [ProductController::class, 'showAddForm']);

Route::get('/products/{id}/edit', [ProductController::class, 'getById'])->name('products.edit');

Route::get('/addCategory', function () {
    return view('addCategory');
});

Route::post('/addProduct', [ProductController::class, 'addNew'])->name('products.add');

Route::put('/products/{id}', [ProductController::class, 'updateById'])->name('products.update');