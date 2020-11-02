<!-- Rellena un array bidimensional de 6 filas por 9 columnas con números 
enteros positivos comprendidos entre 100 y 999 (ambos incluidos). Todos
los números deben ser distintos, es decir, no se puede repetir ninguno.
Muestra a continuación por pantalla el contenido del array de tal forma 
que se cumplan los siguientes requisitos:
• Los números de las dos diagonales donde está el mínimo deben aparecer
en color verde.
• El mínimo debe aparecer en color azul.
• El resto de números debe aparecer en color negro. -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
    .minimo{
        color:blue;
        font-weight:bolder;
        background-color:lightblue;
    }
    .minDiagonal{
        color:green;
        font-weight:bolder;
        background-color:lightgreen;
    }
    table,td{
        border:1px solid black;
        border-collapse:collapse;
    }
    td{
        padding:1em;
    }
    </style>
    <title>Ej13</title>
</head>
<body>
    <?php 
    for ($i=100; $i <= 999; $i++) { 
        $arrayAleatorio[]=$i;
    }
    $minValue=PHP_INT_MAX;
    $rowMin;
    $colMin;
    for ($i=0; $i < 6; $i++) { 
        for ($j=0; $j < 9; $j++) { 
            $indiceAleatorio=rand(0,(count($arrayAleatorio)-1));
            $miArray[$i][$j]=$arrayAleatorio[$indiceAleatorio];
            array_splice($arrayAleatorio,$indiceAleatorio,1);//Eliminamos el numero introducido
        
            if($minValue>$miArray[$i][$j]){
                $minValue=$miArray[$i][$j];
                $rowMin=$i;
                $colMin=$j;
            }
        }
    }

    
    ?>
    <table>
        <?php 
            for ($i=0; $i < count($miArray); $i++) { 
                echo "<tr>";
                for ($j=0; $j < count($miArray[$i]); $j++) { 
                    if($miArray[$i][$j]==$minValue){
                        echo "<td class='minimo'>".$miArray[$i][$j]."</td>";
                    }else if(abs((abs($i)-abs($rowMin)))==abs((abs($j)-abs($colMin)))){//Calcular ambas diagonales
                        echo "<td class='minDiagonal'>".$miArray[$i][$j]."</td>";

                    }else{
                        echo "<td>".$miArray[$i][$j]."</td>";
                    }
                }
                echo "</tr>";
            }
        ?>
    </table>
</body>
</html>