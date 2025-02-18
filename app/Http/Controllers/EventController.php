<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;

class EventController extends Controller
{
    public function index(){
        //Este comando busca todos os eventos no banco de dados
       $events = Event::all();
    
       // Este comando retorna a view com os eventos
        return view('welcome',['events' => $events]);
    }

    public function create(){
        return view('events.create');
    }
}
