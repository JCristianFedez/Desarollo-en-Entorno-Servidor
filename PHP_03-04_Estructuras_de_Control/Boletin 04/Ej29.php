<!-- Escribe un programa que muestre por pantalla todos los números enteros
positivos menores a uno leído por teclado que no sean divisibles entre otro
también leído de igual forma. -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ej29</title>
</head>
<body>
    <h3>Numeros enteros menores a n y no divisibles entre x</h3>
<?php 
    if((!isset($_REQUEST["num"]))||(!isset($_REQUEST["num"]))){
        ?>
            <form action="#" method="post">
                <label>Numero limite superior: <input type="number" name="num" require></label>
                <br>
                <label>No divisibles por : <input type="number" name="div" require></label>
                <br>
                <input type="submit" value="Calcular">
            </form>
        <?php
    }else{
        $num=$_REQUEST["num"];
        $div=$_REQUEST["div"];
        $numbers="";
        for ($i=0; $i < $num; $i++) { 
            $numbers.=($i%$div!=0)?"$i,":"";
        }
        echo "Rango [0-$num]<br>";
        echo "Numeros no divisibles a $div dentro del rango : $numbers<br>";
        echo "<br><button onclick='window.location.href=\"Ej29.php\";'>Nuevos numeros</button>";
    }
    ?>
</body>
</html>