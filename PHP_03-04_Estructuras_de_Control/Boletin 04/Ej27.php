<!-- Escribe un programa que muestre, cuente y sume los múltiplos de 3 que
 hay entre 1 y un número leído por teclado. -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ej27</title>
</head>
<body>
    <h3>Cuenta y suma los múltiplos de 3 que hay entre 1 y un número leído por teclado.</h3>
    <?php 
    if(!isset($_REQUEST["num"])){
        ?>
            <form action="#" method="post">
                <label>Numero: <input type="number" name="num" require></label>
                <br>
                <input type="submit" value="Calcular">
            </form>
        <?php
    }else{
        $num=$_REQUEST["num"];
        $count=0;
        $sum=0;
        for ($i=1; $i <=$num ; $i++) { 
            $count+=($i%3==0)?1:0;
            $sum+=($i%3==0)?$i:0;
        }
        echo "Rango de numero [1-$num]<br>";
        echo "Cantidad de multiplos de 3: $count<br>";
        echo "Suma de multiplos de 3: $sum<br>";
        echo "<br><button onclick='window.location.href=\"Ej27.php\";'>Nueva piramide</button>";
    }
    ?>
</body>
</html>