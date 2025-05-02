<?php

use App\Http\Controllers\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

/** Routes */

Route::delete('/products/{id}', [ProductController::class, 'deleteById'])->name('products.delete');

Route::post('/products/delete-selected', [ProductController::class, 'deleteSelected'])->name('products.deleteSelected');