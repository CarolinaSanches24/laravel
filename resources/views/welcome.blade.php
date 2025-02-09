@extends('layouts.main')
@section('title','Home')
@section('content')

        <h1>Teste</h1>
        @if(10 > 5)
        <p>A condição é true</p>
        @endif

        <p>{{$name}}</p>

        @if($name == 'Pedro')
        <p> My name is Pedro </p>
        @elseif($name == 'João')
        <p> My name is João,  and my profession is {{ $profession}} and have {{ $age }} years old </p>
        @else
        <p> My name is {{ $name }}</p>
        @endif

        @for ($i = 0 ; $i< count($arr); $i++)
        <p>{{$arr[$i]}} - {{$i}}</p>
        @if($arr[$i] == 'João')
        <p> João is in the array</p>
        @endif
        @endfor

        @php
        echo 'Hello, World!';
        @endphp

        {{-- Comentário no blade --}}

        @foreach($frutas as $fruta)
        <p>{{$loop->index}}</p>
        <p>{{$fruta}}</p>
        @endforeach
@endsection