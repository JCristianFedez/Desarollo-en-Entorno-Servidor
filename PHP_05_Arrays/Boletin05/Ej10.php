<!-- Realiza un programa que escoja al azar 10 cartas de la baraja española
y que diga cuántos puntos suman según el juego de la brisca. Emplea un 
array asociativo para obtener los puntos a partir del nombre de la figura 
de la carta. Asegúrate de que no se repite ninguna carta, igual que si las
hubieras cogido de una baraja de verdad -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ej10</title>
</head>
<body>
    <?php 
     $puntos = array (
        'uno' => 11, 'dos' => 0, 'tres' => 10, 'cuatro' => 0, 'cinco' => 0,
        'seis' => 0, 'siete' => 0, 'sota' => 2, 'caballo' => 3, 'rey' => 4);
   
    $palo = array ('oro', 'copa', 'basto', 'espada');

    $numero = array ('uno', 'dos', 'tres', 'cuatro', 'cinco', 'seis', 'siete', 'sota', 'caballo', 'rey');

    $misCartas[0]="";
    $cont=0;
    $puntosTotales=0;
    do{

        $paloMiCarta=$palo[rand(0,3)];
        $numeroMiCarta=$numero[rand(0,8)];
        $puntoMiCarta=$puntos[$numeroMiCarta];
        $nombreMiCarta="$numeroMiCarta de $paloMiCarta puntos $puntoMiCarta";
        if(!in_array($nombreMiCarta,$misCartas)){
            $misCartas[$cont]=$nombreMiCarta;
            $cont++;
            $puntosTotales+=$puntoMiCarta;
        }
    }while(count($misCartas)<10);
    echo "<h3>Mis cartas</h3>";
    foreach ($misCartas as $value) {
        echo "$value<br>";
    }
    echo "Puntos totales: $puntosTotales";
?>
<br>
<button onclick="window.location.href='Ej10.php'">Nueva mano</button>
</body>
</html>