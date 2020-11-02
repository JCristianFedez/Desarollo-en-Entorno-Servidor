<!-- Vamos a hacer el ejercicio de adivinar la imagen oculta del tema 3 más
interesante.
Para empezar, vamos a hacer el mosaico un poco mas grande, de 10x10. 
Además la imagen no se va a dividir sino que formará parte del fondo de la
tabla y para ocultar o mostrar cada parte del mosaico, el fondo de cada
celda será transparente u opaco.
Cada vez que se pulse un cuadrado, la parte de la imagen correspondiente a
ese cuadrado se mostrará de manera definitiva, así que cada vez se irán 
mostrando más partes de la imagen.
Por último, para rematar y hacerlo todavía más interesante, vamos a poner
un límite en el número de cuadrados volteados, de modo que, si no se 
adivina la imagen antes de superar ese límite, se mostrará un mensaje 
indicando que ha perdido junto a la imagen completa. 
Si se acierta introduciendo el nombre correcto en la caja de texto
antes de superar el límite, también se indicará con un mensaje junto a la 
imagen completa.
Ayuda: La tabla con las partes visibles y no visibles de la imagen, se
encuentra en una única página que se recarga con cada pulsación, pero el 
resultado del juego tanto si ha ganado como si ha perdido, se puede 
realizar en otra página distinta. 
Almacenar en un array la situación de cada celda (vista u oculta) y pasar 
el array con la función serialize para mayor comodidad. -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Ejericio03</title>
</head>

<body>
    <h1>Mosaico</h1>
    <table>
    <?php
        $MARCADO=1;
        $NO_MARCADO=0;
        $INTENTOS_MAXIMOS=20;
        if (!isset($_REQUEST["posiciones"])) {
            $posiciones=[];
            for ($i=0; $i < 10; $i++) {
                for ($j=0; $j < 10; $j++) {
                    $posiciones[$i][$j]=$NO_MARCADO;
                }
            }
            $intento=$INTENTOS_MAXIMOS;
            $posicionesStr=base64_encode(serialize($posiciones));
            $sol="empty";
            $form=false;
        } else {
            $posiciones=unserialize(base64_decode($_REQUEST["posiciones"]));
            $form=(isset($_REQUEST["form"]))?$_REQUEST["form"]:false;
            if (!$form) {
                $fila=$_REQUEST["fila"];
                $columna=$_REQUEST["columna"];
                $posiciones[$fila][$columna]=$MARCADO;
            }
            $form=false;
            $intento=$_REQUEST["intento"]-1;
            $posicionesStr=base64_encode(serialize($posiciones));
            $sol=$_REQUEST["sol"];
        }
        if ($intento>0 && strtolower($sol)!="ibai") {
            if (strtolower($sol)!="empty") {
                echo "<h4 class='msg_perder'>Te has equivocado</h4>";
            }
            for ($i=0; $i < 10; $i++) {
                echo "<tr>";
                for ($j=0; $j < 10; $j++) {
                    if ($posiciones[$i][$j]==$MARCADO) {
                        echo "<td class='marcado'></td>";
                    } else {
                        echo "<td class='sinMarcar' onclick=\"window.location.href='?fila=$i&columna=$j&intento=$intento&posiciones=$posicionesStr&sol=empty'\"></td>";
                    }
                }
                echo "</tr>";
            } ?>
        </table>
        <br>
        <h4>Intentos Restantes: <?=$intento?></h4>
        <form action="#" method="post">
            <label for="sol">Solucion: <input type="text" name="sol" id="sol" required></label>
            <input type="hidden" name="intento" value="<?=$intento?>" >
            <input type="hidden" name="posiciones" value="<?=$posicionesStr?>">
            <input type="hidden" name="form" value="true">
            <input type="submit" value="Comprobar">
        </form>
        <br>
            <button onclick='window.location.href="Ejercicio03.php"'>Resetear</button>
        <?php
        } else {
            $posiciones=unserialize(base64_decode($_REQUEST["posiciones"]));
            $intento=$_REQUEST["intento"];

            echo "<table>";
            for ($i=0; $i < 10; $i++) {
                echo "<tr>";
                for ($j=0; $j < 10; $j++) {
                    echo "<td class='marcado'></td>";
                }
                echo "</tr>";
            }
            echo "</table>";
            if (strtolower($sol)!="ibai") {
                echo "<h1 class='msg_perder'>HAS PERDIDO</h1>";
            } else {
                echo "<h1 class='msg_ganar'>HAS GANADO EN EL INTENTO ".($INTENTOS_MAXIMOS-($intento-1))." </h1>";
            }
            echo "<br>";
            echo "<button onclick='window.location.href=\"Ejercicio03.php\"'>Volver a Jugar</button>";
        }
    ?>
        
</body>

</html>