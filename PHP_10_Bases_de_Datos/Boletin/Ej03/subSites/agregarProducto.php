<!-- Falta añadir la funcionabilidad a agragar producto -->
<?php
require_once "../utils/db_connect.php";
require_once "../utils/db_consults.php";

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
                <label for="clave">Clave:
                    <input type="text" name="clave" id="clave" required>
                </label>
                <br>
                <label for="nombre">Nombre:
                    <input type="text" name="nombre" id="nombre" required>
                </label>
                <br>
                <label for="precio">Precio:
                    <input type="number" name="precio" id="precio" step=".01" required>
                </label>
                <br>
                <label for="imagen">Imagen:
                    <input type="text" name="imagen" id="imagen" required>
                </label>
                <br>
                <label for="urlLocal">La imagen es Local
                    <input type="checkbox" name="urlLocal" id="urlLocal"></label>
                <br>
                <div class="addModProdButton">
                    <input type="submit" name="accion" value="agregarProducto">
                    <button onclick="window.location.replace('adminShop.php');">Cancelar</button>
                </div>
            </form>
        </div>
    </div>
</body>

</html>