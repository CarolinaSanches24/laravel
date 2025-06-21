<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;


Route::get('/', [ProductController::class,'home']);
Route::get('/events/create',[ProductController::class,'create'])->middleware('auth');
Route::get('/products/list-products', [ProductController::class,'index']);
Route::get('/products/{id}', [ProductController::class,'show']);
Route::post('/products/create-product', [ProductController::class,'store']);
Route::delete('/products/{id}', [ProductController::class,'destroy'])->middleware('auth');
Route::get('/products/edit/{id}', [ProductController::class,'edit'])->middleware('auth');
Route::put('/products/update/{id}',[ProductController::class,'update'])->middleware('auth');

Route::get('/dashboard',[ProductController::class,'dashboard'])->middleware('auth');

Route::post('/products/join/{id}',[ProductController::class,'productJoin'])->middleware('auth');

Route::delete('/products/remove/{id}',[ProductController::class,'productRemove'])->middleware('auth');

Route::get('/cart', [ProductController::class, 'cart'])->middleware('auth');

Route::get('/cart/count', [ProductController::class, 'countProducts'])->middleware('auth');
Route::get('/cart/total', [ProductController::class, 'sumProductsValues'])->middleware('auth');
