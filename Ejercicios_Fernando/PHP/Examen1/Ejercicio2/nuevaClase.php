<?php 
session_start();
if (isset($_REQUEST['claseNueva'])) {
    $_SESSION['clases'][]=$_REQUEST['claseNueva'];
    $_SESSION['alumnos'][$_REQUEST['claseNueva']]=[];
    setcookie('clases',serialize($_SESSION['clases']),time() + 365*24*60*60);
    header('location:principal.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="nuevaClase.php" method="post">
        <label for="claseNueva">CLASE NUEVA: </label>
        <input type="text" id="claseNueva" name="claseNueva">
        <input type="submit" value="AÑADIR">
    </form>
</body>
</html>