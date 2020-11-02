<!-- Realiza un programa que sea capaz de rotar todos los elementos de una
matriz cuadrada una posición en el sentido de las agujas del reloj. La
matriz debe tener 12 filas por 12 columnas y debe contener números 
generados al azar entre 0 y 100. Se debe mostrar tanto la matriz original
como la matriz resultado, ambas con los números convenientemente alineados. -->
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
    td{
        padding:.5em;
    }
    .anillo1{
        background-color:lightblue;    
    }
    .anillo2{
        background-color:lightgreen;
    }
    .anillo3{
        background-color:lightpink;
    }
    .anillo4{
        background-color:Salmon;
    }
    .anillo5{
        background-color:YellowGreen;
    }
    .anillo6{
        background-color:Violet;
    }

    </style>
    <title>Ej15</title>
</head>
<body>
    <?php 
    if(!isset($_REQUEST["ruleta"])){
        ?>
        <table>
            <?php 
                for($i = 0; $i < 12; $i++) {
                    echo "<tr>";
                    for($j = 0; $j < 12; $j++) {
                      $ruleta[$i][$j] = rand(0,100);
                      if($i==0 || $i==11 || $j==0 || $j==11){
                        echo "<td class='anillo1'>". $ruleta[$i][$j]."</td>";
                      }elseif($i==1 || $i==10 || $j==1 || $j==10){
                        echo "<td class='anillo2'>". $ruleta[$i][$j]."</td>";
                      }elseif($i==2 || $i==9 || $j==2 || $j==9){
                        echo "<td class='anillo3'>". $ruleta[$i][$j]."</td>";
                      }elseif($i==3 || $i==8 || $j==3 || $j==8){
                        echo "<td class='anillo4'>". $ruleta[$i][$j]."</td>";
                      }elseif($i==4 || $i==7 || $j==4 || $j==7){
                        echo "<td class='anillo5'>". $ruleta[$i][$j]."</td>";
                      }elseif($i==5 || $i==6 || $j==5 || $j==6){
                        echo "<td class='anillo6'>". $ruleta[$i][$j]."</td>";
                      }
                    }
                    echo "</tr>";
                }        
             ?>
        </table>
            <form action="#" method="post">
            <input type="hidden" name="ruleta" value="<?=base64_encode(serialize($ruleta))?>">
            <input type="submit" value="Girar">
            </form>
        <?php

    }else{

        $ruletaSinRotar=unserialize(base64_decode($_REQUEST["ruleta"]));
        $ruletaRotada=unserialize(base64_decode($_REQUEST["ruleta"]));

        for($capa = 0; $capa < 6; $capa++) {
      
            // rota por arriba
            $aux1 = $ruletaRotada[$capa][11 - $capa];
            for ($i = 11 - $capa; $i > $capa; $i--) {
              $ruletaRotada[$capa][$i] = $ruletaRotada[$capa][$i - 1];
            }
              
            // rota por la derecha
            $aux2 = $ruletaRotada[11 - $capa][11 - $capa];
            for ($i = 11 - $capa; $i > $capa + 1; $i--) {
              $ruletaRotada[$i][11 - $capa] = $ruletaRotada[$i - 1][11 - $capa];
            }
            $ruletaRotada[$capa + 1][11 - $capa] = $aux1;
            
            // rota por abajo
            $aux1 = $ruletaRotada[11 - $capa][$capa];
            for ($i = $capa; $i < 11 - $capa - 1; $i++) {
              $ruletaRotada[11 - $capa][$i] = $ruletaRotada[11 - $capa][$i + 1];
            }
            $ruletaRotada[11 - $capa][11 - $capa - 1] = $aux2;
              
            // rota por la izquierda
            for ($i = $capa; $i < 11 - $capa - 1; $i++) {
              $ruletaRotada[$i][$capa] = $ruletaRotada[$i + 1][$capa];
            }
            $ruletaRotada[11 - $capa - 1][$capa] = $aux1;
      
          } // for capa

          ?>
            <table>
            <caption>Ruleta sin rotar</caption>
                <?php 
                    for($i = 0; $i < 12; $i++) {
                        echo "<tr>";
                        for($j = 0; $j < 12; $j++) {
                            if($i==0 || $i==11 || $j==0 || $j==11){
                              echo "<td class='anillo1'>". $ruletaSinRotar[$i][$j]."</td>";
                            }elseif($i==1 || $i==10 || $j==1 || $j==10){
                              echo "<td class='anillo2'>". $ruletaSinRotar[$i][$j]."</td>";
                            }elseif($i==2 || $i==9 || $j==2 || $j==9){
                              echo "<td class='anillo3'>". $ruletaSinRotar[$i][$j]."</td>";
                            }elseif($i==3 || $i==8 || $j==3 || $j==8){
                              echo "<td class='anillo4'>". $ruletaSinRotar[$i][$j]."</td>";
                            }elseif($i==4 || $i==7 || $j==4 || $j==7){
                              echo "<td class='anillo5'>". $ruletaSinRotar[$i][$j]."</td>";
                            }elseif($i==5 || $i==6 || $j==5 || $j==6){
                              echo "<td class='anillo6'>". $ruletaSinRotar[$i][$j]."</td>";
                            }
                          }
                        echo "</tr>";
                    }        
                 ?>
            </table>
            <br>
            <br>
            <table>
            <caption>Ruleta rotada en sentido de las agujas del reloj</caption>
                <?php 
                    for($i = 0; $i < 12; $i++) {
                        echo "<tr>";
                        for($j = 0; $j < 12; $j++) {
                            if($i==0 || $i==11 || $j==0 || $j==11){
                              echo "<td class='anillo1'>". $ruletaRotada[$i][$j]."</td>";
                            }elseif($i==1 || $i==10 || $j==1 || $j==10){
                              echo "<td class='anillo2'>". $ruletaRotada[$i][$j]."</td>";
                            }elseif($i==2 || $i==9 || $j==2 || $j==9){
                              echo "<td class='anillo3'>". $ruletaRotada[$i][$j]."</td>";
                            }elseif($i==3 || $i==8 || $j==3 || $j==8){
                              echo "<td class='anillo4'>". $ruletaRotada[$i][$j]."</td>";
                            }elseif($i==4 || $i==7 || $j==4 || $j==7){
                              echo "<td class='anillo5'>". $ruletaRotada[$i][$j]."</td>";
                            }elseif($i==5 || $i==6 || $j==5 || $j==6){
                              echo "<td class='anillo6'>". $ruletaRotada[$i][$j]."</td>";
                            }
                          }
                        echo "</tr>";
                    }        
                 ?>
            </table>           
            <br>
            <br>
            <br>
            <br>
            <form action="#" method="post">
            <input type="hidden" name="ruleta" value="<?=base64_encode(serialize($ruletaRotada))?>">
            <input type="submit" value="Volver a girar">
            </form>
          <?php
    }
    ?>
</body>
</html>