<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
$codigo=$_REQUEST["codigo"];
$prodAModificar = $_SESSION["productos"][$codigo];
if($prodAModificar["urlLocal"]){
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
            <form action="adminShop.php" method="post">
                <label for="codigo">Codigo:
                    <input type="text" name="codigo" id="codigo" value="<?=$codigo?>" readonly="readonly">
                </label>
                <br>
                <?php
                foreach ($prodAModificar as $clave => $prop) {
                    if ($clave!="urlLocal") {
                        ?>
                <label for="<?=$clave?>"><?=ucfirst($clave)?>:
                    <input type="text" name="<?=$clave?>" id="<?=$clave?>" value="<?=$prop?>" required>
                </label>
                <br>
                <?php
                    }
                }
            ?>
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