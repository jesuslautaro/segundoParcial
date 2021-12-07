<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Producto</title>
</head>
<body>
    <h1>Eliminar producto</h1>  

    @isset($exito)
        <div style="color: #00FF00">Producto eliminado correctamente</div>
    @endisset
    <form action="/eliminarProductos" method="post">
        @csrf
        Id: <input type="text" name="id"><br />
        <input type="submit" value="Enviar">
    </form>
</body>
</html>