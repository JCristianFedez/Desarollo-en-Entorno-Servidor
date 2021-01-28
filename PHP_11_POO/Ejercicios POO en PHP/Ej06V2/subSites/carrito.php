<!-- Realizar una tienda con un carrito de la compra más completo que el realizado en el boletín.
 En la página principal tendremos un listado compuesto por una tabla con 4 columnas, nombre del
producto, precio, imagen y botón para añadir a la cesta, si se añade más de una vez se aumenta
la cantidad del producto en la cesta. También se mostrará cuantos productos hay en la cesta en
todo momento y un enlace para acceder a dicha cesta que mostrará otro listado de los productos
añadidos y su cantidad, junto a cada producto habrá un botón eliminar que permita quitar una
unidad de ese producto y si se llega a 0 se elimina el producto de la cesta. Al final de la 
cesta se mostrará el importe total de todos los productos y un botón o enlace para cerrar la 
cesta y volver a la página principal.

Por último, en la página principal al pulsar sobre la imagen de un producto se abrirá en otra
página la imagen a tamaño original (algo más grande) junto con los datos del producto y el detalle
del mismo (una breve descripción).

Crear manualmente en código, un array de sesión con todos los productos la primera vez que se
carga la página en una sesión nueva (con 3 o 4 productos es suficiente). El array puede ser
asociativo con clave ‘nombre del producto’ y valor un array con los valores ‘precio, detalle’
y la imagen puede coincidir con el nombre del producto más la extensión

Los productos añadidos en la cesta deben almacenarse en una cookie por si se cierra el navegador
 y se abre de nuevo se recuperen automáticamente los productos añadidos a la cesta.
 -->
 <?php
require_once "../objetos/Carrito.php";
require_once "../objetos/Producto.php";
$allCarrito=Carrito::getFullCarrito();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css">
    <title>Carrito</title>
</head>

<body>
    <header>
        <h1>Shoes Store</h1>
    </header>
    <div class="container flex">
        <div class="carrito flex">
            <h1>Carrito</h1>
            <?php
            $totalCarrito=0;
                foreach($allCarrito as $codigo => $carritoProd):
                    $prod=Producto::getProductoByClave($carritoProd->getClave());
                    if($prod->getUrl_local()){
                        $aux="../imgs/";
                    }else{
                        $aux="";
                    }
                    $totalCarrito+=$prod->getPrecio()*$carritoProd->getCant(); ?>
                    <div class="productos">
                        <a href="prodInfo.php?codProducto=<?=$prod->getClave()?>"><img src="<?=$aux.$prod->getImagen();?>" alt=""></a>
                        <p><?=$prod->getNombre();?></p>
                        <p>Precio: <?=$prod->getPrecio(); ?>€</p>
                        <p>Unidades: <?=$carritoProd->getCant(); ?></p>
                        <form action="../utils/db_actions.php" method="post">
                            <input type="hidden" name="returnTo" value="subSites/carrito.php">
                            <input type="hidden" name="codigo" value="<?=$prod->getClave();?>">
                            <button type="submit" value="eliminarUndCarrito" name="accion">Eliminar Unidad</button>
                            <button type="submit" value="eliminarProductoCarrito" name="accion">Eliminar Producto</button>
                        </form>
                    </div>
                <?php
                endforeach;
                ?>
            <div class="carritoIcon">
                <form action="../utils/db_actions.php" method="post" class="vaciarCarrito">
                    <p>Total carrito : <?=$totalCarrito?>€</p>
                    <button type="submit" value="vaciarCarrito" name="accion" <?php if($totalCarrito == 0) echo "disabled class='buttonDisabled'" ?>>Vaciar carrito</button>
                </form>
                <form action="../utils/imprimirTicket.php">
                <button type="submit" value="Comprar" <?php if($totalCarrito == 0) echo "disabled class='buttonDisabled'" ?>>Comprar</button>
            </form>
            </div>
    
        </div>
        <br>
        <br>
        <div class="adminShop">
            <button onclick="window.location.replace('adminShop.php');">Administrar Tienda</button>
            <button onclick="window.location.replace('../Ej06.php');">Volver</button>
        </div>
    </div>
            <!-- <?php print_r($_SESSION["carrito"]);?>
            <br><br>
            <?php print_r($_SESSION["productos"]);?>
            <br><br>
            <?php print_r(unserialize(base64_decode($_COOKIE["carrito"]))); ?>
            <br><br>
            <?php 
            print_r(unserialize(base64_decode($_COOKIE["productos"]))); ?> -->
</body>

</html>

<?php 
$conexion=null;
?>