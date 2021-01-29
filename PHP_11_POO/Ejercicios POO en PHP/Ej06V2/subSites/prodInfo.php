<?php
if(!isset($_REQUEST["codProducto"])){
    header("Location:../Ej06.php");
}

if(session_status() == PHP_SESSION_NONE){
    session_start();
}

include_once "../objetos/Producto.php";

$producto = Producto::getProductoByClave($_REQUEST["codProducto"]);

if($producto->getUrl_local()){
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
    <title><?=$producto->getNombre();?></title>
</head>
<body>
    <header>
        <h1>Shoes Store</h1>
    </header>
    <div class="container">
            <div class="imgBig">
                <img src="<?=$aux.$producto->getImagen()?>" alt="">
            </div>
            <div class="description">
                <p><?=$producto->getNombre();?></p>
                <p><?=$producto->getPrecio();?>€</p>
                <form action="../utils/db_actions.php" method="post">
                    <input type="hidden" name="codigo" value="<?=$producto->getClave()?>">
                    <button type="submit" value="agregarCarrito" name="accion">Agregar al carrito</button>
                    <button onclick="window.location.redirect('../Ej06.php');">Volver</button>
                </form>
            </div>
    </div>
</body>

</html>

<?php 
$conexion=null;
?>