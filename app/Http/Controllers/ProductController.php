<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(){
       //Exibir todos os produtos em cards

       return view('products.list-products');
    }
}
