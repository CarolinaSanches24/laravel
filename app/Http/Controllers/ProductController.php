<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\User;

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
    $product->date = $request->date;
    $product->description = $request->description;
    $product->value = $request->value;
    $product->items = $request->items;

    // Salvar a imagem e armazenar a URL no banco
    if ($request->hasFile('image_upload') && $request->file('image_upload')->isValid()) {
        // Criar um nome único para a imagem
        $imageName = md5($request->file('image_upload')->getClientOriginalName() . microtime()) . '.' . $request->file('image_upload')->extension();

        // Salvar a imagem na pasta 'storage/app/public/products'
        $imagePath = $request->file('image_upload')->storeAs('products', $imageName, 'public');

        // Armazenar o caminho no banco de dados
        $product->image = $imagePath;
    }

    $user = auth()->user();
    $product->user_id = $user->id;

    $product->save();

        return redirect('/')->with('success', 'Produto criado com sucesso!');
    }

    public function show($id){
        //Exibir um produto específico
        $product = Product::findOrFail($id);

        //Recupera o usuário que criou o produto
        $productOwner = User::where('id', $product->user_id)->first()->toArray();
        
        return view('products.show-product', ['product' => $product, 'productOwner' => $productOwner]);


    }
}
