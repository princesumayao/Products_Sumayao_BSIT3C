<?php

use App\Http\Controllers\EmeController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', [ProductController::class, 'productList'])->name('product.list');
Route::post('/addList', [ProductController::class, 'addList'])->name('product.addList');

Route::get('/edit/{index}',[ProductController::class, 'editList'])->name('product.editList');

Route::post('/update/{index}', [ProductController::class, 'updateList'])->name('product.updateList');

Route::delete('/delete/{index}', [ProductController::class, 'deleteList'])->name('product.deleteList');

