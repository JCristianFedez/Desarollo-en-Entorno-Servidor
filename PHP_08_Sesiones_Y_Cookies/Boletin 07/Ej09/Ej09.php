<!-- Amplía el ejercicio 6 de tal forma que los productos que se pueden elegir para comprar se almacenen
en cookies. La aplicación debe ofrecer, por tanto, las opciones de alta, baja y modificación de
productos.
 -->
<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (isset($_REQUEST["accion"])) {//Al pulsar un boton
    $accion=$_REQUEST["accion"];
    
    if (isset($_REQUEST["codigo"])) {
        $codigo=$_REQUEST["codigo"];
    }
    switch ($accion) {
        case 'agregarCarrito':
            $_SESSION["carrito"][$codigo]++;
            setcookie("carrito", base64_encode(serialize($_SESSION['carrito'])), time() + 1 * 24 * 3600);
        break;

        case 'eliminarUndCarrito':
            $_SESSION["carrito"][$codigo]--;
            setcookie("carrito", base64_encode(serialize($_SESSION['carrito'])), time() + 1 * 24 * 3600);
        break;

        case 'eliminarProductoCarrito':
            $_SESSION["carrito"][$codigo]=0;
            setcookie("carrito", base64_encode(serialize($_SESSION['carrito'])), time() + 1 * 24 * 3600);
        break;

        case 'vaciarCarrito':
            // session_destroy();
            setcookie("carrito", NULL, -1);//Elimino la cookie
            $_SESSION["carrito"]=["NikeISPA" => 0, "ColumVit" => 0, "NikeBenJerry" => 0, "AdidasYeezy" => 0];
            echo "<meta http-equiv='refresh' content='0' />";
        break;

        case 'eliminarProducto':
            # code...
            break;

        case 'modificarProducto':
            # code...
            break;

        case 'borrarCookiesProductos':
            setcookie("productos", NULL, -1);
            unset($_SESSION["productos"]);
            break;

        case 'actualizarCookiesProductos':
            setcookie("productos", base64_encode(serialize($_SESSION['productos'])), time() + 1 * 24 * 3600);
            break;
    }
    // header("refresh: 0");//Preguntar a fernando porque falla al tercer añadido
    // echo "<meta http-equiv='refresh' content='0' />";
}


if (isset($_COOKIE["carrito"]) && !isset($_SESSION["carrito"])) {
    //Cargo el carrito de las cookies
    $_SESSION["carrito"]=unserialize(base64_decode($_COOKIE["carrito"]));
}


if (isset($_COOKIE["productos"]) && !isset($_SESSION["carrito"])) {
    //Cargo los productos de las cookies
    $_SESSION["productos"]=unserialize(base64_decode($_COOKIE["productos"]));
}


if (!isset($_SESSION["carrito"])) {//Creo sesion y cookie carrito
    $_SESSION["carrito"]=["NikeISPA" => 0, "ColumVit" => 0, "NikeBenJerry" => 0, "AdidasYeezy" => 0];
    setcookie("carrito", base64_encode(serialize($_SESSION['carrito'])), time() + 1 * 24 * 3600);
    
    // header("refresh: 0");
}


if (!isset($_SESSION["productos"])) {//Creo sesion y cockie productos
    $_SESSION["productos"] = [
        "NikeISPA" => ["nombre" => "Nike ISPA Overreact FK", "precio" => 180, "imagen" => "Nike-Overreact-Flyknit.png", "url" => "nikeISPA.php"],
        "ColumVit" => ["nombre" => "Columbia Vitesse", "precio" => 120, "imagen" => "columbiaVitese.png", "url" => "columVit.php"],
        "NikeBenJerry" => ["nombre" => "Nike de Ben & Jerry's", "precio" => 100, "imagen" => "Nike-SB-Dunk-Low-Ben-Jerrys.png", "url" => "nikeBenJerry.php"],
        "AdidasYeezy" => ["nombre" => "adidas Yeezy Boost 350 (Tail Light)", "precio" => 220, "imagen" => "addidasYeezi.png", "url" => "adidasYeezy.php"]
    ];

    setcookie("productos", base64_encode(serialize($_SESSION['productos'])), time() + 1 * 24 * 3600);
    // header("refresh: 0");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Ej09</title>
</head>

<body>
    <header>
        <h1>Shoes Store</h1>
    </header>
    <div class="container flex">
        <div class="productos">
            <h1>Productos</h1>
            <?php
            foreach ($_SESSION["productos"] as $codigo => $producto) {
                ?>
            <a href="subSites/zapatos.php?zapato=<?=$codigo?>"><img src="imgs/<?=$producto["imagen"]; ?>" alt=""></a>
            <br>
            <?=$producto["nombre"]?>
            <br>
            Precio: <?=$producto["precio"]?>€
            <form action="" method="post">
                <input type="hidden" name="codigo" value="<?=$codigo?>">
                <button type="submit" value="agregarCarrito" name="accion">Agregar al carrito</button>
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
                        <a href="subSites/zapatos.php?zapato=<?=$codigo?>"><img src="imgs/<?=$producto["imagen"]; ?>" alt=""></a>
                        <br>
                        <?=$producto["nombre"]?>
                        <br>
                        Precio: <?=$producto["precio"]; ?>€
                        <br>
                        Unidades: <?=$_SESSION["carrito"][$codigo]; ?>
                        <form action="#" method="post">
                        <input type="hidden" name="codigo" value="<?=$codigo?>">
                        <button type="submit" value="eliminarUndCarrito" name="accion">Eliminar Unidad</button>
                        <button type="submit" value="eliminarProductoCarrito" name="accion">Eliminar Producto</button>
                        </form>
                        <br>
                        <br>
            <?php
                    }
                }
                echo "Total carrito : $totalCarrito";
            
            ?>
    
            <form action="#" method="post">
                <button type="submit" value="vaciarCarrito" name="accion">Vaciar carrito</button>
            </form>
    
        </div>
        <br>
        <br>
        <div class="adminShop">
        <button onclick="window.location.redirect('subSites/adminShop.php');">Administrar Tienda</button>
        </div>
    </div>
            <?php print_r($_SESSION["carrito"]);?>
            <br><br>
            <?php print_r($_SESSION["productos"]);?>
            <br><br>
            <?php print_r(unserialize(base64_decode($_COOKIE["carrito"]))); ?>
            <br><br>
            <?php print_r(unserialize(base64_decode($_COOKIE["productos"]))); ?>
</body>

</html>