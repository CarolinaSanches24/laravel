@extends('layouts.main')
@section('title','Home')
@section('content')

<div id="events-container" class="col-md-12">
    <h1>Próximos eventos</h1>
    <div id="cards-container" class="row">
        @foreach($events as $product)
        <div class="col-md-3">
            <div class="card">
                <img src="{{asset('storage/'.$product->image)}}" class="card-img-top" alt="{{$product->title}}">
                <div class="card-body text-center">
                    <p class="card-date">14/01/2025</p>
                    <h5 class="card-title">{{$product->name}}</h5>
                    <p class="card-participantes"> R${{$product->value}}</p>
                    <a href="#" class="btn btn-primary">COMPRAR</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>


    @endsection