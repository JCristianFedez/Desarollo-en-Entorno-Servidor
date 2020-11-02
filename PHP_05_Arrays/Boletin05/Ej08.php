<!-- Realiza un programa que pida 10 números por teclado y que los almacene
en un array. A continuación se mostrará el contenido de ese array junto 
al índice (0 – 9) utilizando para ello una tabla. Seguidamente el programa
pasará los primos a las primeras posiciones, desplazando el resto
de números (los que no son primos) de tal forma que no se pierda ninguno.
Al final se debe mostrar el array resultante.
Por ejemplo:
Array inicial
0 1 2 3 4 5 6 7 8 9
20 5 7 4 32 9 2 14 11 6
Array final
0 1 2 3 4 5 6 7 8 9
5 7 2 11 20 4 32 9 14 6 -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
    td,th{
        padding:.5em;
    }
    th{
        border-bottom:1px solid black;
    }
    </style>
    <title>Ej08</title>
</head>
<body>
    <?php 
    if(!isset($_REQUEST["nums"])){
        $cantNums=10;
        ?>
        <form action="#" method="post">
            <?php 
                for ($i=0; $i <$cantNums ; $i++) { 
                    echo "<label>Numero $i: <input type='number' name='nums[]' required></label>";
                    echo "<br>";
                }
            ?>
            <input type="submit" value="Enviar">
        </form>
        <?php
    }else{
        $nums=$_REQUEST["nums"];

        echo "<h3>Array Inicial</h3>";
        echo "<table>";
            echo "<thead>";
                echo "<tr>";
                    for ($i=0; $i < count($nums); $i++) { 
                        echo "<th>$i</th>";
                    }
                echo "</tr>";
            echo "</thead>";
            echo "<tbody>";
                echo "<tr>";
            foreach ($nums as $value) {
                echo "<td>$value</td>";
            }
                echo "</tr>";
            echo "</tbody>";
        echo "</table>";

            for ($i=0; $i < count($nums); $i++) { 
                $esPrimo=true;
                for ($j=2; $j < $nums[$i]; $j++) { 
                    if($nums[$i]%$j==0){
                        $esPrimo=false;
                        $j=$nums[$i];
                    }
                }
                if($esPrimo){
                   array_unshift($nums,$nums[$i]);
                   unset($nums[$i]);//Elimino el elemento que se a pasado a primer lugar
                }
            }
        
        echo "<h3>Array Final</h3>";
        echo "<table>";
            echo "<thead>";
                echo "<tr>";
                    for ($i=0; $i < count($nums); $i++) { 
                        echo "<th>$i</th>";
                    }
                echo "</tr>";
            echo "</thead>";
            echo "<tbody>";
                echo "<tr>";
            foreach ($nums as $value) {
                echo "<td>$value</td>";
            }
                echo "</tr>";
            echo "</tbody>";
        echo "</table>";

    }
    ?>
</body>
</html>