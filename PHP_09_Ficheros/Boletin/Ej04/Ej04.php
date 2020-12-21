<!-- Crea código php donde a través de la función escribirTresNumeros 
escribas en el fichero los números 2, 8, 14. Luego, mediante la 
función obtenerSuma muestra por pantalla el resultado de sumar los
números existentes en el archivo. Finalmente, mediante la función 
obtenerArrNum obtén el array, recórrelo y muestra cada uno de 
los elementos del array.  -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ej04</title>
</head>

<body>
    <form action="#" method="post" enctype="multipart/form-data">
        <label for="myArchivo">Introduzca archivo:
            <input type="file" name="myArchivo" id="myArchivo">
        </label>
        <br>
        <input type="submit" value="Enviar">
    </form>

    <?php 
    
    if(isset($_FILES["myArchivo"])){
        $archivo=$_FILES["myArchivo"]["tmp_name"];
        escribirTresNumeros($archivo);
         obtenerSuma($archivo);
         $rowArray=obtenerArrNum($archivo);
         echo "<br>";
         for ($i=0; $i < count($rowArray); $i++) { 
            echo "Fila $i : ".$rowArray[$i]."<br>";
            }
    }
            /**
         * Se escriben en el fichero pasado los numeros
         * 2, 8 y 14
         */
        function escribirTresNumeros($fichero){
            if(file_exists($fichero)){
                $abierto=fopen($fichero,"a");

                fwrite($abierto,"2".PHP_EOL);
                fwrite($abierto,"8".PHP_EOL);
                fwrite($abierto,"14".PHP_EOL);

                fclose($abierto);
            }else{
                echo "Fichero no existe";
            }
        }

        /**
         * Se pinta en pantalla la suma de los 
         * numeros del fichero pasado
         */
        function obtenerSuma($fichero){
            if(file_exists($fichero)){
                $abierto=fopen($fichero,"r");
                $sum=0;
                while(!feof($abierto)){
                    $letra=fgetc($abierto);
                    if(is_numeric($letra)){
                        $sum+=$letra;
                    }
                }
                fclose($abierto);
                echo "La suma de los numeros del archivo es : $sum";
            }else{
                echo "Fichero no existe";
            }
        }

        /**
         * Retorna un array con el contenido de cada
         * fila del archivo pasado
         */
        function obtenerArrNum($fichero){
            if(file_exists($fichero)){
                $abierto=fopen($fichero,"r");
                $rowArray=[];

                while(!feof($abierto)){
                    $row=fgets($abierto);

                    if(is_numeric($row)){
                        $rowArray[]=$row;
                    }
                }

                fclose($abierto);

                return $rowArray;
            }else{
                return false;
            }
        }

    ?>
</body>

</html>