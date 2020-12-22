<!-- Escribe un programa que guarde en un fichero el 
contenido de otros dos ficheros, de tal forma que en
el fichero resultante aparezcan las líneas de los 
primeros dos ficheros mezcladas, es decir, la primera
línea será del primer fichero, la segunda será del 
segundo fichero, la tercera será la siguiente del primer
fichero, etc. Los nombres de los dos ficheros origen 
y el nombre del fichero destino se deben pasar a
través de un formulario. Hay que tener en cuenta que 
los ficheros de donde se van cogiendo las líneas
pueden tener tamaños diferentes. -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ej09</title>
</head>

<body>
    <?php 
    
    if(!isset($_FILES["file-1"]) && !isset($_FILES["file-2"])){

        ?>

    <form action="#" method="post" enctype="multipart/form-data">
        <label for="file-1">Introduzca primer fichero:
            <input type="file" name="file-1" id="file-1" required>
        </label>
        <br>
        <label for="file-2">Introduzca segundo fichero:
            <input type="file" name="file-2" id="file-2" required>
        </label>
        <br>
        <input type="submit" value="Mezclar">
    </form>

    <?php

    }else{
        $f1_name=$_FILES["file-1"]["name"];
        $aux=pathinfo($f1_name);
        $f1_name=$aux["filename"];
        $f2_name=$_FILES["file-2"]["name"];
        $aux=pathinfo($f2_name);
        $f2_name=$aux["filename"];
        $file_1=$_FILES["file-1"]["tmp_name"];
        $file_2=$_FILES["file-2"]["tmp_name"];

        if(!file_exists($file_1) || !file_exists($file_2)){
            if(!file_exists($file_1)){
                echo "Fichero $file_1 no accesible";
            }
    
            if(!file_exists($file_2)){
                echo "Fichero $file_2 no accesible";
            }
        }else{
            
            $f1_open=fopen($file_1,"r");
            $f2_open=fopen($file_2,"r");
            $mix_open=fopen("$f1_name + $f2_name.txt","w");
            
            $saltoAuxiliar=true;

            while(!feof($f1_open) || !feof($f2_open)){//Mientras no acaben los dos archivos
                if(!feof($f1_open)){//Si no ha terminado el archivo
                    $linea=fgets($f1_open);
                    if(feof($f1_open) && $saltoAuxiliar){//Por si es la ultima linea del primer fichero en acabar le añadmios salto
                        fwrite($mix_open,$linea.PHP_EOL);
                        $saltoAuxiliar=false;
                    }else{
                        fwrite($mix_open,$linea);
                    }
                }
                
                if(!feof($f2_open)){//Si no ha terminado el archivo
                    $linea=fgets($f2_open);
                    if(feof($f2_open) && $saltoAuxiliar){//Por si es la ultima linea del primer fichero en acabar le añadmios salto
                        fwrite($mix_open,$linea.PHP_EOL);
                        $saltoAuxiliar=false;
                    }else{
                        fwrite($mix_open,$linea);
                    }
                }
            }
            fclose($f1_open);
            fclose($f2_open);

        }
        echo "<h1>Listo archivo creado con el nombre de $f1_name + $f2_name.txt</h1>";
        echo "<button onclick=\"window.location.href='Ej09.php';\">Reiniciar</button>";

    }
    
    ?>
</body>

</html>