@extends('layouts.main')
@section('title', 'Criar Produto')
@section('content')
<div id="event-create-container" class="col-md-6 offset-md-3">
     <h1>Criar Produto</h1>
     <form action="/products/create-product" method="POST" enctype="multipart/form-data">
          @csrf
          <div class="form-group">
               <label for="name">Nome:</label>
               <input type="text" class="form-control" id="name" name="name" >
          </div>
          <div class="form-group">
               <label for="description">Descrição:</label>
               <textarea type="text" class="form-control" id="description" name="description" placeholder="Informe uma breve descrição do produto"></textarea>
          </div>
          <div class="form-group">
               <label for="title">Adicionais</label>
               <div class="form-group">
                    <input type="checkbox" name="items[]" value="Molhos">
                    Molhos especiais
               </div>
               <div class="form-group">
                    <input type="checkbox" name="items[]" value="Bebidas">
                    Bebidas
               </div>
               <div class="form-group">
                    <input type="checkbox" name="items[]" value="Sobremesa">
                    Sobremesa
               </div>
               <div class="form-group">
                    <input type="checkbox" name="items[]" value="Brindes">
                    Brindes
               </div>
          </div>
          <div class="form-group">
               <label for="value">Valor:</label>
               <input type="text" class="form-control" id="value" name="value" >
          </div>
          <br>
          <div class="form-group">
               <label for="image_upload">Enviar imagem:</label>
               <input type="file" class="form-control-file" id="image_upload" name="image_upload" accept="image/*">
          </div>
          <br>
          <input type="submit" class="btn btn-primary" value="Criar Produto">
</div>

@endsection