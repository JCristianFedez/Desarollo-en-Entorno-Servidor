<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../View/css/style.css">
    <title>Producto</title>
</head>

<body>
    <header>
        <h1>Shoes Store</h1>
    </header>
    <div class="container flex">
        <h1><?=$data["producto"]->getNombre()?></h1>
        <div class="addModProducto">
            <form action="#" method="post">
                <input type="hidden" name="idProd" value="<?=$data["producto"]->getId()?>">
                <br>
                <label for="stock">Stock:
                    <input type="number" name="stock" id="stock" min="0" required value="">
                </label>
                <br>
                <div class="addModProdButton">
                    <input type="submit" name="accion" value="Agregar">
                    <button onclick="window.location.href='adminShop.php';">Cancelar</button>
                </div>
            </form>
        </div>
    </div>
</body>

</html>