<?php 
if(session_status() == PHP_SESSION_NONE){
    session_start();
}

if(isset($_REQUEST["accion"])){
    if($_REQUEST["accion"]=="agregarProducto"){

    }

    if($_REQUEST["accion"] == "modificarProducto"){

    }

    if($_REQUEST["accion"] == "eliminarProducto"){

    }
}

$productos=$_SESSION["productos"];
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
    <div class="containerAdmin">
        <?php 
            foreach ($productos as $codigo => $producto) {
                    ?>
                    <div>
                    <img src="imgs/<?=$producto["imagen"]; ?>" alt="">
                    <br>
                    <?=$producto["nombre"]?>
                    <br>
                    Precio: <?=$producto["precio"]?>€
                    <form action="#" method="post">
                        <input type="hidden" name="codigo" value="<?=$codigo?>">
                        <input type="submit" name="accion" value="eliminarProducto">
                    </form>
                    <form action="modificarProducto.php" method="post">
                            <input type="hidden" name="codigo" value="<?=$codigo?>">
                            <input type="submit" name="accion" value="modificarProducto">
                    </form>
                    </div>
                    <?php
            }
        ?>
        <hr>
        <form action="agregarProducto.php" method="post">
        <input type="submit" value="Añadir nuevo producto">
        </form>
        <form action="Ej09.php" method="post">
        <input type="hidden" name="accion" value="borrarCookiesProductos">
        <input type="submit" value="Restablecer diccionario">
        </form>

        <form action="Ej09.php" method="post">
        <input type="hidden" name="accion" value="actualizarCookiesProductos">
        <input type="submit" value="Guardar cambios">
        </form>
    </div>
</body>
</html>