<?php 
if(session_status() == PHP_SESSION_NONE){
    session_start();
}

include_once "objetos/Zona.php";

if(!isset($_SESSION["zonas"])){
    $_SESSION["zonas"] = serialize([
        new Zona("Sala principal",1000),
        new Zona("Compra-Venta",200),
        new Zona("Vip",25)
        ]);
}

$zonas = unserialize($_SESSION["zonas"]);
$aux = 0;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Expocoches Campanillas</title>
</head>
<body>
    <h1>Venta de entradas</h1>
    
    <?php 
    if(isset($_SESSION["error"])){
        if($_SESSION["error"]==1){
            echo "<h2 class='error'>No quedan suficientes entradas</h2>";
        }
        unset($_SESSION["error"]);
    } 
    ?>
    <div class="container">
        <?php foreach($zonas as $zona): ?>
                <form action="utils/action.php" method="post" class="all-form">
                    <div class="form-item">
                        <input type="hidden" name="zonaComprada" value="<?=$aux?>">
                        <label for="<?=$zona->getNombre()?>">Comprar entradas para <?=$zona->getNombre()?>: </label>
                    </div>
                    <div class="form-item">
                        Entradas restantes : <?=$zona->getEntradasDisponibles()?>
                    </div>
                    <div class="form-item">
                        <input type="number" name="cantVendidas" id="<?=$zona->getNombre()?>" required min="1" max="<?=$zona->getEntradasDisponibles()?>">
                    </div>
                    <div class="form-item">
                        <input type="submit" value="Comprar">
                    </div>
                </form>
            <?php $aux++; ?>
        <?php endforeach; ?>
    </div>
</body>
</html>