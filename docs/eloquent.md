#### Eloquent 

- [Eloquent Documentation](https://laravel.com/docs/8.x/eloquent)

- Eloquent é o ORM (Object Relational Mapping) do Laravel. Ele permite que você trabalhe com seus dados como objetos.

- Cada tabela tem um Model correspondente, que é responsável por realizar operações CRUD (Create, Read, Update, Delete ) sobre a tabela.

- A convenção para modelar um modelo é criar um arquivo com o nome do modelo em singular (por exemplo, `User .php` para a tabela `users`).

- Enquanto a tabela no banco de dados é em plural.

#### 

No laravel é comum ter um action especifica para POST chamada de **store**

Nela vamos criar e compor o objeto baseados nos dados enviados pelo post

Com o objeto formado vamos persistir os dados com **Save**

### Method findOrFail

- O método do laravel findOrFail serve para buscar um registro no banco de dados e caso não encontre ele lança uma exceção.

### Exemplo basiso da utilização do método







