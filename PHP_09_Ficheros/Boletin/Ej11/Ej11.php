<!-- Realiza un programa que diga cuántas ocurrencias de 
una palabra hay en un fichero. Tanto el
nombre del fichero como la palabra se deben 
pasar como argumentos en la línea de comandos.  -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ej11</title>
</head>
<body>
    <?php 
    if(!isset($_FILES["my_file"]) || !isset($_REQUEST["word"])){
        ?>
        <form action="#" method="post" enctype="multipart/form-data">
        <label for="my_file">Introduzca archivo: 
            <input type="file" name="my_file" id="my_file" required>
        </label>
        <br/>
        <label for="word">Introduzca palabra a buscar: 
            <input type="text" name="word" id="word" required>
        </label>
        <br>
        <input type="submit" value="Calcular">
        </form>
        <?php
    }else{
        $my_file=$_FILES["my_file"]["tmp_name"];
        $fl_name=$_FILES["my_file"]["name"];
        $word=$_REQUEST["word"];

        if(file_exists($my_file)){
            $handler=file_get_contents($my_file);
            $cant=substr_count($handler,"$word");
            echo "La palabra $word se encuentra $cant veces en el fichero $fl_name";
        }else{
            echo "Archivo no encontrado";
        }


        echo "<br><button onclick=\"window.location.href='Ej11.php';\">Recargar</button>";
    }
    
    ?>
</body>
</html>