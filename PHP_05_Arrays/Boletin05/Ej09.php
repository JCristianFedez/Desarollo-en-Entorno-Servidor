<!-- Realiza un programa que pida 10 números por teclado y que los almacene
en un array. A continuación se mostrará el contenido de ese array junto al
índice (0 – 9). Seguidamente el programa pedirá dos posiciones a las que 
llamaremos “inicial” y “final”. Se debe comprobar que inicial es menor que
final y que ambos números están entre 0 y 9. El programa deberá colocar
el número de la posición inicial en la posición final, rotando el resto 
de números para que no se pierda ninguno. Al final se debe mostrar el array resultante.
Por ejemplo:
Array inicial
0 1 2 3 4 5 6 7 8 9
20 5 7 4 32 9 2 14 11 6 
Posición inicial: 3
Posición final: 7
Array final
0 1 2 3 4 5 6 7 8 9
6 20 5 7 32 9 2 4 14 11
-->
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
    <title>Ej09</title>
</head>
<body>
    <?php 
            if(!isset($_REQUEST["nums"])){//Peticion 10 numeros
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
            }else{//Petition inicio y final 
                $nums=$_REQUEST["nums"];
                if(!is_array($nums)){//Para saber si se a pasado con explode o con el primer formulario
                    $nums=explode(",",$_REQUEST["nums"]);
                }


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
                if ((!isset($_REQUEST["posInicial"])||!isset($_REQUEST["posFinal"]))) {//Petition inicio y final 
                    ?>
                
                <form action="#" method="post">
                    <label>Posicion Inicial: <input type="number" name="posInicial" required min=0 max=9></label>
                    <br>
                    <label>Posicion Final: <input type="number" name="posFinal" required min=0 max=9></label>
                    <br>
                    <input type="hidden" name="nums" value="<?=implode(',', $nums)?>">
                    <input type="submit" value="Enviar">
                </form>
                <?php
                }else{
                    if($_REQUEST["posInicial"]>$_REQUEST["posFinal"]){//Si la posicion inicial es mayor a la final avisamos y volvemos una vez atras
                        echo "<script>
                        alert('La posicion inicial no puede ser mayor a la final');
                        window.history.go(-1);
                        </script>";
        
                    }
                    //Rotar e imprimir
                    $nums=explode(",",$_REQUEST["nums"]);
                    $posInicial=$_REQUEST["posInicial"];
                    $posFinal=$_REQUEST["posFinal"];
                    echo "Posicion inicial: $posInicial<br>";
                    echo "Posicion Final: $posFinal";

                        // Rotación

                    // Primer tramo
                    $auxiliar = $nums[9];
                    for ($i = 9; $i > $posFinal; $i--) {
                      $nums[$i] = $nums[$i - 1];
                    }
                    $nums[$posFinal] = $nums[$posInicial];
                
                    // Segundo tramo
                    for ($i = $posInicial; $i > 0; $i--) {
                      $nums[$i] = $nums[$i - 1];
                    }
                    $nums[0] = $auxiliar;


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
            }


    ?>
</body>
</html>