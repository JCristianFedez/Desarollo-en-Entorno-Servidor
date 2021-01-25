<?php
if(session_status() == PHP_SESSION_NONE){
    session_start();
}

include_once "../objetos/Producto.php";

$prodAModificar = unserialize($_SESSION["productos"])[$_REQUEST["codigo"]];

if($prodAModificar->getUrl_local() == 1){
    $check="checked";
}else{
    $check="";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css">
    <title>Modificar Producto</title>
</head>

<body>
    <header>
        <h1>Shoes Store</h1>
    </header>
    <div class="container flex">
        <h1>Modificar Producto</h1>
        <div class="addModProducto">
            <form action="../utils/db_actions.php" method="post">
                <input type="hidden" name="returnTo" value="subSites/adminShop.php">
                <label for="codigo">Codigo:
                    <input type="text" name="codigo" id="codigo" required readonly value="<?=$prodAModificar->getClave()?>">
                </label>
                <br>
                <label for="nombre">Nombre:
                    <input type="text" name="nombre" id="nombre" required value="<?=$prodAModificar->getNombre()?>">
                </label>
                <br>
                <label for="precio">Precio:
                    <input type="number" name="precio" id="precio" step=".01" min="0" required value="<?=$prodAModificar->getPrecio()?>">
                </label>
                <br>
                <label for="stock">Stock:
                    <input type="number" name="stock" id="stock" required min="0" value="<?=$prodAModificar->getStock()?>">
                </label>
                <br>
                <label for="imagen">Imagen:
                    <input type="text" name="imagen" id="imagen" required value="<?=$prodAModificar->getImagen()?>">
                </label>
                <br>
                <label for="urlLocal">La imagen es Local
                    <input type="checkbox" name="urlLocal" id="urlLocal" <?=$check?>></label>
                <br>
                <div class="addModProdButton">
                    <input type="submit" name="accion" value="modificarProducto">
                    <button onclick="window.location.replace('adminShop.php');">Cancelar</button>
                </div>
            </form>
        </div>
    </div>
</body>

</html>

<?php 
$conexion=null;
?>