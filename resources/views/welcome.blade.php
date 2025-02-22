@extends('layouts.main')
@section('title','Home')
@section('content')

<div id="events-container" class="col-md-12">
    <h1>Próximos eventos</h1>
    <div id="cards-container" class="row">
        @foreach($events as $event)
        <div class="col-md-3">
            <div class="card">
                <img src="/img/1.jpg" class="card-img-top" alt="{{$event->title}}">
                <div class="card-body text-center">
                    <p class="card-date">14/01/2025</p>
                    <h5 class="card-title">{{$event->title}}</h5>
                    <p class="card-participantes">x participantes</p>
                    <a href="#" class="btn btn-primary">Saber mais</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>


    @endsection