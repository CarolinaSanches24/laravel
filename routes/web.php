<?php

use App\Http\Controllers\EventController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;


Route::get('/', [EventController::class,'index']);
Route::get('/events/create',[EventController::class,'create']);
Route::get('/products/list-products', [ProductController::class,'index']);
Route::get('/products/{id}', [ProductController::class,'show']);
Route::post('/products/create-product', [ProductController::class,'store']);
