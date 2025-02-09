@extends('layouts.main')
@section('title', 'produto-teste')
@section('content')
      <h1> Nome do produto</h1>

      @if($id)
      <p>Exibindo produto ID: {{ $id }}</p>
      @else
      <p>Id não informado</p>
      @endif
@endsection