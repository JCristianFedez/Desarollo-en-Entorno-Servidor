<!-- Escribe un programa que, dada una posición en un tablero de ajedrez, 
nos diga a qué casillas podría saltar un alfil que se encuentra en esa
posición. Indícalo de forma gráfica sobre el tablero con un color diferente
para estas casillas donde puede saltar la figura. El alfil se mueve siempre
en diagonal.

El tablero cuenta con 64 casillas. Las columnas se indican con las letras
de la “a” a la “h” y las filas se indican del 1 al 8. -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
    table,td{
        border:1px solid black;
        border-collapse:collapse;
    }
    body{
        text-align:center;
    }
    table{
        margin:auto;
        margin-top:2em;
    }
    td{
        padding:1em;
    }
    th{
        background-color:brown;
    }
    .alfil{
        background-color:red;
    }

    .posPosible{
        background-color:green;
    }
    .negro{
        background-color:black;
    }
    .blanco{
        background-color:white;
    }
    </style>
    <title>Ej14</title>
</head>
<body>
<h1 style="text-align: center;">Alfil</h1>
    <?php 
            $alfilPosicionado=false;
            $filaAlfil=-1;
            $columnaAlfil=-1;
        if(!isset($_REQUEST["row"])||!isset($_REQUEST["col"])){
            ?>
                <form action="#" method="post">
                    <label>Fila: <input type="number" name="row" min=1 max=8 require></label>
                    <br>
                    <label>Columna: <input type="text" name="col" pattern="[A-H a-h]" require></label>
                    <br>
                    <input type="submit" value="Calcular movimientos">
                </form>
            <?php
        }else{
            $LETRAS=["","a","b","c","d","e","f","g","h"];
            $alfilPosicionado=true;
            $filaAlfil=$_REQUEST["row"];
            $columnaAlfilLetra=mb_strtolower($_REQUEST["col"]);
            $columnaAlfil=array_search($columnaAlfilLetra,$LETRAS);
        }
        ?>
    <table>
        <?php 
        $blanco=true;
        ?>
        <thead>
            <tr>
                <th></th>
                <th>a</th>
                <th>b</th>
                <th>c</th>
                <th>d</th>
                <th>e</th>
                <th>f</th>
                <th>g</th>
                <th>h</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php
            for ($i=1; $i <= 8; $i++) { 
                echo "<tr><th>$i</th>";
                for ($j=1; $j <= 8; $j++) { 
                    if ($alfilPosicionado) {
                        if ($filaAlfil==$i && $columnaAlfil==$j) {
                            echo "<td class='alfil'></td>";
                        } elseif (abs((abs($i)-abs($filaAlfil)))==abs((abs($j)-abs($columnaAlfil)))) {//Calcular ambas diagonales
                            echo "<td class='posPosible'></td>";
                        } else {
                            $class=($blanco)?"blanco":"negro";
                            echo "<td class='$class'></td>";
                        }
                    }else{
                        $class=($blanco)?"blanco":"negro";
                        echo "<td class='$class'></td>";
                    }
                    $blanco=!$blanco;
                }
                $blanco=!$blanco;
                echo "<th>$i</th></tr>";
            }
        ?>
        </tbody>
        <tfoot>
            <tr>
                <th></th>
                <th>a</th>
                <th>b</th>
                <th>c</th>
                <th>d</th>
                <th>e</th>
                <th>f</th>
                <th>g</th>
                <th>h</th>
                <th></th>
            </tr>
        </tfoot>        
    </table>
    <br>
    <br>
    <?php 
    if($alfilPosicionado){
        echo "Fila $filaAlfil, Columna: $columnaAlfilLetra<br>";
        echo "<button onclick='window.location.href=\"Ej14.php\"'>Nueva posicion</button>";
    }
    
    ?>
</body>
</html>