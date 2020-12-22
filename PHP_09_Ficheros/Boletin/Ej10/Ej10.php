<!-- Realiza un programa que sea capaz de ordenar alfabéticamente 
las palabras contenidas en un fichero de texto. El nombre del 
fichero que contiene las palabras se debe pasar a través de un
formulario. El nombre del fichero resultado debe ser el mismo 
que el original añadiendo la coletilla sort, por ejemplo 
palabras_sort.txt. Suponemos que cada palabra ocupa una línea. -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ej10</title>
</head>

<body>
    <?php 
if(!isset($_FILES["my_file"])){
    ?>
    <form action="#" method="post" enctype="multipart/form-data">
        <label for="my_file">Introduzca archivo a ordenar:
            <input type="file" name="my_file" id="my_file" required>
        </label>
        <br>
        <input type="submit" value="Ordenar">
    </form>
    <?php
}else{

    $my_file=$_FILES["my_file"]["tmp_name"];

    $aux=pathinfo($_FILES["my_file"]["name"]);
    $fl_name=$aux["filename"]."_sort.txt";

    $rowArray=file($my_file);

    sort($rowArray,SORT_STRING);

    $open=fopen($fl_name,"w");
    fwrite($open,implode(" ",$rowArray));
    fclose($open);
    echo "<h1>Listo archivo $fl_name creado</h1>";
    echo "<button onclick=\"window.location.href='Ej10.php';\">Reiniciar</button>";

}

?>
</body>

</html>