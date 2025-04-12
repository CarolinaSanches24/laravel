@extends('layouts.main')
@section('title','Home')
@section('content')

<div id="events-container" class="col-md-12">
    <h1 class="events-container-title">Promoções disponíveis</h1>
    <div id="cards-container" class="row">
        @foreach($events as $product)
        <div class="col-md-3">
            <div class="card">
                <img src="{{asset('storage/'.$product->image)}}" class="card-img-top" alt="{{$product->title}}">
                <div class="card-body text-center">
                    <h5 class="card-title">{{$product->name}}</h5>
                    <p class="card-participantes"> R${{$product->value}}</p>
                    <p class="card-date">Promoção valida até <b>{{date("d/m/Y"),strtotime($product->date)}}</b></p>
                    <a href="/products/{{$product->id}}" class="btn btn-primary">COMPRAR</a>
                </div>
            </div>
        </div>
        @endforeach
        @if(count($events)==0)
        <p>Não há promoções no momento</p>
        @endif
    </div>
</div>


    @endsection