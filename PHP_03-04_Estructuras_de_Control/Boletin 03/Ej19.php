<!-- Realiza un programa que diga si un número entero 
positivo introducido por teclado es capicúa. Se
permiten números de hasta 5 cifras. -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ej19</title>
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
        $numRev=strrev(abs($num));
        if(abs($num)==$numRev){
            echo "El numero $num es capicua";
        }else{
            echo "El numero $num no es capicua";

        }
        echo "<br><button onclick='window.history.go(-1)'>Introducir otro numero</button>";
    }
     ?>
    </center>
</body>
</html>