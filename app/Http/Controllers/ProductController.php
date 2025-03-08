<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        //Exibir todos os produtos em cards

        return view('products.list-products');
    }
    public function store(Request $request)
    {
        //Criar um novo produto

        $product = new Product();
        $product->name = $request->name;
        $product->description = $request->description;
        $product->value = $request->value;
        // Salvar a imagem e armazenar a URL no banco
        if ($request->hasFile('image_upload') && $request->file('image_upload')->isValid()) {
            $imagePath = $request->file('image_upload')->store('products', 'public');
            $product->image = $imagePath;
        }

        $product->save();
        return redirect('/')->with('success', 'Produto criado com sucesso!');
    }
}
