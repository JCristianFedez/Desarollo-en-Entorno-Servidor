<!-- Muestra los números múltiplos de 5 de 0 a 100 utilizando un bucle for.
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
    for ($i=0; $i <= 100; $i++) { 
        echo "$serie x $i = ".($serie*$i);
        echo "<br>";
    }
    ?>
</body>
</html>