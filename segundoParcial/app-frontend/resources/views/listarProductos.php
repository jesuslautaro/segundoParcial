<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Socios</h1>

    
    @foreach($socios as $s)
        ID: {{ $s["id"] }} <br />
        Nombre: {{ $s["nombre"] }} <br />
        Apellido: {{ $s["apellido"] }} <br />
        Telefono: {{ $s["telefono"] }} <br />
        Correo: {{ $s["correo"] }} <br />
        Fecha Nacimiento: {{ $s["fecha_nacimiento"] }} <br />

        <br />
    @endforeach
</body>
</html>