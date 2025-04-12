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

    // Validação dos dados
    $request->validate([
        'name' => 'required|string|max:255',
        'description' => 'nullable|string',
        'value' => 'required|numeric|min:0',
        'image_upload' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
    ]);

    // Criar um novo produto
    $product = new Product();
    $product->name = $request->name;
    $product->description = $request->description;
    $product->value = $request->value;

    // Salvar a imagem e armazenar a URL no banco
    if ($request->hasFile('image_upload') && $request->file('image_upload')->isValid()) {
        // Criar um nome único para a imagem
        $imageName = md5($request->file('image_upload')->getClientOriginalName() . microtime()) . '.' . $request->file('image_upload')->extension();

        // Salvar a imagem na pasta 'storage/app/public/products'
        $imagePath = $request->file('image_upload')->storeAs('products', $imageName, 'public');

        // Armazenar o caminho no banco de dados
        $product->image = $imagePath;
    }

    $product->save();

        return redirect('/')->with('success', 'Produto criado com sucesso!');
    }

    public function show($id){
        //Exibir um produto específico
        $product = Product::findOrFail($id);
        return view('products.show-product', ['product' => $product]);
    }
}
