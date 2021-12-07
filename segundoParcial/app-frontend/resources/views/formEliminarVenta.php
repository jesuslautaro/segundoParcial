<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Venta</title>
</head>
<body>
    <h1>Eliminar venta</h1>  

    @isset($exito)
        <div style="color: #00FF00">Venta eliminada correctamente</div>
    @endisset
    <form action="/eliminarVenta" method="post">
        @csrf
        Id de la venta : <input type="text" name="id"><br />
        <input type="submit" value="Enviar">
    </form>
</body>
</html>