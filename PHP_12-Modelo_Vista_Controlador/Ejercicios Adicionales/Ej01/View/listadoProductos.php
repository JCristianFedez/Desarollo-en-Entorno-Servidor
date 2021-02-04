<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../View/css/style.css">
    <title>Tienda</title>
</head>

<body>
    <?php include "header.php" ?>

    <div class="container flex">
        <h1>Productos</h1>
        <?php foreach($data["productos"] as $prod):?>
        <div class="productos">
            <img src="<?=$prod->getImg(); ?>"alt="">
            <p><?=$prod->getNombre()?></p>
            <p>Precio: <?=$prod->getPrecio()?>€</p>
            <p>Stock: <?=$prod->getStock()?> Unds</p>
            <form action="agregarACarrito.php" method="post">
                <input type="hidden" name="id" value="<?=$prod->getId()?>">
                <button type="submit" value="agregarCarrito" name="accion" <?php if($prod->getStock() == 0 ) echo "disabled class='buttonDisabled'" ?>>Agregar al carrito</button>
            </form>
        </div>
        <?php endforeach;?>

        <div class="carritoIcon">
            <a href="miCarrito.php"><i class="fas fa-shopping-cart"></i>Cant: <?= $data["cantCarrito"]?></a>
            <form action="vaciarCarrito.php" method="post">
                <button type="submit" value="vaciarCarrito" name="accion" <?php if($data["cantCarrito"] == 0) echo "disabled class='buttonDisabled'" ?>>Vaciar carrito</button>
            </form>
            <form action="imprimirTicket.php">
                <button type="submit" value="Comprar" <?php if($data["cantCarrito"] == 0) echo "disabled class='buttonDisabled'" ?>>Comprar</button>
            </form>
        </div>
        <br>
        <br>
        <div class="adminShop">
            <button onclick="window.location.replace('adminShop.php');">Administrar Tienda</button>
        </div>
    </div>
</body>

</html>
