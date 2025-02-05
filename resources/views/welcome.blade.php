<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    </head>
    <body>
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
    </body>
</html>
