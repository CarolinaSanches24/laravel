<?php

use App\Http\Controllers\EventController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;


Route::get('/', [EventController::class,'index']);
Route::get('/events/create',[EventController::class,'create'])->middleware('auth');
Route::get('/products/list-products', [ProductController::class,'index']);
Route::get('/products/{id}', [ProductController::class,'show']);
Route::post('/products/create-product', [ProductController::class,'store']);
Route::delete('/products/{id}', [ProductController::class,'destroy']);

Route::get('/dashboard',[ProductController::class,'dashboard'])->middleware('auth');
