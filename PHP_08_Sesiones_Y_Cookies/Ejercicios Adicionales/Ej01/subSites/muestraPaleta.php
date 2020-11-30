<?php 
if(session_status() == PHP_SESSION_NONE){
    session_start();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
    td{
        border:1px solid black;
        padding:1em;
    }
    <?php
    if(isset($_SESSION["colores"]) && isset($_REQUEST["clave"])){
        $color=$_REQUEST["clave"];
        echo "body{
            background-color: ".$_SESSION["colores"][$color].";
        }";
    }
    ?>
    </style>
    <title>Mi Paleta</title>
</head>
<body>
    <table>
    <?php 
    if(isset($_SESSION["colores"])){
        foreach ($_SESSION["colores"] as $key => $value) {
            if($key%5==0){
                echo "<tr>";
            }
            echo "<td onclick=\"window.location.href='?clave=$key'\" ' style='background-color: $value;'></td>";
        }
    }else{
        echo "<p>No existen colores</p>";
    }
    ?>
    </table>
    <form action="../Ej01.php" method="post">
    <button type="submit" name="bodyColor" value="<?=$color?>">Añadir mas colores</button> 
    <br>
    <button type="submit" name="accion" id="borrarSession" value="borrarSession">Nueva Paleta</button> 
    </form>
    <!-- <?php 
    print_r($_SESSION["colores"]);
    ?> -->
</body>
</html>