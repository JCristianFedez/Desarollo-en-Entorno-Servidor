<!-- Realiza un programa que nos diga cuántos dígitos tiene un número 
introducido por teclado.
 -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ej09</title>
</head>
<body>
    <?php 
    if(!isset($_REQUEST["num"])){
        ?>
        <h3>Introduzca un numero y se le dira cuantos digitos tiene</h3>
        <form action="#" method="post">
            <label>Numero: <input type="number" name="num" require></label>
            <br>
            <input type="submit" value="Calcular">
        </form>
        <?php
    }else{
        $num=$_REQUEST["num"];
        $numNatural=abs($num);
        echo "$num tiene ".strlen($numNatural)." digitos";
        echo "<br>";
        echo "<button onclick='window.history.go(-1);'>Otro numero</button>";
    }
    ?>
</body>
</html>