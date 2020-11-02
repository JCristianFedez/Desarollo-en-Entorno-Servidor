<!-- Diseñar un formulario web que pida la altura y el diámetro de un cilindro. Una vez el usuario
introduzca los datos y pulse el botón calcular, deberá calcularse el volumen del cilindro y
mostrarse el resultado en el navegador. Mostrar la imagen de un cilindro junto al resultado y
un título "Calculo del volúmen de un cilindro", intenta dar un aspecto agradable a la página de
resultado.  -->

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="style.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ej01</title>
</head>
<body>
<center>
    <div class="container">  

        <?php
        if ((!isset($_GET["altura"]))||(!isset($_GET["diametro"]))) {
            ?>
        <div id="formulario">
            <form action="#" method="get">
                <h3>Geometria</h3>
                <h4>Calcular el volumen de un cilindro</h4>
                
                <fieldset>
                    <input placeholder="Diametro" type="number" name="diametro" tabindex="1" required autofocus>
                </fieldset>
                
                <fieldset>
                    <input placeholder="Altura" type="number" name="altura" tabindex="2" required>
                </fieldset>
    
                <fieldset>
                    <input name="submit" type="submit" value="Calcular">
                </fieldset>
                
            </form>
        </div>

            <?php
        } else {
            $altura=$_GET["altura"];
            $diametro=$_GET["diametro"];
            $radio=$diametro/2;
            $volumen=pi()*pow($radio, 2)*$altura;

            ?>
            <div id="respuesta">
                <h3>Diametro: <?php echo $diametro;?></h3>
                <h3>Altura: <?php echo $altura;?></h3>
                <img src="https://image.flaticon.com/icons/png/512/1200/1200837.png" height="150px" alt="Cilindro">
                <br>
                <h2>Volumen del cilindro: <?php echo round($volumen, 2);?></h2>
            </div>
            <?php

        }
        ?>
    </div>
</center>
</body>
</html>