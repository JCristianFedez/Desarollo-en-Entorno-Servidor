<?php 
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
$espanol=$_REQUEST["espanol"];
$ingles = $_SESSION["diccionario"][$espanol];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar palabra</title>
</head>
<body>
    <h1>Añadir palabra</h1>
    <form action="administrarPalabras.php" method="post">
    <label for="espanol">Español:</label>
    <input type="text" name="espanol" id="espanol" value="<?=$espanol?>" readonly="readonly">
    <br>
    <label for="ingles">Ingles: </label>
    <input type="text" name="ingles" id="ingles" value="<?=$ingles?>">
    <br>
    <input type="submit" name="accion"  value="modificar">
</form>
</body>
</html>