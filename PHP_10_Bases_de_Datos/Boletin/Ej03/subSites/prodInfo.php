<?php
if(!isset($_REQUEST["codProducto"])){
    header("Location:../Ej03.php");
}

require_once "../utils/db_connect.php";
require_once "../utils/db_consults.php";

$producto=selectProd($conexion,$_REQUEST["codProducto"])->fetchObject();

if($producto->url_local){
    $aux="../imgs/";
}else{
    $aux="";
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css">
    <title><?=$producto->nombre;?></title>
</head>
<body>
    <header>
        <h1>Shoes Store</h1>
    </header>
    <div class="container">
            <div class="imgBig">
                <img src="<?=$aux.$producto->imagen?>" alt="">
            </div>
            <div class="description">
                <p><?=$producto->nombre;?></p>
                <p><?=$producto->precio;?>€</p>
                <form action="../utils/db_actions.php" method="post">
                    <input type="hidden" name="codigo" value="<?=$producto->clave?>">
                    <button type="submit" value="agregarCarrito" name="accion">Agregar al carrito</button>
                    <button onclick="window.location.redirect('../Ej03.php');">Volver</button>
                </form>
            </div>
    </div>
</body>

</html>