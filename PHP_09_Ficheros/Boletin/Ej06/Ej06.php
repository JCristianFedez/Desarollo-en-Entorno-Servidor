<!-- Una función (tipo procedimiento, no hay valor devuelto) 
denominada leerContenidoFichero que reciba como parámetro 
la ruta del fichero y muestre por pantalla el contenido 
de cada una de las líneas del fichero.  -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ej06</title>
</head>
<body>
    <form action="#" method="post" enctype="multipart/form-data">
        <label for="myArchivo">Introduzca archivo a leer: 
            <input type="file" name="myArchivo" id="myArchivo">
        </label>
        <br>
        <input type="submit" value="Enviar">
    </form>

    <?php 
    if(isset($_FILES["myArchivo"])){
        $archivo=$_FILES["myArchivo"]["tmp_name"];
        leerContenidoFichero($archivo);
    }

    function leerContenidoFichero($archivo){
        if(file_exists($archivo)){
            $abierto=fopen($archivo,"r");
            while (!feof($abierto)) {
                echo fgets($abierto)."<br>";
            }
        }else{
            echo "Archivo inexistente";
        }
    }
    ?>
</body>
</html>