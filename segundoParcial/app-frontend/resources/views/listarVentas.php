<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Ventas</h1>

    
    @foreach($ventas as $v)
        Id de la venta: {{ $v["id"] }} <br />
        Id del usuario: {{ $v["id_usuario"] }} <br />
        Id del producto: {{ $v["id_producto"] }} <br />
        Nombre: {{ $v["nombre"] }} <br />
        <br />
    @endforeach
</body>
</html>