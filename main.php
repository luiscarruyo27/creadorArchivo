<?php

$msg = '';

if(isset($_POST["escribir"])) {

    $nombre = htmlspecialchars($_POST["nombre"]);
    $extension = htmlspecialchars($_POST["extension"]);
    $contenido = $_POST["contenido"];

    $ruta = "archivos/".$nombre.$extension;

    $manejador = fopen($ruta, 'a');

    if (fwrite($manejador, $contenido)) {
        $msg = "Archivo creado satisfactoriamente.";
        $msg .= " Se encuentra en: <a href= '$ruta' target='_blank'> $ruta </a>";

    } else {
        $msg = "Ha ocurrido un error al crear el archivo.";
    }

    fclose($manejador); 

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <link href="style.css" rel="stylesheet">
    <title>Creacion de Archivos</title>
</head>
<body>
<br>
<h1 class="text-center">Creación de Archivos</h1>
<br>


<div class="form">
    <form method="POST" action="<?php echo $_SERVER["PHP_SELF"] ?>">

    <table>


        <tr>
            <td>Tipo de Archivo</td>

            <td>
                
                <select name="extension">
                    <option value=".txt">.txt</option>
                    <option value=".html">.html</option>
                </select>
            </td>
        </tr>

        <tr>
            <td>Nombre del Archivo:</td>
            <td><br><input type="text" name="nombre"></td>
            <br>
        </tr>


        <tr>
            <td>Contenido del Archivo:</td>
            <td><br><textarea name="contenido" cols="30" rows="10"></textarea></td>
        </tr>

    </table>
    <br>
    <input type="hidden" name="escribir">
    <input type="submit" value="Crear Archivo">
    <br></br>
    <h4>Los archivos serán creados en la carpeta archivos</h4>
    
    </form>
    <!--<p><a href="leer.php">Leer un archivo</a></p>-->
    <p class="top"><a href="crear-directorio.php">Crear un directorio</a></p>
    <p><a href="borrar-directorio.php">Borrar un directorio</a></p>

    <strong class="text-center"><?php echo $msg ?></strong>

</div>


    
</body>
</html>