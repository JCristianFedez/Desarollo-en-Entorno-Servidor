<!-- Una función denominada obtenerArrNum (tipo función, devolverá 
un array de valores numéricos) que reciba una ruta de 
archivo como parámetro, lea los números existentes en 
cada línea del archivo, y devuelva un array cuyo índice 
0 contendrá el número existente en la primera línea, cuyo 
índice 1 contendrá el número existente en la segunda línea 
y así sucesivamente (no usar la función file).  -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ej03</title>
</head>
<body>
    <form action="#" method="post" enctype="multipart/form-data">
    <label for="myArchivo">Introduzca archivo: 
    <input type="file" name="myArchivo" id="myArchivo"></label>
    <br>
    <input type="button" value="Enviar">
    </form>

    <?php 
        if(isset($_FILES["myArchivo"])){
            $archivo=$_FILES["myArchivo"];
            echo obtenerArrNum($archivo["tmp_name"]);
        }

        function obtenerArrNum($ruta){
            if(file_exists($ruta)){
                $tempFile=fopen($ruta,"r");
                $wordArray=[];

                while(!feof($tempFile)){
                    $tempFile[]=fgetc($tempFile);
                }

                fclose($tempFile);
                return $wordArray;
            }else{
                return "Archivo no encontrado";
            }
        }
    ?>
</body>
</html>