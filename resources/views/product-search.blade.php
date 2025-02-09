@extends('layouts.main')
@section('title','Search')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3>Search</h3>
                    @if($busca)
                    <p> Search for: {{$busca}}</p>
                    @endif
                    </div>
@endsection