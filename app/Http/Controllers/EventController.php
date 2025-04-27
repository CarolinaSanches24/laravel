<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class EventController extends Controller
{
    public function index(){

        $search = request('search');

        if($search){
            $search = trim($search);
            $events = Product::searchTitle($search)->get();

        }else{
        //busca todos as promoçoes no banco de dados
       $events = Product::all();
    
        }
    
       // Este comando retorna a view com as promoções
        return view('welcome',['events' => $events,'search' =>$search]);
    }

    public function create(){
        return view('events.create');
    }
}
