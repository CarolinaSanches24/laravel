<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index(){
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
    }

    public function create(){
        return view('events.create');
    }
}
