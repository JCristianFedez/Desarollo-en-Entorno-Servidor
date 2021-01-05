<?php 
require_once "../utils/db_connect.php";
require_once "../utils/db_consults.php";

$allProducts=showAllProducts($conexion);

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
            while($producto= $allProducts->fetchObject()):
                if($producto->url_local){
                    $aux="../imgs/";
                }else{
                    $aux="";
                }
                    ?>
                <div class="productos">
                    <img src="<?=$aux.$producto->imagen;?>" alt="">
                    <br>
                    <?=$producto->nombre?>
                    <br>
                    Precio: <?=$producto->precio?>€
                    <form action="../utils/db_actions.php" method="post">
                        <input type="hidden" name="returnTo" value="subSites/adminShop.php">
                        <input type="hidden" name="codigo" value="<?=$producto->clave?>">
                        <input type="submit" name="accion" value="eliminarProducto">
                    </form>
                    <form action="modificarProducto.php" method="post">
                        <input type="hidden" name="codigo" value="<?=$producto->clave?>">
                        <input type="submit" name="accion" value="modificarProducto">
                    </form>
                </div>
        <?php
            endwhile;
        ?>
        <div class="adminShop">
            <form action="agregarProducto.php" method="post">
                <input type="submit" value="Añadir nuevo producto">
            </form>
            <form action="../Ej03.php" method="post">
                <input type="submit" value="Volver">
            </form>

            <form action="../Ej03.php" method="post">
                <input type="hidden" name="accion" value="actualizarCookiesProductos">
                <input type="submit" value="Guardar cambios">
            </form>
        </div>

    </div>

</body>

</html>