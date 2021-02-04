<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../View/css/style.css">
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
                foreach($data["fullCarrito"] as $carritoProd):
                    $prod=Producto::getProductoById($carritoProd->getIdProd());?>
                    <div class="productos">
                        <img src="<?=$prod->getImg();?>" alt="">
                        <p><?=$prod->getNombre();?></p>
                        <p>Precio: <?=$prod->getPrecio(); ?>€</p>
                        <p>Unidades: <?=$carritoProd->getCant(); ?></p>
                        <form action="eliminarProductoCarrito.php" method="post">
                            <input type="hidden" name="idProd" value="<?=$prod->getId();?>">
                            <button type="submit" value="unidad" name="cantidad">Eliminar Unidad</button>
                            <button type="submit" value="todos" name="cantidad">Eliminar Producto</button>
                        </form>
                    </div>
                <?php endforeach; ?>
            <div class="carritoIcon">
                <form action="vaciarCarrito.php" method="post" class="vaciarCarrito">
                    <i class="fas fa-shopping-cart"></i>
                    <p>Total carrito : <?=$data["totalCarrito"]?>€</p>
                    <button type="submit" value="vaciarCarrito" name="accion" <?php if($data["totalCarrito"] == 0) echo "disabled class='buttonDisabled'" ?>>Vaciar carrito</button>
                </form>
                <form action="imprimirTicket.php">
                <button type="submit" value="Comprar" <?php if($data["totalCarrito"] == 0) echo "disabled class='buttonDisabled'" ?>>Comprar</button>
            </form>
            </div>
    
        </div>
        <br>
        <br>
        <div class="adminShop">
            <button onclick="window.location.replace('adminShop.php');">Administrar Tienda</button>
            <button onclick="window.location.replace('index.php');">Volver</button>
        </div>
    </div>
</body>

</html>
