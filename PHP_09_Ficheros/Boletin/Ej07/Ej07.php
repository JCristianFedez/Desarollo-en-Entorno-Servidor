<!-- Crea código php donde a través de la función escribirNumerosMod 
escribas en el fichero los números 2, 8, 14. Luego, mediante la 
función leerContenidoFichero muestra el contenido del fichero. Ahora con
la función escribirNumerosMod amplía el contenido del fichero y 
añádele los números 33, 11 y 16. Muestra nuevamente el contenido 
del fichero por pantalla. Finalmente, escribe el fichero pasándole un
array con los número 4, 99, 12 y parámetro <<sobreescribir>> para 
eliminar los datos que existieran previamente. Muestra el contenido 
del fichero por pantalla y un mensaje de despedida. -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ej07</title>
</head>

<body>
   
    <?php 

        echo "Paso 1: Añadir numeros 2,8,14 <br>";
        escribirNumerosMod([2,8,14],"ampliar");
        leerContenidoFichero("datosEjercicio.txt");

        echo "<br><br>Paso 2: Borrar cotenido y añadir los numeros 4,99,12 <br>";
        escribirNumerosMod([4,99,12],"sobreescribir");
        leerContenidoFichero("datosEjercicio.txt");

    /**
     * Amplia o sobreescribe fichero datosEjercicio
     */
    function escribirNumerosMod($numeros,$operacion){
        switch($operacion){
            case "sobreescribir": 
                $op="w";
            break;

            case "ampliar":
                $op="a";
            break;

            default:
                return false;
        }

        $abierto=fopen("datosEjercicio.txt",$op);

        foreach ($numeros as $value) {
            fwrite($abierto,$value.PHP_EOL);
        }
        fclose($abierto);
    }

    /**
     * Lee el conteniido del archivo por lineas
     */
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