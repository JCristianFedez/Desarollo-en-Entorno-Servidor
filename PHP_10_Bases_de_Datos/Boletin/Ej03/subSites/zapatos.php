<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if(isset($_REQUEST["zapato"])){
    $zapato=$_REQUEST["zapato"];
    }else{
        echo "<script>window.location.redirect('Ej03.php');</script>";
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css">
    <title><?=$_SESSION["productos"][$zapato]["nombre"];?>ezi</title>
</head>
<body>
    <header>
        <h1>Shoes Store</h1>
    </header>
    <div class="container">
            <div class="imgBig">
                <img src="../imgs/<?=$_SESSION["productos"][$zapato]["imagen"]?>" alt="">
            </div>
            <div class="description">
                <p><?=$_SESSION["productos"][$zapato]["nombre"];?></p>
                <p><?=$_SESSION["productos"][$zapato]["precio"];?>€</p>
                <form action="../Ej03.php" method="post">
                    <input type="hidden" name="codigo" value="<?=$zapato?>">
                    <button type="submit" value="agregarCarrito" name="accion">Agregar al carrito</button>
                    <button onclick="window.location.redirect('Ej03.php');">Volver</button>
                </form>
            </div>
    </div>
</body>

</html>