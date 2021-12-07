<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ventas</title>
</head>
<body>
    <h1>Modificar ventas</h1>

    @isset($exito)
        <div style="color: #00FF00">Venta modificada correctamente</div>
    @endisset
    <form action="/modificarVenta" method="post">
        @csrf
        Id de la venta: <input type="text" name="id"><br />
        Id del usuario: <input type="text" name="id_usuario"><br />
        Id del producto: <input type="text" name="id_producto"><br />
        Stock: <input type="text" name="stock"><br />
        <input type="submit" value="Enviar">
    </form>
</body>
</html>
