<!-- Escribe un programa que utilice las variables $x y $y. Asignales los valores 144 y 999 respectivamente. A continuación, muestra por pantalla el valor de cada variable, la suma, la resta, la división
y la multiplicación. -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ej05</title>
</head>
<body>
    <center>
    <?php
    $x=144;
    $y=999;
    echo "X=$x  Y=$y";
    echo "<br>X + Y = ".($x+$y);
    echo "<br>X - Y = ".($x-$y);
    echo "<br>X * Y = ".($x*$y);
    echo "<br>X / Y = ".($x/$y);

    ?></center>
</body>
</html>