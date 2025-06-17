<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\User;
use Carbon\Carbon; 

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

    public function dashboard (){

        $user = auth()->user();

        $products = $user->products; // produtos que eu cadastrei
        $productsJoined = $user->joinedProducts()->with('users')->get();
    
        return view('products.dashboard', compact('products', 'productsJoined'));
    }

    public function destroy($id){
        //Deletar um produto em especifico
        Product::findOrFail($id)->delete();

        return redirect('/dashboard')->with('success','Produto excluído com sucesso!');
        }
    
    public function edit($id){
        //Exibe o formulario de edição de produtos com os dados preenchidos
        $user = auth()->user();
        $product = Product::findOrFail($id);
        $product->date = Carbon::parse($product->date);
        //Se não for dono do produto não pode editar
        if($user->id != $product->user_id){
            return redirect('/dashboard');
        }
        return view('products.update', compact('product'));
    }

    public function update(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'description' => 'nullable|string',
        'value' => 'required|numeric|min:0',
        'date' => 'nullable|date',
        'items' => 'nullable|array',
        'image_upload' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    $product = Product::findOrFail($request->id);

    $product->name = $request->name;
    $product->description = $request->description;
    $product->value = $request->value;
    $product->date = $request->date;
    $product->items = $request->items;

    // Se uma nova imagem for enviada, armazena e atualiza o caminho
    if ($request->hasFile('image_upload') && $request->file('image_upload')->isValid()) {
        $imageName = md5($request->file('image_upload')->getClientOriginalName() . microtime()) . '.' . $request->file('image_upload')->extension();

        $imagePath = $request->file('image_upload')->storeAs('products', $imageName, 'public');

        $product->image = $imagePath;
    }

    $product->save();

    return redirect('/dashboard')->with('success', 'Produto editado com sucesso!');
}

public function productJoin($id){
    $user = auth ()->user();

    $user->joinedProducts()->attach($id);

    $product = Product::findOrFail($id);

    return redirect('/dashboard')->with('success', 'Produto adicionado com sucesso ao carrinho', $product->title);
}

public function cart()
{
    $user = auth()->user();

    $products = $user->joinedProducts; 

    return view('products.cart', ['products' => $products]);
}


//Calcular a o valor total do carrinho

public function sumProductsValues(){
    $user = auth()->user();

    $total = $user->joinedProducts->sum('value');

    return response()->json([
        'total_value' => $total
    ]);

}

//Contar a quantidade de produtos no carrinho

public function countProducts()
{
    $user = auth()->user();
    $count = $user->joinedProducts->count();

    return response()->json(['total_items' => $count]);
}

}
