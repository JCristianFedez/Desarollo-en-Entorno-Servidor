<!-- Escribe un programa que genere 20 números enteros aleatorios entre 
0 y 100 y que los almacene en un array. El programa debe ser capaz de 
pasar todos los números pares a las primeras posiciones del array
(del 0 en adelante) y todos los números impares a las celdas restantes. 
Utiliza arrays auxiliares si es necesario. -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ej07</title>
</head>
<body>
    <?php 
         $arraySize=20;
         for ($i=0; $i < $arraySize; $i++) { 
             $miArray[$i]=rand(0,100);
         }
         echo "<h3>Array sin ordenar</h3>";
         foreach ($miArray as $value) {
             echo "$value -";
         }
         echo "<br><br>";

         for ($i=0; $i < count($miArray); $i++) { 
            if($miArray[$i]%2==0){
               array_unshift($miArray,$miArray[$i]);
               unset($miArray[$i]);//Elimino el elemento que se a pasado a primer lugar

            }
        }

         echo "<h3>Array ordenado</h3>";
         foreach ($miArray as $value) {
             echo "$value -";
         }

    ?>
</body>
</html>
