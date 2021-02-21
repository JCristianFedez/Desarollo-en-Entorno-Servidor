<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
    if (isset($_REQUEST['palabra']) ) {
        $intentos=$_REQUEST['intentos'];
        if ($_REQUEST['palabra']=="gollum") {
    ?>
    <h1>ENHORABUENA has acertado con <?php echo 10-$intentos; ?> consultas, la imagen oculta era gollum</h1>
    <img src="imagen/gollum.jpg" alt="imagen de Gollum">
    <?php 
        }else {
    ?>
    <h1>Lo siento no has acertado, te quedan <?=$intentos?> consultas, sigue intentándolo</h1>
    <a href='Ejercicio3-1.php?intentos=<?=++$intentos?>&panel=<?php echo $_REQUEST['panel'];?>'><h3>VOLVER</h3></a>
    <?php 
        }
    }else if (isset($_REQUEST['perdido'])) {
    ?>
    <h1>Suerte para la próxima vez, la imagen oculta era gollum</h1>
    <img src="imagen/gollum.jpg" alt="imagen de Gollum">
    <?php 
    }
    ?>
    
</body>
</html>