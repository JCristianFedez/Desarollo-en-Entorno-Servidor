<!-- Escribe un programa que pida 10 números por teclado y que luego
muestre los números introducidos junto con las palabras “máximo” y 
“mínimo” al lado del máximo y del mínimo respectivamente. -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
    td,table,th{
        border:1px solid black;
        border-collapse:collapse;
        padding:.5em;
    }
    </style>
    <title>Ej02</title>
</head>
<body>
<?php 
    if(!isset($_REQUEST["num"])){
        ?>
            <form action="#" method="post">
        <?php 
            for ($i=1; $i <= 10; $i++) { 
                echo "<label>Numero $i: <input type='number' require name='num[$i]'> </label>
                      <br>";
            }
        ?>
            <input type="submit" value="Enviar">
        </form>
        <?php
    }else{
        $num=$_REQUEST["num"];
        echo "<table>";
        echo "<thead><tr><th>Numeros</th><th>Limites</th></tr></thead>";
        foreach ($num as $value) {
            $auxMin=($value==min($num))?"Minimo":"";
            $auxMax=($value==max($num))?"Maximo":"";
            echo "<tr><td>$value</td><td>$auxMin $auxMax</td></tr>";
        }
        echo "</table>";
    }
 ?>
    
</body>
</html>