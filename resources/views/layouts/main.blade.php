<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>@yield('title')</title>
  <!-- Fonts Google-->
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">

  <!-- CSS Bootstrap-->

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
  <!-- Css aplication -->

  <link rel="stylesheet" href="/css/styles.css" />
  <script src="/js/scripts.js"></script>
</head>

<body>
  <header>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <div class="container-fluid">
        <a class="navbar-brand" href="/">
          <img src="/img/logo.png" alt="Logo">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent"
          aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarContent">
          <!-- Menu -->
          <ul class="navbar-nav mb-2 mb-lg-0">
            <li class="nav-item">
              <a href="/" class="nav-link">Home</a>
            </li>
            <li class="nav-item">
              <a href="/events/create" class="nav-link">Criar Produtos</a>
            </li>
            <li class="nav-item">
              <a href="/products/list-products" class="nav-link">Produtos</a>
            </li>
            <li class="nav-item">
              <a href="/" class="nav-link">Entrar</a>
            </li>
          </ul>
          <!-- Formulário de busca alinhado ao lado de "Entrar" com 40px de espaço -->
          <form action="/" class="ms-4 w-auto" method = "GET">
            <div class="input-group">
              <button type="submit" class="btn" aria-label="Buscar" title="Buscar">
                <img src="/img/search.svg" alt="Buscar">
              </button>
              <input type="text" name="search" id="search" class="form-control" autocomplete="off" placeholder="Busque por item ou loja">
            </div>
          </form>
        </div>
      </div>
    </nav>
  </header>
  <main>
    <div class="container-fluid">
      <div class="row">
        @if(session('success'))
        <p class="success">{{session('success')}}</p>
        @endif
        @yield('content') {{-- conteúdo da página de forma dinamica --}}
      </div>
    </div>
  </main>

  <footer>
    <p>Carol Sanches desenvolvimento &copy; 2025</p>
  </footer>
  <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
<script>
   document.addEventListener("DOMContentLoaded", function () {
        let successMessage = document.querySelector(".success");
        if (successMessage) {
            setTimeout(() => {
                successMessage.style.transition = "opacity 1s";
                successMessage.style.opacity = "0";
                setTimeout(() => successMessage.style.display = "none", 1000); // Aguarda animação terminar
            }, 2000); // 2 segundos
        }
    });
</script>
</body>

</html>