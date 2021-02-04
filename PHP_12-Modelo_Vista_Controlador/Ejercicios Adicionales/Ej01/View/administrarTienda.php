<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../View/css/style.css">
    <title>Administrar</title>
</head>

<body>
    <header>
        <h1>Shoes Store</h1>
    </header>
    <div class="container flex">
        <?php 
            foreach($data["productos"] as $prod):?>
                <div class="productos">
                    <img src="<?=$prod->getImg();?>" alt="">
                    <p><?=$prod->getNombre()?></p>
                    <p>Precio: <?=$prod->getPrecio()?>€</p>
                    <p>Stock: <?=$prod->getStock()?> Unds</p>
                    <form action="eliminarProductoTienda.php" method="post">
                        <input type="hidden" name="idProd" value="<?=$prod->getId()?>">
                        <input type="submit" name="accion" value="eliminarProducto">
                    </form>
                    <form action="recojerDatosProductoModificado.php" method="post">
                        <input type="hidden" name="idProd" value="<?=$prod->getId()?>">
                        <input type="submit" name="accion" value="modificarProducto">
                    </form>
                </div>
        <?php endforeach; ?>
        <div class="adminShop">
            <form action="recojerDatosNuevoProducto.php" method="post">
                <input type="submit" value="Añadir nuevo producto">
            </form>
            <form action="index.php" method="post">
                <input type="submit" value="Volver">
            </form>
        </div>

    </div>

</body>

</html>