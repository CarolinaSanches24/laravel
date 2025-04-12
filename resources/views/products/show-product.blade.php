@extends('layouts.main')
@section('title', $product->name)
@section('content')

<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-12 col-md-10">
            <div class="card product-card shadow-sm border-0 p-3 p-md-4">
                <div class="row gy-4 align-items-center">
                    <!-- Imagem do produto -->
                    <div class="col-12 col-md-6 text-center">
                        <img src="{{ asset('storage/' . $product->image) }}" class="product-image" alt="{{ $product->name }}">
                    </div>

                    <!-- Informações do produto -->
                    <div class="col-12 col-md-6">
                        <h2 class="fw-bold mb-3">{{ $product->name }}</h2>
                        <h4>Sobre o produto</h4>
                        <p class="text-muted mb-4">{{ $product->description }}</p>
                        <button class="btn btn-danger btn-lg w-100" id="product-submit">
                            <i class="bi bi-cart-plus me-2"></i> Adicionar ao carrinho
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection