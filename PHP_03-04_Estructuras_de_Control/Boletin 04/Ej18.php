<!-- Escribe un programa que obtenga los números enteros comprendidos 
entre dos números introducidos por teclado y validados como distintos, 
el programa debe empezar por el menor de los enteros introducidos e 
ir incrementando de 7 en 7.
 -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ej18</title>
</head>
<body>
    <h3>Numeros comprendidos entre n1 y n2 con diferencia de 7</h3>
    <?php 
    if((!isset($_REQUEST["n1"]))||(!isset($_REQUEST["n2"])||($_REQUEST["n1"]==$_REQUEST["n2"]))){
        if(isset($_REQUEST["n1"])&&isset($_REQUEST["n2"])&&($_REQUEST["n1"]==$_REQUEST["n2"])){
            echo "<h2>Los dos numeros no pueden ser iguales</h2>";
        }
        ?>
        <form action="#" method="post">
            <label>Introduce un Numero:<input type="number" name="n1" required></label>
            <br>
            <label>Introduce un Numero:<input type="number" name="n2" required></label>
            <br>
            <input type="submit" value="Calcular">
        </form>
        <?php
    }else{
        $n1=$_REQUEST["n1"];
        $n2=$_REQUEST["n2"];
        echo "Numero 1= $n1,    Numero 2=$n2<br>";
        for ($i=$n1; $i < $n2; $i+=7) { 
            echo "$i, ";
        }
        echo "<br><button onclick='window.location.href=\"Ej18.php\"'>Otros numeros</button>";
    }
    ?>
</body>
</html>