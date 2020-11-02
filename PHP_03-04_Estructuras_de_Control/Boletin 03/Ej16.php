<!-- Escribe un programa que diga cuál es la última cifra de 
un número entero introducido por teclado.
 -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ej16</title>
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
        $ultimaCifra=$num%10;
        echo "La ultima cifra de $num es $ultimaCifra";
        echo "<br><button onclick='window.history.go(-1)'>Introducir otro numero</button>";
    }
    ?>
    </center>
</body>
</html>