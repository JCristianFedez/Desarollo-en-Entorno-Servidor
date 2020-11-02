<!-- Vamos a diseñar un juego para adivinar imágenes mostrando solo alguna parte de ellas. Dividir
una imagen en un mosaico de 3x3, y mostrar una cuadrícula en la página principal con todos
los cuadrados del mosaico dados la vuelta. Debajo de la cuadrícula habrá una caja de texto
para que el usuario intente adivinar el nombre de lo que aparece en la imagen, junto a un
botón comprobar.
Cada vez que el usuario pulse en un cuadrado de la cuadrícula se mostrará el contenido solo de
esa cuadrícula durante 2 segundos y posteriormente se volverá a ocultar.
Cuando el usuario escriba algo y pulse el botón comprobar ocurrirá lo siguiente:
-Si ha acertado se mostrará la imagen completa y un mensaje de felicitación por acertar.
-Si no ha acertado se mostrará un mensaje indicando que ha fallado y un botón de volver para
seguir intentándolo.
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
    <title>Ej01</title>
</head>

<body>
    <center>
    <h1>Mosaico</h1>
    <?php 
    if((!isset($_GET["img"]))&&(!isset($_GET["sol"]))){
        if(!isset($_GET["intento"])){//Solo carga el intento la primera vez
            $intento=1;
        }else{
            $intento=$_GET["intento"];
        }
        ?>
    <form action="#" method="get">
        <table>
        <tr>
            <td><a href="?img=9&intento=<?php echo $intento;?>"><img src="Imagenes/9.png" ></a></td>
            <td><a href="?img=8&intento=<?php echo $intento;?>"><img src="Imagenes/8.png" ></a></td>
            <td><a href="?img=7&intento=<?php echo $intento;?>"><img src="Imagenes/7.png" ></a></td>
        </tr>
        <tr>
            <td><a href="?img=6&intento=<?php echo $intento;?>"><img src="Imagenes/6.png" ></a></td>
            <td><a href="?img=5&intento=<?php echo $intento;?>"><img src="Imagenes/5.png" ></a></td>
            <td><a href="?img=4&intento=<?php echo $intento;?>"><img src="Imagenes/4.png" ></a></td>
        </tr>
        <tr>
            <td><a href="?img=3&intento=<?php echo $intento;?>"><img src="Imagenes/3.png" ></a></td>
            <td><a href="?img=2&intento=<?php echo $intento;?>"><img src="Imagenes/2.png" ></a></td>
            <td><a href="?img=1&intento=<?php echo $intento;?>"><img src="Imagenes/1.png" ></a></td>
        </tr>
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
                    <tr>
                        <td><img src="Imagenes/9.png" ></td>
                        <td><img src="Imagenes/8.png" ></td>
                        <td><img src="Imagenes/7.png" ></td>
                    </tr>
                    <tr>
                        <td><img src="Imagenes/6.png" ></td>
                        <td><img src="Imagenes/5.png" ></td>
                        <td><img src="Imagenes/4.png" ></td>
                    </tr>
                    <tr>
                        <td><img src="Imagenes/3.png" ></td>
                        <td><img src="Imagenes/2.png" ></td>
                        <td><img src="Imagenes/1.png" ></td>
                    </tr>
                </table>
            <?php
        } elseif ($sol!="ibai" && $sol!="empty") {
            $intento++;//Sumo un intento
            echo "<h1>MAL Intentalo de nuevo</h1>";
            echo "<META HTTP-EQUIV='REFRESH' CONTENT='3;URL=Ej01.php?intento=$intento'>";//en 3 segundos vuelvo atras
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
            <tr>
                <td><img src="Imagenes/9.png" id="img9"></td>
                <td><img src="Imagenes/8.png" id="img8"></td>
                <td><img src="Imagenes/7.png" id="img7"></td>
            </tr>
            <tr>
                <td><img src="Imagenes/6.png" id="img6"></td>
                <td><img src="Imagenes/5.png" id="img5"></td>
                <td><img src="Imagenes/4.png" id="img4"></td>
            </tr>
            <tr>
                <td><img src="Imagenes/3.png" id="img3"></td>
                <td><img src="Imagenes/2.png" id="img2"></td>
                <td><img src="Imagenes/1.png" id="img1"></td>
            </tr>
            </table>
            <?php
            echo "<META HTTP-EQUIV='REFRESH' CONTENT='3;URL=Ej01.php?intento=$intento'>";//en 3 segundos vuelvo atras
        }
    }
    
    ?>
    <br><br>
    <button onclick="window.location='Ej01.php';">Reiniciar</button>
    </center>
</body>
</html>