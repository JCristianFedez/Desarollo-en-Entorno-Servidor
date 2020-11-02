<!-- Escribe un programa que diga si un número introducido por teclado 
es o no primo. Un número primo es aquel que sólo es divisible entre 
él mismo y la unidad. -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ej16</title>
</head>
<body>
<h3>Es Primo</h3>
    <?php 
    if(!isset($_REQUEST["num"])){
        ?>
        <form action="#" method="post">
            <label>Introduce un Numero:<input type="number" name="num" required min=0></label>
            <br>
            <input type="submit" value="Calcular">
        </form>
        <?php

    }else{
        $num=$_REQUEST["num"];
        $primo=($num<=2)?false:true;
        if($primo){
            for ($i=2; $i < $num; $i++) { 
                if($num%$i==0){
                    $primo=false;
                    $i=$num;
                }
            }
        }

        $esPrimo=($primo)?"es primo":"no es primo";
        echo "El numero $num $esPrimo";
        echo "<br><button onclick='window.location.href=\"Ej16.php\"'>Comprobar otro numero</button>";
    }
    ?>
</body>
</html>