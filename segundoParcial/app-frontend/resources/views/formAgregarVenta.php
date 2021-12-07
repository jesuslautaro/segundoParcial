<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Agregar venta</h1>  

    @isset($exito)
        <div style="color: #00FF00">Venta agregado correctamente</div>
    @endisset
    <form action="/agregarVenta" method="post">
        @csrf
        Id del vendedor: <input type="text" name="id_vendedor"><br />
        Id del producto: <input type="text" name="id_producto"><br />
        Stock: <input type="text" name="stock"><br />
        <input type="submit" value="Enviar">
    </form>
</body>
</html>