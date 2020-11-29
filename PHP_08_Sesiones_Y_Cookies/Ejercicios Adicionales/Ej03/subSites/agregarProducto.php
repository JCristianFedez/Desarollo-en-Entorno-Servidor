<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

//$propiedades contiene las key de los productos
$propiedades=array_keys($_SESSION["productos"][key($_SESSION["productos"])]);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css">
    <title>Añadir nuevo Producto</title>
</head>

<body>
    <header>
        <h1>Shoes Store</h1>
    </header>
    <div class="container flex">
        <h1>Añadir Producto</h1>
        <div class="addModProducto">
            <form action="adminShop.php" method="post">
                <label for="codigo">Codigo: 
                    <input type="text" name="codigo" id="codigo">
                </label>
                <br>
                <?php
            foreach ($propiedades as $clave => $prop) {
                ?>
                <label for="<?=$prop?>"><?=ucfirst($prop)?>: 
                    <input type="text" name="<?=$prop?>" id="<?=$prop?>" required>
                </label>
                <br>
                <?php
            }
            ?>
                <br>
                <div class="addModProdButton">
                    <input type="submit" name="accion" value="agregarProducto">
                    <button onclick="window.location.replace('adminShop.php');">Cancelar</button>
                </div>
            </form>
        </div>
    </div>
</body>
<?php
?>

</html>