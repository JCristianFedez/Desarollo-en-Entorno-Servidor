<!-- Diseñar una web para jugar a la lotería primitiva. En un formulario se pedirá introducir la
combinación de 6 números entre 1 y 49 y el numero de serie entre 1 y 999. Mostrar la
combinación generada y la introducida por el usuario en dos filas de una tabla, para que
compruebe los aciertos. 
  -->

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="style.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ej02</title>
</head>
<body>
<center>
    <div class="container">  
        <?php
        if ((!isset($_GET["numero"]))||(!isset($_GET["serie"]))) {
            ?>
                <div id="formulario">
                    <form action="#" method="get">
                        <h1>Loteria</h1>
                        <h4>Introduze tu numero del boleto y el numero de serie</h4>
                            <?php
                                for ($i=1; $i < 7; $i++) { //Imprime 6 veces el input para meter el numero
                                    echo '<input placeholder="Nº'.$i.' [1-49]" type="number" name="numero[]" tabindex="'.$i.'" min="1" max="49" required>';
                                }
                            ?>
                                                   
                            <input placeholder="Nº Serie [1-999]" type="number" name="serie" tabindex="7" min="1" max="999" required>
                            
                        <fieldset>
                            <input name="submit" type="submit" value="Comprobar">
                        </fieldset>
                        
                    </form>
                </div>
            <?php
        } else {
            $numero=$_GET["numero"];
            $serie=$_GET["serie"];


            for ($i=0; $i < count($numero); $i++) { 
                $nGanador[$i]=rand(1,49);
            }
            $sGanador=rand(1,999);


            ?>
            <div id="respuesta">
                <h1>Loteria</h1>
                <table>
                    <thead>
                        <tr>
                            <th></th>
                            <?php
                                for ($i=1; $i <= count($nGanador); $i++) { 
                                    echo "<th>Numero $i</th>";
                                }
                            ?>
                            <th>Serie</th>
                        </tr>
                    </thead>
                    
                    <tr>
                        <th>Nº Ganador</th>
                        <?php
                            for ($i=0; $i < count($nGanador); $i++) { //NUmeros de la loteria
                                if($nGanador[$i]==$numero[$i]){
                                    echo "<td class='igual'>".$nGanador[$i]."</td>";
                                }else{
                                    echo "<td class='diferente'>".$nGanador[$i]."</td>";
                                }
                            } 

                            if($sGanador==$serie){//Numero de serie
                                echo "<td class='igual'>".$sGanador."</td>";

                            }else{
                                echo "<td class='diferente'>".$sGanador."</td>";
                            }
                            
                        ?>
                    </tr>

                    <tr>
                        <th>Tu Numero</th>
                        <?php
                            for ($i=0; $i < count($numero); $i++) { 
                                if($numero[$i]==$nGanador[$i]){
                                    echo "<td class='igual'>".$numero[$i]."</td>";
                                }else{
                                    echo "<td class='diferente'>".$numero[$i]."</td>";
                                }
                            } 
                            if($serie==$sGanador){//Numero de serie
                                echo "<td class='igual'>".$serie."</td>";

                            }else{
                                echo "<td class='diferente'>".$serie."</td>";
                            }
                        ?>
                    </tr>
                </table>
            </div>
            <?php

        }
        ?>
    </div>
</center>
</body>
</html>