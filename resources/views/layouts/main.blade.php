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

            <!-- Usuário não autenticado-->
            @guest
            <li class="nav-item">
              <a href="/login" class="nav-link">Entrar</a>
            </li>
            <li class="nav-item">
              <a href="/register" class="nav-link">Cadastro</a>
            </li>
            @endguest
            <!-- Usuário autenticado-->
            @auth
            <li class="nav-item">
              <a href="/dashboard" class="nav-link">Dashboard</a>
            </li>

            <!-- logout -->
            <li class="nav-item">
              <form action="/logout" method="POST">
                @csrf
                <a href="/logout" class="nav-link" onclick="event.preventDefault();
                this.closest('form').submit();">Sair</a>
              </form>
            </li>
            @endauth

          </ul>
          <!-- Formulário de busca alinhado ao lado de "Entrar" com 40px de espaço -->
          <form action="/" class="ms-4 w-auto" method="GET">
            <div class="input-group">
              <button type="submit" class="btn" aria-label="Buscar" title="Buscar">
                <img src="/img/search.svg" alt="Buscar">
              </button>
              <input type="text" name="search" id="search" class="form-control" autocomplete="off" placeholder="Busque por item ou loja">
            </div>
          </form>
          <div class="container_buy">
            <a href="/cart" class="d-flex align-items-center text-decoration-none text-dark">
              <i class="bi bi-cart fs-4"></i>
              <div class="container_buy_info ms-2">
                <p id="cart-total" class="mb-0 fw-bold">R$ 0,00</p>
                <p id="cart-count" class="mb-0 small text-muted">0 itens</p>
              </div>
            </a>
          </div>
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

  <footer class="footer mt-5 py-4 bg-dark text-white">
    <div class="container">
      <p class="mb-0">Carol Sanches desenvolvimento &copy; 2025</p>
      <div class="social-links mt-3">
        <a href="https://github.com/seu-usuario" class="text-white me-3" target="_blank" title="GitHub">
          <i class="bi bi-github"></i>
        </a>
        <a href="mailto:seuemail@example.com" class="text-white me-3" target="_blank" title="E-mail">
          <i class="bi bi-envelope-fill"></i>
        </a>
        <a href="https://www.linkedin.com/in/seu-usuario" class="text-white" target="_blank" title="LinkedIn">
          <i class="bi bi-linkedin"></i>
        </a>
      </div>
    </div>
  </footer>


  <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
  <script>
    document.addEventListener("DOMContentLoaded", function() {
      let successMessage = document.querySelector(".success");
      if (successMessage) {
        setTimeout(() => {
          successMessage.style.transition = "opacity 1s";
          successMessage.style.opacity = "0";
          setTimeout(() => successMessage.style.display = "none", 1000); // Aguarda animação terminar
        }, 2000); // 2 segundos
      }
    });

  document.addEventListener("DOMContentLoaded", function () {
    // Requisições para contar e somar
    fetch("/cart/count")
      .then(res => res.json())
      .then(data => {
        document.getElementById("cart-count").textContent = `${data.total_items} item${data.total_items !== 1 ? 's' : ''}`;
      });

    fetch("/cart/total")
      .then(res => res.json())
      .then(data => {
        const formatted = new Intl.NumberFormat('pt-BR', {
          style: 'currency',
          currency: 'BRL'
        }).format(data.total_value);

        document.getElementById("cart-total").textContent = formatted;
      });
  });


  </script>
</body>

</html>