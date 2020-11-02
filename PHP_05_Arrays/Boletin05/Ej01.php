<!-- Define tres arrays de 20 números enteros cada una, con nombres “numero”
, “cuadrado” y “cubo”. Carga el array “numero” con valores aleatorios entre
0 y 100. En el array “cuadrado” se deben almacenar los cuadrados de los
valores que hay en el array “numero”. En el array “cubo” se deben almacenar
los cubos de los valores que hay en “numero”. A continuación, muestra el 
contenido de los tres arrays dispuesto en tres columnas -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
    td,table,th{
        border:1px solid black;
        border-collapse:collapse;
        padding:.5em;
    }
    </style>
    <title>Ej01</title>
</head>
<body>
    <?php 
    for ($i=0; $i < 20; $i++) { 
        $numero[$i]=rand(0,100);
        $cuadrado[$i]=pow($numero[$i],2);
        $cubo[$i]=pow($numero[$i],3);
    }
     ?>
     <table>
     <thead>
        <tr>
            <th>Numero</th><th>Cuadrado</th><th>Cubo</th>
        </tr>
     </thead>
     <tbody>
        <?php     
        for ($i=0; $i < count($numero); $i++) { 
            echo "<tr>";
            echo "<td>$numero[$i]</td>";
            echo "<td>$cuadrado[$i]</td>";
            echo "<td>$cubo[$i]</td>";
            echo "</tr>";
        } 
        ?>
     </tbody>
     </table>
</body>
</html>