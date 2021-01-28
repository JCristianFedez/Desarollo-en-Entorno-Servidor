<!-- Modifica el ejercicio 6 del carrito de la compra, 
del tema de sesiones, para que los productos se
almacenen en un fichero. Debes crear una página 
para administrar los productos de la tienda (que están
almacenados en el fichero). Puedes trabajar con 
los productos en un array de sesión, pero cuando se
añada o se borre un producto de la tienda, será 
necesario actualizar el fichero. También debes
completar el ejercicio guardando la cesta de la 
compra en una cookie, de manera que se pueda retomar
la compra aunque se cierre el navegador. (Ejercicio completo)  -->
<?php

//TODO: Quitar consultas y añadir con objetos
if(session_status() == PHP_SESSION_NONE){
    session_start();
}

include_once "objetos/Producto.php";
include_once "objetos/Carrito.php";

$allProducts=Producto::getProductos();
$cantProdCarrito=Carrito::getCantTotal();

if(!$cantProdCarrito) $cantProdCarrito=0;


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css">
    <link rel="stylesheet" href="style.css">
    <title>Ej06</title>
</head>

<body>
    <header>
        <h1>Shoes Store</h1>
    </header>
    <div class="container flex">
        <h1>Productos</h1>
        <?php
        foreach($allProducts as $codigo => $prodUnd):
            if($prodUnd->getUrl_local()){
                $aux="imgs/";
            }else{
                $aux="";
            }
        ?>
        <div class="productos">
            <?php 
            ?>
            <a href="subSites/prodInfo.php?codProducto=<?=$prodUnd->getClave();?>"><img src="<?=$aux.$prodUnd->getImagen(); ?>"
                    alt=""></a>
            <p><?=$prodUnd->getNombre()?></p>
            <p>Precio: <?=$prodUnd->getPrecio()?>€</p>
            <p>Stock: <?=$prodUnd->getStock()?> Unds</p>
            <form action="utils/db_actions.php" method="post">
                <input type="hidden" name="codigo" value="<?=$prodUnd->getClave()?>">
                <button type="submit" value="agregarCarrito" name="accion" <?php if($prodUnd->getStock() == 0 ) echo "disabled class='buttonDisabled'" ?>>Agregar al carrito</button>
            </form>
        </div>
        <?php endforeach;?>

        <div class="carritoIcon">
            <a href="subSites/carrito.php"><i class="fas fa-shopping-cart"></i>Cant: <?= $cantProdCarrito?></a>
            <form action="utils/db_actions.php" method="post">
                <button type="submit" value="vaciarCarrito" name="accion" <?php if($cantProdCarrito == 0) echo "disabled class='buttonDisabled'" ?>>Vaciar carrito</button>
            </form>
            <form action="utils/imprimirTicket.php">
                <button type="submit" value="Comprar" <?php if($cantProdCarrito == 0) echo "disabled class='buttonDisabled'" ?>>Comprar</button>
            </form>
        </div>
        <br>
        <br>
        <div class="adminShop">
            <button onclick="window.location.replace('subSites/adminShop.php');">Administrar Tienda</button>
        </div>
    </div>
</body>

</html>

<?php 
$conexion=null;
?>