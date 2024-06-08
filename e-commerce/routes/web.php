<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/products', [App\Http\Controllers\ProductController::class, 'index'])->name("product.list");

Route::post('/products/store', [App\Http\Controllers\ProductController::class, 'store'])->name("product.store");

Route::get('/products/create', [App\Http\Controllers\ProductController::class, 'create'])->name("product.create");

Route::get('/categories/create', [App\Http\Controllers\CategoryController::class, 'create'])->name("category.create");

Route::post('/categories/store', [App\Http\Controllers\CategoryController::class, 'store'])->name("category.store");

Route::get('/categories', [App\Http\Controllers\CategoryController::class, 'index'])->name("categories.list");

Route::get('/categories/{id}/edit', [App\Http\Controllers\CategoryController::class, 'edit'])->name("categories.edit");

Route::get('/categories/{id}/destroy', [App\Http\Controllers\CategoryController::class, 'destroy'])->name("category.destroy");

Route::post('/categories/{id}/update', [App\Http\Controllers\CategoryController::class, 'update'])->name("category.update");

Route::get('/products/{id}/edit', [App\Http\Controllers\ProductController::class, 'edit'])->name("product.edit");

Route::get('/products/{id}/destroy', [App\Http\Controllers\ProductController::class, 'destroy'])->name("product.destroy");

Route::post('/products/{id}/update', [App\Http\Controllers\ProductController::class, 'update'])->name("product.update");
