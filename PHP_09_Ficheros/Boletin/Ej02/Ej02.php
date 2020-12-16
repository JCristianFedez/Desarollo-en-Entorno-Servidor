<!-- Una función denominada obtenerSuma (tipo función, devolverá 
un valor numérico) que reciba una ruta de archivo como 
parámetro, lea los números existentes  en cada línea del 
archivo, y devuelva la suma de todos esos números.  -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ej02</title>
</head>

<body>
    <form action="#" method="post" enctype="multipart/form-data">
        <input type="file" name="myArchivo" id="myArchivo">
        <input type="submit" value="Prueba"></form>
    <?php

    if(isset($_FILES["myArchivo"])){
        $archivo=$_FILES["myArchivo"];
        echo obtenerSuma($archivo["tmp_name"]);
    }

    function obtenerSuma($ruta){
        $suma=0;
        if(file_exists($ruta)){
            $tempFile=fopen($ruta,"r");

            while(!feof($tempFile)) {
                $letra = fgetc($tempFile);
                if(is_numeric($letra)){
                    $suma+=$letra;
                }
                }
            fclose($tempFile); 
                return $suma;
        }else{
            return "Archivo no encontrado";
        }
    }
    ?>
</body>

</html>