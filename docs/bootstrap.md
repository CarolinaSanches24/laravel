**col**- → Indica uma coluna dentro do sistema de grid do Bootstrap.
**md** → Refere-se ao breakpoint "medium" (médias telas, a partir de 768px de largura).
**12**→ Indica que essa coluna ocupa 12 partes do grid, ou seja, toda a largura disponível da linha.

<!-- div#search-container.col-md-12 --> emmet 
 <div id="search-container" class="col-md-12"></div>

 Comando emment

 .card-body .card-date

 ```html
 <div class="card-body"></div>
 ```

 div#event-create-container.col-md-6.offset-md-3

 ´´´html
 <div id="event-create-container" class="col-md-6 offset-md-3"></div>
 ´´´

 No Bootstrap 4, as classes col-md-6 e offset-md-3 fazem parte do sistema de grid flexível baseado em 12 colunas. Vamos entender cada uma delas:

1. col-md-6
col- → Define uma coluna dentro de um container flexível.
md → Aplica o estilo a partir do breakpoint md (≥ 768px)`.
6 → Faz com que a <div> ocupe 6 colunas das 12 disponíveis no grid.
Ou seja, essa classe define que, em telas médias (md) ou maiores, a <div> ocupará metade da largura da tela.

2. offset-md-3
offset- → Adiciona um deslocamento à esquerda, movendo a <div> horizontalmente.
md → O deslocamento é aplicado a partir do breakpoint md (≥ 768px).
3 → A <div> será empurrada 3 colunas para a direita.
Isso é útil para centralizar um elemento. Como a <div> ocupa 6 colunas (col-md-6) e é deslocada 3 (offset-md-3), o total é 6 + 3 + 3 = 12, garantindo a centralização na tela.