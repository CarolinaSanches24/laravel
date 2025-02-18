@extends('layouts.main')
@section('title','Home')
@section('content')

<div id="search-container" class="col-md-12">
    <h1> Busque um evento</h1>
    <form action="">
        <input type="text" name="search" id="search"
            class="form-control" placeholder="Buscar eventos">
        <button type="submit" class="btn btn-success">Buscar</button>
    </form>
</div>

<div id="events-container" class="col-md-12">
    <h1>Proxímos eventos</h1>
    <div id="cards-container" class="row">
        @foreach($events as $event)
        <div id="card" class="col-md-3">
            <img src="" alt= "{{$event->title}}"/>
            <div class="card-body">
                <p class="card-date">14/01/2025</p>
                <h1 class="card-title"> {{$event->title}}</h1>
                <p class="card-participantes"> x participantes</p>
                <a href="#" class="btn btn-primary">Saber mais</a>
            </div>
        </div>
        @endforeach
    </div>

    @endsection