<!-- Escribe un programa que calcule la media de un conjunto de números 
positivos introducidos por teclado. A priori, el programa no sabe cuántos
números se introducirán. El usuario indicará que ha terminado de introducir
los datos cuando meta un número negativo.
 -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ej10</title>
</head>
<body>
    <h3>Calcular Media</h3>
    <h4>Para dejar de introducir numeros introduzca un numero negativos</h4>
    <?php 
    if(!isset($_REQUEST["num"])){
        $numIntroducidos=0;
        if(!isset($_REQUEST["avg"])){
            $avg=0;
        }else{
            $avg=$_REQUEST["avg"];
        }
        ?>
    <h4>Numeros introducidos = <?php echo $numIntroducidos; ?></h4>
    <form action="#" method="post">
        <label>Introduce el nuemero: <input type="number" name="num"require></label>
        <br>
        <input type="hidden" name="avg" value="<?php echo $avg; ?>">
        <input type="hidden" name="numIntroducidos" value="<?php echo $numIntroducidos; ?>">
        <input type="submit" value="Calcular">
    </form>

        <?php
    }else{
        $num=$_REQUEST["num"];
        $avg=$_REQUEST["avg"];
        $numIntroducidos=$_REQUEST["numIntroducidos"];
        if ($num>=0) {
            $avg+=$num;
            $numIntroducidos++;
            ?>
        <h4>Numeros introducidos = <?php echo $numIntroducidos; ?></h4>
        <form action="#" method="post">
            <label>Introduce el nuemero: <input type="number" name="num"require></label>
            <br>
            <input type="hidden" name="avg" value="<?php echo $avg; ?>">
            <input type="hidden" name="numIntroducidos" value="<?php echo $numIntroducidos; ?>">
            <input type="submit" value="Calcular">
        </form>
        <?php
        }else{
            $avg/=$numIntroducidos;
            echo "<h3>El promedio de los numeros introducidos es $avg</h3>";
        }
    }
    ?>
</body>
</html>