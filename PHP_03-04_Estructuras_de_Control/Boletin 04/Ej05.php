<!-- Muestra los números del 320 al 160, contando de 20 en 20 
utilizando un bucle while.
 -->
 <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ej04</title>
</head>
<body>
    <?php 
    $i=320;
    while ($i >=160) {
        echo "$i -";
        $i-=20;
    }

     ?>
</body>
</html>