<!-- Realiza un programa que vaya pidiendo números hasta que se introduzca
un numero negativo y nos diga cuantos números se han introducido, la media
de los impares y el mayor de los pares . El número negativo sólo se utiliza
para indicar el final de la introducción de datos pero no se incluye
en el cómputo.
 -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ej21</title>
</head>
<body>
    <?php 
    if((!isset($_REQUEST["num"]))||($_REQUEST["num"]>=0)){
        if(!isset($_REQUEST["num"])){
            $avgImpar=0;
            $mayPar=0;
            $cant=0;
            $cantImpar=0;
        }else{
            $num=$_REQUEST["num"];
            $avgImpar=$_REQUEST["avgImpar"];
            $mayPar=$_REQUEST["mayPar"];
            $cant=$_REQUEST["cant"];
            $cantImpar=$_REQUEST["cantImpar"];
            $cant++;
            if($num%2==0){
                $mayPar=($num>$mayPar)?$num:$mayPar;
            }else{
                $avgImpar+=$num;
                $cantImpar++;
            }
        }


        ?>
            <h3>Calcular numeros positivos y negativos [Introducir numero negativo para parar]</h3>
            <br>
            <h4>Numeros introducidos: <?php echo $cant; ?></h4>
            <form action="#" method="post">
                <label>Introduce un Numero:<input type="number" name="num" required autofocus></label>
                <br>
                <input type="hidden" name="avgImpar" value="<?php echo $avgImpar; ?>">
                <input type="hidden" name="mayPar" value="<?php echo $mayPar; ?>">
                <input type="hidden" name="cant" value="<?php echo $cant; ?>">
                <input type="hidden" name="cantImpar" value="<?php echo $cantImpar; ?>">
                <input type="submit" value="Introducir">
            </form>
        <?php
    }else{
        $num=$_REQUEST["num"];
        $avgImpar=$_REQUEST["avgImpar"];
        $mayPar=$_REQUEST["mayPar"];
        $cant=$_REQUEST["cant"];
        $avgImpar/=$cant;
        echo "Media Impar: $avgImpar<br>";
        echo "Mayor Par: $mayPar<br>";
        echo "<button onclick='window.location.href=\"Ej21.php\";'>Introducir otros valores</button>";
    }
    ?>
</body>
</html>