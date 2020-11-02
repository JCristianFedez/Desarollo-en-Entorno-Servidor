<!-- Realiza el ejercicio 1 del tema anterior correspondiente al juego de adivinar una imagen, pero
usando estructuras repetitivas para simplificar el código.
 -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
table, td {
  border: 1px solid black;
  border-collapse: collapse;
    background-color:grey;    
}
td {
  height: 100px;
  width:100px;
  text-align: center;
}
img{
    height:100%;
    width:100%;
    opacity:0%;
    
}
</style>
    <title>Ej03</title>
</head>

<body>
    <center>
    <h1>Mosaico</h1>
    <?php 
    if((!isset($_GET["img"]))&&(!isset($_GET["sol"]))){
        if(!isset($_GET["intento"])){//Solo carga el intento la primera vez
            $intento=0;
        }else{
            $intento=$_GET["intento"];
        }
        $refImg=9;
        ?>
    <form action="#" method="get">
        <table>
            <?php 
                for ($i=0; $i < 3; $i++) { 
                    echo "<tr>";
                    for ($j=0; $j < 3 ; $j++) { 
                        echo "<td><a href='?img=$refImg&intento=$intento'><img src='Imagenes/$refImg.png'></a></td>";
                        $refImg--;
                    }
                    echo "</tr>";
                }
            ?>
        </table>
        <br>
        <h4>Intento <?php echo $intento; ?></h4>
        <br>
        <fieldset>
        Quien es: <input type="text" name="sol" require>
        </fieldset>
        <br>
        <input type="hidden" name="intento" value="<?php echo $intento; ?>">
        <input type="submit" value="Comprobar">
    </form>

        <?php

    }else{
        $intento=$_GET["intento"];
        $refImg=9;
        if (!isset($_GET["sol"])) {//Solo carga si se ha introducido solucion
            $sol="empty";
        } else {
            $sol=strtolower($_GET["sol"]);
        }

        if ($sol=="ibai") {
            ?>
            <style>
            img{
                opacity:100%;
            }
            </style>
            <h1>Has acertado en el intento <?php echo $intento; ?></h1>
                <table>
                    <?php 
                    for ($i=0; $i < 3; $i++) { 
                        echo "<tr>";
                        for ($j=0; $j < 3 ; $j++) { 
                            echo "<td><img src='Imagenes/$refImg.png'></td>";
                            $refImg--;
                        }
                        echo "</tr>";
                    }
                    ?>
                </table>
            <?php
        } elseif ($sol!="ibai" && $sol!="empty") {
            $intento++;//Sumo un intento
            echo "<h1>MAL Intentalo de nuevo</h1>";
            echo "<META HTTP-EQUIV='REFRESH' CONTENT='3;URL=Ej03.php?intento=$intento'>";//en 3 segundos vuelvo atras
        }

        if ($sol=="empty") {
            $img=$_GET["img"];
            $intento++;//Sumo un intento
                ?>
                <style>
                <?php echo "#img$img"; ?>{/* Solo cambia la opacidad a la imagen con la id clicada */
                    opacity:100%;
                }
                </style>
            <table>
                <?php 
                    for ($i=0; $i < 3; $i++) { 
                        echo "<tr>";
                        for ($j=0; $j < 3 ; $j++) { 
                            echo "<td><img src='Imagenes/$refImg.png' id='img$refImg'></td>";
                            $refImg--;
                        }
                        echo "</tr>";
                    }
                ?>
            </table>
            
            <?php
            echo "<META HTTP-EQUIV='REFRESH' CONTENT='3;URL=Ej03.php?intento=$intento'>";//en 3 segundos vuelvo atras
        }
    }
    
    ?>
    <br><br>
    <button onclick="window.location='Ej03.php';">Reiniciar</button>
    </center>
    
</body>
</html>