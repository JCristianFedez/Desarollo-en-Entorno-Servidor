<!-- Muestra los números múltiplos de 5 de 0 a 100 utilizando un bucle while.
 -->
 <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ej01</title>
</head>
<body>
    <?php 
    $serie=5;
    $i=0;
    while ($i<=100) {
        echo "$serie x $i = ".($serie*$i);
        $i++;
        echo "<br>";
    }

    
    ?>
</body>
</html>