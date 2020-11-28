<?php 
if(session_status() == PHP_SESSION_NONE){
    session_start();
} ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
    echo "<h1>Bienvenido ".$_SESSION["name"]."</h1>";
    ?>
    <form action="#" method="post">
    <button type="submit" value="delete" name="delete">Cerrar sesion</button>
    </form>
    <?php 
    if(isset($_REQUEST["delete"])){
        session_destroy();
        header("Location: Ej04.php");
    }
    print_r($_SESSION);?>
</body>
</html>