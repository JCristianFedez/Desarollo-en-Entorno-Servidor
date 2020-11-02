<!-- Rellena una quiniela de 14 partidos estandars y uno especial, 
puedes elegir si gana uno u otro u si empatan, a partir del 6 acierto 
se ganara por cada acierto extra la mitad de la cantidad que se a apostado,
si se aciertan 6 partidos o mas y el espcial este sumara la misma cantidad ganada
por los otros partidos, si solo acierta 6 partidos contando el especial entonces
gana lo mismo que ha apostado:

(Cuando se den los for se puede hacer con ellos y cuando se den los array
se pueden hacer con ellos tambien para mas comodidad y ahorrar la mayoria de lineas)

(Se podria mostra que equipos han ganado pero seria demasiado sin usar arrays ni
bucles)


Ejemplo:
Se apuesta 5:
Se aciertan 12: Se gana 20
Se acieta el especial: Se añaden 20 extra
-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>EjFernandezCristian</title>
</head>
<body>
    <center>
        <div class="container">
            <?php 
            if(!isset($_GET["checking"])){
                ?>
                
                <form action="#" method="get" id="formulario">
                    <input type="hidden" name="checking" value="ComprobacionSiSehaEnviado">
                    <fieldset>
                        <h3>Introduce tu Apuesta</h3>
                        <input placeholder="Apuesta" type="number" name="apuesta" require min="1">
                    </fieldset>
                    <table>
                        <tr>
                            <th></th>
                            <th>GanaIzq</th>
                            <th>Empate</th>
                            <th>GanaDer</th>
                        </tr>
                        <tr>
                            <th>Deportivo - R.Sociedad</th>
                            <td><input type="radio" id="" name="partido1" value="0"></td>
                            <td><input type="radio" id="" name="partido1" value="1" checked></td>
                            <td><input type="radio" id="" name="partido1" value="2"></td>
                        </tr>
                        <tr>
                            <th>Rayo Vallecano - Valencia</th>
                            <td><input type="radio" id="" name="partido2" value="0"></td>
                            <td><input type="radio" id="" name="partido2" value="1" checked></td>
                            <td><input type="radio" id="" name="partido2" value="2"></td>
                        </tr>
                        <tr>
                            <th>Athletic Club - Barcelona</th>
                            <td><input type="radio" id="" name="partido3" value="0"></td>
                            <td><input type="radio" id="" name="partido3" value="1" checked></td>
                            <td><input type="radio" id="" name="partido3" value="2"></td>
                        </tr>
                        <tr>
                            <th>Sporting - R.Madrid</th>
                            <td><input type="radio" id="" name="partido4" value="0"></td>
                            <td><input type="radio" id="" name="partido4" value="1" checked></td>
                            <td><input type="radio" id="" name="partido4" value="2"></td>
                        </tr>
                        <tr>
                            <th>Betis - Villareal</th>
                            <td><input type="radio" id="" name="partido5" value="0"></td>
                            <td><input type="radio" id="" name="partido5" value="1" checked></td>
                            <td><input type="radio" id="" name="partido5" value="2"></td>
                        </tr>
                        <tr>
                            <th>Espanyol - Getafe</th>
                            <td><input type="radio" id="" name="partido6" value="0"></td>
                            <td><input type="radio" id="" name="partido6" value="1" checked></td>
                            <td><input type="radio" id="" name="partido6" value="2"></td>
                        </tr>
                        <tr>
                            <th>Levante - Celta</th>
                            <td><input type="radio" id="" name="partido7" value="0"></td>
                            <td><input type="radio" id="" name="partido7" value="1" checked></td>
                            <td><input type="radio" id="" name="partido7" value="2"></td>
                        </tr>
                        <tr>
                            <th>Almeria - Leganes</th>
                            <td><input type="radio" id="" name="partido8" value="0"></td>
                            <td><input type="radio" id="" name="partido8" value="1" checked></td>
                            <td><input type="radio" id="" name="partido8" value="2"></td>
                        </tr>
                        <tr>
                            <th>Mirandes - Zaragoza</th>
                            <td><input type="radio" id="" name="partido9" value="0"></td>
                            <td><input type="radio" id="" name="partido9" value="1" checked></td>
                            <td><input type="radio" id="" name="partido9" value="2"></td>
                        </tr>
                        <tr>
                            <th>Llagostera - Osasuna</th>
                            <td><input type="radio" id="" name="partido10" value="0"></td>
                            <td><input type="radio" id="" name="partido10" value="1" checked></td>
                            <td><input type="radio" id="" name="partido10" value="2"></td>
                        </tr>
                        <tr>
                            <th>Oviedo - Lugo</th>
                            <td><input type="radio" id="" name="partido11" value="0"></td>
                            <td><input type="radio" id="" name="partido11" value="1" checked></td>
                            <td><input type="radio" id="" name="partido11" value="2"></td>
                        </tr>
                        <tr>
                            <th>Gimnastic - Albacete</th>
                            <td><input type="radio" id="" name="partido12" value="0"></td>
                            <td><input type="radio" id="" name="partido12" value="1" checked></td>
                            <td><input type="radio" id="" name="partido12" value="2"></td>
                        </tr>
                        <tr>
                            <th>Alcorcon - Mallorca</th>
                            <td><input type="radio" id="" name="partido13" value="0"></td>
                            <td><input type="radio" id="" name="partido13" value="1" checked></td>
                            <td><input type="radio" id="" name="partido13" value="2"></td>
                        </tr>
                        <tr>
                            <th>Cordoba - Valladolid</th>
                            <td><input type="radio" id="" name="partido14" value="0"></td>
                            <td><input type="radio" id="" name="partido14" value="1" checked></td>
                            <td><input type="radio" id="" name="partido14" value="2"></td>
                        </tr>
                        <tr>
                            <th colspan="4" class="partidoEspecial">PARTIDO ESPECIAL</th>
                        </tr>
                        <tr>
                            <th>Malaga - Sevilla</th>
                            <td><input type="radio" id="" name="partido15" value="0"></td>
                            <td><input type="radio" id="" name="partido15" value="1" checked></td>
                            <td><input type="radio" id="" name="partido15" value="2"></td>
                        </tr>
                    </table>
                    <br>
                    <input type="submit" value="Apostar">
                </form>
                <?php
            }else{
                $partido1=$_GET["partido1"];
                $partido2=$_GET["partido2"];
                $partido3=$_GET["partido3"];
                $partido4=$_GET["partido4"];
                $partido5=$_GET["partido5"];
                $partido6=$_GET["partido6"];
                $partido7=$_GET["partido7"];
                $partido8=$_GET["partido8"];
                $partido9=$_GET["partido9"];
                $partido10=$_GET["partido10"];
                $partido11=$_GET["partido11"];
                $partido12=$_GET["partido12"];
                $partido13=$_GET["partido13"];
                $partido14=$_GET["partido14"];
                $partido15=$_GET["partido15"];
    
                $par15Acertado=false;

                $apuesta=$_GET["apuesta"];
                $aciertos=0;
                $monedero=0;
                if($partido1==rand(0,2)){
                    $aciertos++;
                    if($aciertos>6){
                        $monedero+=($apuesta/2);
                    }
                }
                
                if($partido2==rand(0,2)){
                    $aciertos++;
                    if($aciertos>6){
                        $monedero+=($apuesta/2);
                    }
                }
                 
                if($partido3==rand(0,2)){
                    $aciertos++;
                    if($aciertos>6){
                        $monedero+=($apuesta/2);
                    }
                }
                 
                if($partido4==rand(0,2)){
                    $aciertos++;
                    if($aciertos>6){
                        $monedero+=($apuesta/2);
                    }
                }
                 
                if($partido5==rand(0,2)){
                    $aciertos++;
                    if($aciertos>6){
                        $monedero+=($apuesta/2);
                    }
                }
                 
                if($partido6==rand(0,2)){
                    $aciertos++;
                    if($aciertos>6){
                        $monedero+=($apuesta/2);
                    }
                }
                 
                if($partido7==rand(0,2)){
                    $aciertos++;
                    if($aciertos>6){
                        $monedero+=($apuesta/2);
                    }
                }
                 
                if($partido8==rand(0,2)){
                    $aciertos++;
                    if($aciertos>6){
                        $monedero+=($apuesta/2);
                    }
                }
                 
                if($partido9==rand(0,2)){
                    $aciertos++;
                    if($aciertos>6){
                        $monedero+=($apuesta/2);
                    }
                }
                 
                if($partido10==rand(0,2)){
                    $aciertos++;
                    if($aciertos>6){
                        $monedero+=($apuesta/2);
                    }
                }
                 
                if($partido11==rand(0,2)){
                    $aciertos++;
                    if($aciertos>6){
                        $monedero+=($apuesta/2);
                    }
                }
                 
                if($partido12==rand(0,2)){
                    $aciertos++;
                    if($aciertos>6){
                        $monedero+=($apuesta/2);
                    }
                }
                 
                if($partido13==rand(0,2)){
                    $aciertos++;
                    if($aciertos>6){
                        $monedero+=($apuesta/2);
                    }
                }
                 
                if($partido14==rand(0,2)){
                    $aciertos++;
                    if($aciertos>6){
                        $monedero+=($apuesta/2);
                    }
                }
                 
                if($partido15==rand(0,2)){
                    $aciertos++;
                    $par15Acertado=true;
                    if($aciertos==6){
                        $monedero=$apuesta;
                    }else if($aciertos>6){
                        $monedero+=$monedero;
                    }
                }
                echo "<div id='respuesta'>";
                    echo "<h2>Has ganado $monedero euros, con $aciertos aciertos</h2>";
                    if($par15Acertado && $aciertos>6){
                        echo "<h2>Tambien has ganado el partido especial FELICIDADES</h2>";
                    }
                    echo "</div>";
            } 
            ?>
        </div>
    </center>
    <br>
</body>
</html>