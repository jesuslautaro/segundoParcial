<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Agregar socio</h1>  

    @isset($exito)
        <div style="color: #00FF00">Socio agregado correctamente</div>
    @endisset
    <form action="/agregarSocio" method="post">
        @csrf
        Nombre: <input type="text" name="nombre"><br />
        Apellido: <input type="text" name="apellido"><br />
        Telefono: <input type="text" name="telefono"><br />
        Correo: <input type="text" name="correo"><br />
        Fecha Nacimiento: <input type="text" name="fecha_nacimiento"><br />
        <input type="submit" value="Enviar">
    </form>
</body>
</html>