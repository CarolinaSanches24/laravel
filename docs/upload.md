#### Config upload de imagens


Este comando irá criar um link simbólico na pasta `public` do seu projeto para a pasta
`storage/app/public` do seu projeto. Isso é necessário para que as imagens possam
ser acessadas via URL.

```bash
php artisan storage:link
```
