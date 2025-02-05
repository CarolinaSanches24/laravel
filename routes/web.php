<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function () {

    $name = 'João';
    $age = 26;
    $profession = 'Analista de suporte';
    $arr = ['João', 'Maria', 'Pedro'];
    $frutas = ['Maça', 'Banana'];

    return view('welcome', ['name' => $name,'age' => $age,
    'profession' => $profession,
    'age' => $age,
    'arr' => $arr,
    'frutas'=>$frutas]);
});

Route::get('/home/{text}',function($text){
    echo 'Ola, '.$text;
});

Route::get('/products', function(){
    return view('products');
});