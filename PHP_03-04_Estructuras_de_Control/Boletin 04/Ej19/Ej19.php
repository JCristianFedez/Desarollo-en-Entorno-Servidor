<!-- Realiza un programa que pinte una pirámide por pantalla. La altura 
se debe pedir por teclado mediante un formulario. La pirámide estará
hecha de bolitas, ladrillos o cualquier otra imagen de las 5 que se deben
dar a elegir mediante un formulario. -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
    /* Oculto el circulo del RADIO */
input[type=radio] { 
  position: absolute;
  opacity: 0;
  width: 0;
  height: 0;
}

/* Hago que el raton se ponga como una mano sobre las imagenes y modifico el tamaño */
input[type=radio] + img {
  cursor: pointer;
  width:50px;
  height:50px;
}

/* Cuando el radio este pinchado se pondra un borde por fuera de la imagen en rojo */
input[type=radio]:checked + img {
  outline: 2px solid red;
}

img{
width:50px;
height:50px;
}
.transparente{
    opacity:0%;
}
    </style>
    <title>Ej19</title>
</head>
<body>
    <h3>Piramide</h3>
    <?php 
    if(!isset($_REQUEST["altura"])||!isset($_REQUEST["img"])){
        ?>
        <form action="#" method="post">
            <label>Introduce un altura de la piramide:<input type="number" name="altura" required min=1></label>
            <br>
            <label><input type="radio" name="img" value="caja-de-madera.png"><img src="Imagenes\caja-de-madera.png" alt="Caja de madera" checked></label>
            <label><input type="radio" name="img" value="monitor.png"><img src="Imagenes\monitor.png" alt="Monitor"></label>
            <label><input type="radio" name="img" value="lineas.png"><img src="Imagenes\lineas.png" alt="Lineas diagonales"></label>
            <label><input type="radio" name="img" value="madera.png"><img src="Imagenes\madera.png" alt="Panel de Madera"></label>
            <label><input type="radio" name="img" value="pared-de-ladrillo.png"><img src="Imagenes\pared-de-ladrillo.png" alt="Pared de ladrillo"></label>
            <br>
            <input type="submit" value="Generar">
        </form>
        <?php
    }else{
        $img=$_REQUEST["img"];
        $altura=$_REQUEST["altura"];
        for ($i=0; $i < $altura; $i++) { 
            for ($j=0; $j < $altura-$i; $j++) { 
                echo "<img src='Imagenes\\$img' alt='$img' class='transparente'>";

            }
            echo "<img src='Imagenes\\".$img."' alt='$img'>";

            for ($j=0; $j < $i; $j++) { 
                echo "<img src='Imagenes\\".$img."' alt='$img'>";
                echo "<img src='Imagenes\\".$img."' alt='$img'>";

            }
            echo "<br>";
        }

        echo "<br><br><br><button onclick='window.location.href=\"Ej19.php\"'>Nueva Piramide</button>";
   }
    ?>
</body>
</html>