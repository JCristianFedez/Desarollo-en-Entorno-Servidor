<!-- Una función (tipo procedimiento, no hay valor devuelto) 
denominada escribirTresNumeros que reciba
tres números enteros como parámetros y proceda a 
escribir dichos números en tres líneas en un archivo
denominado datosEjercicio.txt. Si el archivo no existe, 
debe crearlo.  -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ej01</title>
</head>
<body>
    <form action="#" method="post">
    <label for="linea1">Linea 1: 
    <input type="text" name="linea1" id="linea1" required></label>
    <br>
    <label for="linea2">Linea 2: 
    <input type="text" name="linea2" id="linea2" required></label>
    <br>
    <label for="linea3">Linea 3: 
    <input type="text" name="linea3" id="linea3" required></label>
    <br>
    <input type="submit" value="Escribir">
    </form>

<?php if (isset($_REQUEST["linea1"])
&&isset($_REQUEST["linea2"])
&&isset($_REQUEST["linea3"])) {
    $lineas[]=$_REQUEST["linea1"];
    $lineas[]=$_REQUEST["linea2"];
    $lineas[]=$_REQUEST["linea3"];

    escribirTresNumeros($lineas);
}

function escribirTresNumeros($lineas){
    $myArchivo=fopen("myArchivo.txt","w");

    foreach($lineas as $thisLinea){
        fwrite($myArchivo,$thisLinea.PHP_EOL);
    }

    fclose($myArchivo);
}
 ?>
</body>
</html>