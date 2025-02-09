### Parametros de rotas

Em Laravel, as rotas são usadas para mapear URLs a funções ou controladores. Nas rotas, você pode passar parâmetros para enviar dados de uma página para outra. Esses parâmetros podem ser de diferentes tipos.

1. Parâmetros Obrigatórios (também chamados de "Parâmetros de URL")
Esses parâmetros são passados diretamente na URL e são obrigatórios. O Laravel espera que esses parâmetros sejam fornecidos, e se faltar algum, ele vai dar erro.

Exemplo:
Se você tiver uma rota que precisa de um ID de usuário para mostrar os detalhes de um usuário específico, pode fazer assim:

```php
Route::get('/usuario/{id}', function ($id) {
    return "O ID do usuário é: " . $id;
});
```

Nesse exemplo, a URL precisa ser algo como: http://seusite.com/usuario/10. O número 10 é passado como o parâmetro id para a função.

2. Parâmetros Opcionais
Você também pode ter parâmetros que não são obrigatórios. Para isso, você coloca um ponto de interrogação (?) após o nome do parâmetro. Se o parâmetro não for fornecido, o Laravel vai considerar que ele é opcional.

Exemplo

```php
Route::get('/usuario/{id?}', function ($id = null) {
    if ($id) {
        return "O ID do usuário é: " . $id;
    } else {
        return "Nenhum ID foi passado.";
    }
});
```

Agora, a URL pode ser com ou sem o ID. Se você acessar http://seusite.com/usuario/10, vai ver: "O ID do usuário é: 10". Se você acessar apenas http://seusite.com/usuario, vai ver: "Nenhum ID foi passado."

3. Parâmetros Nomeados
Às vezes, você quer capturar mais de um parâmetro na rota e dar um nome a cada um para facilitar a leitura. Você pode usar esse tipo de parâmetro quando tiver mais de um valor na URL.

Exemplo:

```php
Route::get('/usuario/{nome}/{idade}', function ($nome, $idade) {
    return "O nome do usuário é: " . $nome . " e a idade é: " . $idade;
});
```
Aqui, ao acessar uma URL como http://seusite.com/usuario/Joao/25, você receberá: "O nome do usuário é: João e a idade é: 25".

4. Parâmetros de Consultas (Query Parameters)
Embora não sejam passados diretamente pela URL da rota, você pode acessar parâmetros de consulta (também chamados de query parameters) usando o método query no Laravel.

Exemplo:
Se a URL for: http://seusite.com/produtos?categoria=eletronicos&preco=1000, você pode capturar os parâmetros assim:

```php
Route::get('/produtos', function () {
    $categoria = request('categoria');
    $preco = request('preco');
    return "Categoria: " . $categoria . " e Preço: " . $preco;
});
```

Nesse caso, a função vai capturar o categoria e o preço diretamente da URL e retornar algo como: "Categoria: eletronicos e Preço: 1000".

**Resumo**:

Parâmetros obrigatórios: Precisam ser passados na URL.
Parâmetros opcionais: Podem ou não ser passados.
Parâmetros nomeados: Usados quando há mais de um parâmetro.
Restrições: Definem o formato de um parâmetro.
Expressões regulares: Regras mais complexas para o formato dos parâmetros.
Query Parameters: São parâmetros de consulta na URL (depois de ?).