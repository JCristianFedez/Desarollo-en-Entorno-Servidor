<?php 
if(session_status() == PHP_SESSION_NONE){
    session_start();
}

include_once "../objetos/Producto.php";

$productos = Producto::getProductos();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css">
    <title>Administrar</title>
</head>

<body>
    <header>
        <h1>Shoes Store</h1>
    </header>
    <div class="container flex">
        <?php 
            foreach($productos as $codigo => $prodUnd):
                if($prodUnd->getUrl_local()){
                    $aux="../imgs/";
                }else{
                    $aux="";
                }
                    ?>
                <div class="productos">
                    <img src="<?=$aux.$prodUnd->getImagen();?>" alt="">
                    <p><?=$prodUnd->getNombre()?></p>
                    <p>Precio: <?=$prodUnd->getPrecio()?>€</p>
                    <p>Stock: <?=$prodUnd->getStock()?> Unds</p>
                    <form action="../utils/db_actions.php" method="post">
                        <input type="hidden" name="returnTo" value="subSites/adminShop.php">
                        <input type="hidden" name="codProducto" value="<?=$prodUnd->getClave()?>">
                        <input type="submit" name="accion" value="eliminarProducto">
                    </form>
                    <form action="modificarProducto.php" method="post">
                        <input type="hidden" name="codProducto" value="<?=$prodUnd->getClave()?>">
                        <input type="submit" name="accion" value="modificarProducto">
                    </form>
                </div>
        <?php
            endforeach;
        ?>
        <div class="adminShop">
            <form action="agregarProducto.php" method="post">
                <input type="submit" value="Añadir nuevo producto">
            </form>
            <form action="../Ej06.php" method="post">
                <input type="submit" value="Volver">
            </form>
        </div>

    </div>

</body>

</html>