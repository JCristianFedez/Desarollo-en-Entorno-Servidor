<!-- Amplía el programa anterior de tal forma que se pueda ver el detalle de un producto. Para ello, cada
uno de los productos del catálogo deberá tener un botón Detalle que, al ser accionado, debe llevar
al usuario a la vista de detalle que contendrá una descripción exhaustiva del producto en cuestión.
Se podrán añadir productos al carrito tanto desde la vista de listado como desde la vista de detalle.
 -->
<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if (!isset($_SESSION["carrito"])) {
    $_SESSION["carrito"]=["NikeISPA" => 0, "ColumVit" => 0, "NikeBenJerry" => 0, "AdidasYeezy" => 0];
}
if(!isset($_SESSION["productos"])){
    $_SESSION["productos"] = [
        "NikeISPA" => ["nombre" => "Nike ISPA Overreact FK", "precio" => 180, "imagen" => "Nike-Overreact-Flyknit.png", "url" => "nikeISPA.php"],
        "ColumVit" => ["nombre" => "Columbia Vitesse", "precio" => 120, "imagen" => "columbiaVitese.png", "url" => "columVit.php"],
        "NikeBenJerry" => ["nombre" => "Nike de Ben & Jerry's", "precio" => 100, "imagen" => "Nike-SB-Dunk-Low-Ben-Jerrys.png", "url" => "nikeBenJerry.php"],
        "AdidasYeezy" => ["nombre" => "adidas Yeezy Boost 350 (Tail Light)", "precio" => 220, "imagen" => "addidasYeezi.png", "url" => "adidasYeezy.php"]
    ];
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Ej06</title>
</head>

<body>
    <header>
        <h1>Shoes Store</h1>
    </header>
    <div class="container">
        <div class="productos">
            <h1>Productos</h1>
            <?php
            foreach ($_SESSION["productos"] as $codigo => $producto) {
                ?>
            <a href="subSites/<?=$producto["url"]?>"><img src="imgs/<?=$producto["imagen"]; ?>" alt=""></a>
            <br>
            <?=$producto["nombre"]?>
            <br>
            Precio: <?=$producto["precio"]?>€
            <form action="" method="post">
                <input type="hidden" name="codigo" value="<?=$codigo?>">
                <button type="submit" value="agregar" name="accion">Agregar al carrito</button>
            </form>
            <br>
            <br>
            <?php
            }
            ?>
        </div>
    
        <div class="carrito">
            <h1>Carrito</h1>
            <?php
                $totalCarrito=0;
                foreach ($_SESSION["productos"] as $codigo => $producto) {
                    if ($_SESSION["carrito"][$codigo]>0) {
                        $totalCarrito+=$_SESSION["carrito"][$codigo] * $producto["precio"]; ?>
                        <a href="subSites/<?=$producto["url"]?>"><img src="imgs/<?=$producto["imagen"]; ?>" alt=""></a>
                        <br>
                        <?=$producto["nombre"]?>
                        <br>
                        Precio: <?=$producto["precio"]; ?>€
                        <br>
                        Unidades: <?=$_SESSION["carrito"][$codigo]; ?>
                        <form action="#" method="post">
                        <input type="hidden" name="codigo" value="<?=$codigo?>">
                        <button type="submit" value="eliminarUnd" name="accion">Eliminar Unidad</button>
                        <button type="submit" value="eliminarProducto" name="accion">Eliminar Producto</button>
                        </form>
                        <br>
                        <br>
            <?php
                    }
                }
                echo "Total carrito : $totalCarrito";
    
            if (isset($_REQUEST["accion"])) {//Al pulsar un boton
                $accion=$_REQUEST["accion"];
                
                if(isset($_REQUEST["codigo"])){
                    $codigo=$_REQUEST["codigo"];
                }
    
                if ($accion=="agregar") {
                    $_SESSION["carrito"][$codigo]++;
    
                } elseif ($accion=="eliminarUnd") {
                    $_SESSION["carrito"][$codigo]--;
    
                } elseif($accion=="eliminarProducto"){
                    $_SESSION["carrito"][$codigo]=0;
    
                }elseif ($accion=="vaciar") {
                    session_destroy();
                }
                // header("refresh: 0");//Preguntar a fernando porque falla al tercer añadido
                echo "<meta http-equiv='refresh' content='0' />";
            }
            
            ?>
    
            <form action="#" method="post">
                <button type="submit" value="vaciar" name="accion">Vaciar carrito</button>
            </form>
    
        </div>
        <br>
        <br>
    </div>
            <?php print_r($_SESSION);?>
</body>

</html>