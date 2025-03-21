#### Config upload de imagens

Step 1 - Configuração do formulário

´´´html
<form method="post" enctype="multipart/form-data">
```

Step 2 - Criar o input do arquivo

```html
<input type ="file" name="arquivo" id="arquivo" class="form-control-file">
```

Step 3 - Configuração do upload da imagem no Controller
```php
if($request->hasFile('image') && $request->file('image')->isValid()) {
    $image = $request->image;
    $extension = $requestImage->extension();
    $imageName = md5($requestImage->getClientOriginalName() . strtotime("now"));
    $requestImage->move(public_path('img/events'), $imageName);
    $event->image = $imageName;
    $event->save();


```

Outra opção

```php
     //Criar um novo produto

        $product = new Product();
        $product->name = $request->name;
        $product->description = $request->description;
        $product->value = $request->value;
        // Salvar a imagem e armazenar a URL no banco
        if ($request->hasFile('image_upload') && $request->file('image_upload')->isValid()) {
            $imagePath = $request->file('image_upload')->store('products', 'public');
            $product->image = $imagePath;
        }

        $product->save();
```
Este comando irá criar um link simbólico na pasta `public` do seu projeto para a pasta
`storage/app/public` do seu projeto. Isso é necessário para que as imagens possam
ser acessadas via URL.

```bash
php artisan storage:link
```
