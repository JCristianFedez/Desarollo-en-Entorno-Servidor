<!-- Escribe un programa que permita ir introduciendo una serie 
indeterminada de números hasta que la suma de ellos supere el valor 10000.
Cuando esto último ocurra, se debe mostrar el total acumulado, el contador
de los números introducidos y la media.
 -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ej23</title>
</head>
<body>
<?php 
    if((!isset($_REQUEST["num"]))||($_REQUEST["sum"]<=10000)){
        if(!isset($_REQUEST["num"])){
            $cant=0;
            $sum=0;
        }else{
            $num=$_REQUEST["num"];
            $cant=$_REQUEST["cant"];
            $sum=$_REQUEST["sum"];
            $sum+=$num;
            $cant++;

        }


        ?>
            <h3>Calcular suma total mientras que sea inferior a 10000 el resultado <?php echo "Numeros introducidos=$cant"; ?></h3>
            <br>
            <h4>Numeros introducidos: <?php echo $cant; ?></h4>
            <form action="#" method="post">
                <label>Introduce un Numero:<input type="number" name="num" required autofocus></label>
                <br>
                <input type="hidden" name="cant" value="<?php echo $cant; ?>">
                <input type="hidden" name="sum" value="<?php echo $sum; ?>">
                <input type="submit" value="Introducir">
            </form>
        <?php
    }else{
        $num=$_REQUEST["num"];
        $cant=$_REQUEST["cant"];
        $sum=$_REQUEST["sum"];
        $sum+=$num;
        $avg=$sum/$cant;
        $avg=round($avg,2);
        echo "Suma total: $sum<br>";
        echo "Total de numeos introducidos; $cant<br>";
        echo "Promedio: $avg<br>";
        echo "<button onclick='window.location.href=\"Ej23.php\";'>Introducir otros valores</button>";
    }
    ?>
</body>
</html>