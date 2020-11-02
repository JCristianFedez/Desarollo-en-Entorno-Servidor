<!-- Realiza un programa que pida la temperatura media que ha hecho en 
cada mes de un determinado año y que muestre a continuación un diagrama 
de barras horizontales con esos datos. Las barras del diagrama se pueden 
dibujar a base de la concatenación de una imagen. -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
    table,td,th{
        border:1px black solid ;
        border-collapse:collapse;
        padding:.5em;
    }
    .rojo{
        background-color:red;
    }

    .azul{
        background-color:blue;
    }

    .verde{
        background-color:green;
    }
    </style>
    <title>Ej05</title>
</head>
<body>
    <?php 
    if(!isset($_REQUEST["temp"])){
        $meses=["Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre"];
        ?>
        <form action="#" method="post">
            <?php 
                for ($i=0; $i < count($meses); $i++) { 
                    echo "<label>$meses[$i]: <input type='number' name='temp[]' required></label>";
                    echo "<br>";
                }
            ?>
            <input type="hidden" name="meses" value="<?= implode(",",$meses)?>">
            <input type="submit" value="Generar grafico">
        </form>
        <?php
    }else{
        $meses=explode(",",$_REQUEST["meses"]);
        $temp=$_REQUEST["temp"];

        echo "<table>"; 
            echo "<thead>";
                echo "<tr><td></td>";
                    for ($i=min($temp)-3; $i < max($temp)+3; $i++) { 
                        echo "<td>$i</td>";
                    }
                echo "</tr>";
            echo "</thead>";
            echo "<tbody>";
        for ($i=0; $i < count($temp); $i++) { 
            echo "<tr><th>$meses[$i]</th>";
            for ($j=min($temp)-3; $j < max($temp)+3; $j++) {

                if($j==0){
                    echo "<td class='verde'></td>";
                }else{
                    if(($temp[$i]<=0)&&($j>=$temp[$i])&&($j<=0)){//Temperaturas Negativas
                        echo "<td class='azul'></td>";
                    }elseif(($temp[$i]>=0)&&($j<=$temp[$i])&&($j>=0)){//Temperatura Positiva
                        echo "<td class='rojo'></td>";
                    }else{
                        echo "<td></td>";
    
                    }
                }

  
            }
            echo "</tr>";
        }
        echo "</tbody>";
    }
    ?>
</body>
</html>