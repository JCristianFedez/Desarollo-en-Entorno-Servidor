<!-- Realizar una tienda con un carrito de la compra más completo que el realizado en el boletín.
 En la página principal tendremos un listado compuesto por una tabla con 4 columnas, nombre del
producto, precio, imagen y botón para añadir a la cesta, si se añade más de una vez se aumenta
la cantidad del producto en la cesta. También se mostrará cuantos productos hay en la cesta en
todo momento y un enlace para acceder a dicha cesta que mostrará otro listado de los productos
añadidos y su cantidad, junto a cada producto habrá un botón eliminar que permita quitar una
unidad de ese producto y si se llega a 0 se elimina el producto de la cesta. Al final de la 
cesta se mostrará el importe total de todos los productos y un botón o enlace para cerrar la 
cesta y volver a la página principal.

Por último, en la página principal al pulsar sobre la imagen de un producto se abrirá en otra
página la imagen a tamaño original (algo más grande) junto con los datos del producto y el detalle
del mismo (una breve descripción).

Crear manualmente en código, un array de sesión con todos los productos la primera vez que se
carga la página en una sesión nueva (con 3 o 4 productos es suficiente). El array puede ser
asociativo con clave ‘nombre del producto’ y valor un array con los valores ‘precio, detalle’
y la imagen puede coincidir con el nombre del producto más la extensión

Los productos añadidos en la cesta deben almacenarse en una cookie por si se cierra el navegador
 y se abre de nuevo se recuperen automáticamente los productos añadidos a la cesta.
 -->
 <?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (isset($_COOKIE["carrito"]) && !isset($_SESSION["carrito"])) {
    //Cargo el carrito de las cookies
    $_SESSION["carrito"]=unserialize(base64_decode($_COOKIE["carrito"]));
}
//Estructura de Carrito:  $_SESSION["carrito"]=["NikeISPA" => 0, "ColumVit" => 0, "NikeBenJerry" => 0, "AdidasYeezy" => 0];


if (isset($_COOKIE["productos"]) && !isset($_SESSION["carrito"])) {
    //Cargo los productos de las cookies
    $_SESSION["productos"]=unserialize(base64_decode($_COOKIE["productos"]));
}


if (!isset($_SESSION["productos"])) {//Creo sesion y cockie productos
    $_SESSION["productos"] = [
        "NikeISPA" => ["nombre" => "Nike ISPA Overreact FK", "precio" => 180, "imagen" => "Nike-Overreact-Flyknit.png"],
        "ColumVit" => ["nombre" => "Columbia Vitesse", "precio" => 120, "imagen" => "columbiaVitese.png"],
        "NikeBenJerry" => ["nombre" => "Nike de Ben & Jerry's", "precio" => 100, "imagen" => "Nike-SB-Dunk-Low-Ben-Jerrys.png"],
        "AdidasYeezy" => ["nombre" => "adidas Yeezy Boost 350 (Tail Light)", "precio" => 220, "imagen" => "addidasYeezi.png"]];

    setcookie("productos", base64_encode(serialize($_SESSION['productos'])), time() + 1 * 24 * 3600);
    // header("refresh: 0");
}

if (isset($_REQUEST["accion"])) {//Al pulsar un boton
    $accion=$_REQUEST["accion"];
    
    if (isset($_REQUEST["codigo"])) {
        $codigo=$_REQUEST["codigo"];
    }
    switch ($accion) {
        // case 'agregarCarrito':
        //     if(!isset($_SESSION["carrito"][$codigo])){
        //         $_SESSION["carrito"][$codigo]=1;
        //     }else{
        //         $_SESSION["carrito"][$codigo]++;
        //     }
        //     setcookie("carrito", base64_encode(serialize($_SESSION['carrito'])), time() + 1 * 24 * 3600);
        // break;

        case 'eliminarUndCarrito':
            $_SESSION["carrito"][$codigo]--;
            if($_SESSION["carrito"][$codigo]<=0){
                unset($_SESSION["carrito"][$codigo]);
            }
            setcookie("carrito", base64_encode(serialize($_SESSION['carrito'])), time() + 1 * 24 * 3600);
        break;

        case 'eliminarProductoCarrito':
            unset($_SESSION["carrito"][$codigo]);
            setcookie("carrito", base64_encode(serialize($_SESSION['carrito'])), time() + 1 * 24 * 3600);
        break;

        case 'vaciarCarrito':
            // session_destroy();
            unset($_SESSION["carrito"]);
            setcookie("carrito", NULL, -1);//Elimino la cookie
            $_SESSION["carrito"]=[];
            setcookie("carrito", base64_encode(serialize($_SESSION['carrito'])), time() + 1 * 24 * 3600);
        break;

        // case 'borrarCookiesProductos':
        //     setcookie("productos", NULL, -1);
        //     unset($_SESSION["productos"]);
        //     break;

        // case 'actualizarCookiesProductos':
        //     //Si elimino un producto lo elimino del carrito
        //     $aux=[];//Por defecto carrito sera un array vacio
        //     foreach($_SESSION["productos"] as $key => $value){
        //         if(isset($_SESSION["carrito"][$key])){
        //             $aux[$key]=$_SESSION["carrito"][$key];
        //         }
        //     }

            // $_SESSION["carrito"]=$aux;
            // setcookie("carrito", base64_encode(serialize($_SESSION['carrito'])), time() + 1 * 24 * 3600);
            // setcookie("productos", base64_encode(serialize($_SESSION['productos'])), time() + 1 * 24 * 3600);
            break;
    }
    header('Location: #');//Evito el autorenvio del formulario

}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css">
    <title>Carrito</title>
</head>

<body>
    <header>
        <h1>Shoes Store</h1>
    </header>
    <div class="container flex">
        <div class="carrito flex">
            <h1>Carrito</h1>
            <?php
                $totalCarrito=0;
                if (isset($_SESSION["carrito"])) {
                    foreach ($_SESSION["carrito"] as $codProd => $cant) {
                            $totalCarrito+=$_SESSION["productos"][$codProd]["precio"]*$cant; ?>
                            <div class="productos">
                                <a href="subSites/zapatos.php?zapato=<?=$codProd?>"><img src="../imgs/<?=$_SESSION["productos"][$codProd]["imagen"]; ?>" alt=""></a>
                                <br>
                                <?=$_SESSION["productos"][$codProd]["nombre"]?>
                                <br>
                                Precio: <?=$_SESSION["productos"][$codProd]["precio"]; ?>€
                                <br>
                                Unidades: <?=$cant; ?>
                                <form action="#" method="post">
                                <input type="hidden" name="codigo" value="<?=$codProd?>">
                                <button type="submit" value="eliminarUndCarrito" name="accion">Eliminar Unidad</button>
                                <button type="submit" value="eliminarProductoCarrito" name="accion">Eliminar Producto</button>
                                </form>
                            </div>
                <?php
                    }
                }
            
            ?>
            <form action="#" method="post" class="vaciarCarrito">
                <p>Total carrito : <?=$totalCarrito?>€</p>
                <button type="submit" value="vaciarCarrito" name="accion">Vaciar carrito</button>
            </form>
    
        </div>
        <br>
        <br>
        <div class="adminShop">
            <button onclick="window.location.replace('adminShop.php');">Administrar Tienda</button>
            <button onclick="window.location.replace('../Ej03.php');">Volver</button>
        </div>
    </div>
            <!-- <?php print_r($_SESSION["carrito"]);?>
            <br><br>
            <?php print_r($_SESSION["productos"]);?>
            <br><br>
            <?php print_r(unserialize(base64_decode($_COOKIE["carrito"]))); ?>
            <br><br>
            <?php 
            print_r(unserialize(base64_decode($_COOKIE["productos"]))); ?> -->
</body>

</html>