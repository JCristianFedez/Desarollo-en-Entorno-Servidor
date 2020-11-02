<!-- Escribe un programa que diga cuál es la primera cifra 
de un número entero introducido por teclado.
Se permiten números de hasta 5 cifras.
 -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ej17</title>
</head>
<body>
    <center>
    <?php 
    if(!isset($_GET["num"])){

        ?>
            <form action="#" method="get">
        <label>Numero: <input type="number" name="num" require></label>
        <br>
        <input type="submit" value="Calcular">
        </form>
        <?php

    }else{
        $num=$_GET["num"];
        
        $primeraCifra=substr($num, 0,1);
        echo "La primera cifra de $num es $primeraCifra";
        echo "<br><button onclick='window.history.go(-1)'>Introducir otro numero</button>";
    }
     ?>
     </center>
</body>
</html>