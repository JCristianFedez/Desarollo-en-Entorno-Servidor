<!-- Crear una página que permita generar un archivo de 
texto con las líneas que se vallan escribiendo a
través de un formulario de manera indefinida, hasta 
que se pulse un botón terminar, y a continuación
mostrar el contenido del fichero completo en la página. -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ej08</title>
</head>

<body>
    <?php 
if(!isset($_REQUEST["fl-name"])){

?>
    <form action="#" method="post">
        <label for="fl-name">Nombre del archivo:
            <input type="text" name="fl-name" id="fl-name" required>
        </label>
        <br><br>
        <label for="fl-content">Contenido del archivo:</label><br>
        <textarea name="fl-content" id="fl-content" cols="30" rows="10" required></textarea>
        <br>
        <input type="submit" value="Crear">
    </form>
    <?php

}else{

    $fl_name=$_REQUEST["fl-name"];
    $fl_content=$_REQUEST["fl-content"];
    $open=fopen($fl_name,"w+");
    fwrite($open,$fl_content);

    rewind($open);//Vuelvo la principio del fichero

    while(!feof($open)){
        $linea= fgets($open);
        echo "$linea <br>";
    }

    fclose($open);
    echo "<br>";
    echo "<button onclick=\"window.location.href='Ej08.php';\">Reiniciar</button>";

}


?>
</body>

</html>