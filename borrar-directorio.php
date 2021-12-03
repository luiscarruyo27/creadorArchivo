<?php

    function deleteDir($ruta) {

        foreach(glob($ruta . "/*") as $elemento) {

            if (is_dir($elemento)) {

                deleteDir($elemento);
            } else {
                unlink($elemento); 
            }
        }

        rmdir($ruta);
    }

    $msg = null;

    if(isset($_POST["eliminar_directorio"])) {

        $ruta = htmlspecialchars($_POST["ruta"]);

        if (is_dir($ruta)) {
            deleteDir($ruta);

            $msg = "Directorio: $ruta eliminado correctamente.";

        } else {

            $msg = "El Directorio: $ruta no existe";
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
    <title>Eliminar directorios</title>
</head>
<body>
<br>
    <h1>Eliminar Directorios</h1>
        <br>
        <div class="form">
        <form method="post" action="<?php echo $_SERVER["PHP_SELF"] ?>">

            <label>Ruta del directorio:</label>
            <input type="text" name="ruta">
            <input type="hidden" name="eliminar_directorio">
            <input type="submit" value="Borrar">

            <h3><?php echo $msg?></h3>

        </form>
        <br>
        <p class="top"><a href="main.php">Crear un Archivo</a></p>
        <p><a href="crear-directorio.php">Crear un directorio</a></p>
    </div>

</body>
</html>