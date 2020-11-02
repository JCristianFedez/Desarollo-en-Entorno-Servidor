<!-- Escribe un programa que lea una lista de diez números y determine 
cuántos son positivos, y cuántos son negativos.
 -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ej13</title>
</head>
<body>
<h3>Se pediran 10 numeros y se dira cuantos son positivos y cuantos negativos</h3>
    <?php 
        if(!isset($_REQUEST["num"])||$_REQUEST["count"]<10){
            if(!isset($_REQUEST["count"])){
                $count=0;
                $negativos=0;
                $positivos=0;
            }else{
                $num=$_REQUEST["num"];
                $count=$_REQUEST["count"];
                $count++;
                $negativos=$_REQUEST["negativos"];
                $positivos=$_REQUEST["positivos"];
                $negativos+=($num<0)?1:0;
                $positivos+=($num>=0)?1:0;
            }
                echo "<h4>Numeros restantes ".(10-$count)."</h4>"
            ?>
                <form action="#" method="post">
                    <label>Introduzca numero: <input type="number" name="num" required autofocus></label>
                    <input type="hidden" name="count" value="<?php echo $count; ?>">
                    <input type="hidden" name="negativos" value="<?php echo $negativos; ?>">
                    <input type="hidden" name="positivos" value="<?php echo $positivos; ?>">
                    <br>
                    <input type="submit" value="Siguiente">
                </form>
            <?php
        }else{
            $negativos=$_REQUEST["negativos"];
            $positivos=$_REQUEST["positivos"];
            echo "Se han introducido $negativos numeros negativos y $positivos numeros positivos";
            echo "<br><button onclick='window.location.href=\"Ej13.php\"'>Introducir otros numeros</button>";
        }
    ?>
</body>
</html>