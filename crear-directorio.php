<?php

$msg = null;

if(isset($_POST["directorio"])) {

    $carpeta = htmlspecialchars($_POST["carpeta"]);
    $ruta = htmlspecialchars($_POST["ruta"]);
    $directorio = $ruta.$carpeta;

    if(!is_dir($directorio)) {

        $crear = mkdir($directorio, 0777, true);

        if ($crear) {

            $msg = "Directorio: $directorio creado correctamente.";
        } else {

            $msg = "Ha ocurrido un error al crear el directorio";

        }

    } else {

        $msg = "El directorio ya existe.";

    }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <link href="style.css" rel="stylesheet">
    <title>Creacion de Directorio</title>
</head>
<body>
<br>
<h1>Creación de Directorio</h1>

<div class="form">
    <form method="post" action="<?php echo $_SERVER["PHP_SELF"] ?>">

    <table>

        <tr>
        <br>
            <td>Directorio/s:</td>
            <td><input type="text" name="carpeta"></td>
        </tr>

        <tr>
        
            <td><br>Guardar en la ruta:</td>
            <td><br><input type="text" name="ruta"></td>
        </tr>

        <input type="hidden" name="directorio">

    </table>
    <br>
    <input type="submit" value="Crear directorio">

    <h3><?php echo $msg?></h3>

    </form>

    <br>
    <p class="top"><a href="main.php">Crear un archivo</a></p>
    <p><a href="borrar-directorio.php">Eliminar un directorio</a></p>
</div>

</body>
</html>