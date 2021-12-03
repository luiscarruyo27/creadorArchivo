<?php

$lineas = null;
$mensaje = null;
$total = 0;
$ruta = "archivos/hola.txt";
$manejador = fopen($ruta, 'r');

while (!feof($manejador)) {

    $lineas .= fgets($manejador);
    $total++;

}

$mensaje = "El total de lineas del archivo $ruta  es: $total ";
fclose($manejador);

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <link href="style.css" rel="stylesheet">
    <title>Lectura de Archivos</title>
</head>
<body>

<h1>Lectura de Archivos</h1>
<h3><?php echo $mensaje?></h3>

<h3>Contenido:</h3>

<h2><?php echo htmlspecialchars($lineas) ?></h2>

    <p><a href="leer.php">Leer un archivo</a></p>
    <p><a href="crear-directorio.php">Crear un directorio</a></p>
    <p><a href="borrar-directorio.php">Borrar un directorio</a></p>
</body>
</html>