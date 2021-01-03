<!-- Modifica el ejercicio 6 del carrito de la compra, 
del tema de sesiones, para que los productos se
almacenen en un fichero. Debes crear una página 
para administrar los productos de la tienda (que están
almacenados en el fichero). Puedes trabajar con 
los productos en un array de sesión, pero cuando se
añada o se borre un producto de la tienda, será 
necesario actualizar el fichero. También debes
completar el ejercicio guardando la cesta de la 
compra en una cookie, de manera que se pueda retomar
la compra aunque se cierre el navegador. (Ejercicio completo)  -->
<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$FILE_PRODUCTS="file_data/productosTienda.txt";
$FILE_PRODUCTS_DEFAULT="file_data/productosTiendaDefault.txt";
$FILE_CART="file_data/carrito.txt";


//Cargo carrito
if (file_exists($FILE_CART) && !isset($_SESSION["carrito"])) {
    $file=fopen($FILE_CART,"r");//Abro el archivo en lectura
    while($row=fgetcsv($file)){//Mientras no sea nula la fila se repite
        $carritoItems[$row[0]]=$row[1];
    }
    fclose($file);

    $_SESSION["carrito"]=$carritoItems;
}
//Estructura de Carrito:  $_SESSION["carrito"]=["NikeISPA" => 0, "ColumVit" => 0, "NikeBenJerry" => 0, "AdidasYeezy" => 0];


//Cargo productos
if (file_exists($FILE_PRODUCTS) && !isset($_SESSION["productos"])) {
    
    $file=fopen($FILE_PRODUCTS,"r");//Abro el archivo en lectura
    $key=fgetcsv($file);//Cojo la primera fila como clave

    while($row=fgetcsv($file)){//Mientras no sea nula la fila se repite
        // if(!$row[0])continue;
        for ($i=1; $i < count($key); $i++) { 
            $nextItem[$key[$i]]=$row[$i];
        }
        $result[$row[0]]=$nextItem;
    }
    fclose($file);

    $_SESSION["productos"]=$result;
}


//Si no se ha cargado los productos
if (!file_exists($FILE_PRODUCTS) && !isset($_SESSION["productos"])) {
    $defaultFile=file_get_contents($FILE_PRODUCTS_DEFAULT);
    file_put_contents($FILE_PRODUCTS,$defaultFile);


    $file=fopen($FILE_PRODUCTS,"r");//Abro el archivo en lectura
    $key=fgetcsv($file);//Cojo la primera fila como clave

    while($row=fgetcsv($file)){//Mientras no sea nula la fila se repite
        // if(!$row[0])continue;
        for ($i=1; $i < count($key); $i++) { 
            $nextItem[$key[$i]]=$row[$i];
        }
        $result[$row[0]]=$nextItem;
    }
    fclose($file);

    $_SESSION["productos"]=$result;
}



if (isset($_REQUEST["accion"])) {//Al pulsar un boton
    $accion=$_REQUEST["accion"];
    
    if (isset($_REQUEST["codigo"])) {
        $codigo=$_REQUEST["codigo"];
    }
    switch ($accion) {
        case 'agregarCarrito':
            if(!isset($_SESSION["carrito"][$codigo])){
                $_SESSION["carrito"][$codigo]=1;
            }else{
                $_SESSION["carrito"][$codigo]++;
            }
            
            $newCarrito="";
            $newFile=fopen($FILE_CART,"w");
            
            foreach ($_SESSION["carrito"] as $key => $value) {
                $newCarrito.="\"$key\",";
                $newCarrito.="\"$value\"";
                $newCarrito.="\n";
            }
            $newCarrito=substr($newCarrito,0,-1);//Quito ultimo salto de linea
            fwrite($newFile,"$newCarrito");
        
            fclose($newFile);

        break;

        // case 'eliminarUndCarrito':
        //     $_SESSION["carrito"][$codigo]--;
        //     setcookie("carrito", base64_encode(serialize($_SESSION['carrito'])), time() + 1 * 24 * 3600);
        // break;

        // case 'eliminarProductoCarrito':
        //     unset($_SESSION["carrito"][$codigo]);
        //     setcookie("carrito", base64_encode(serialize($_SESSION['carrito'])), time() + 1 * 24 * 3600);
        // break;

        case 'vaciarCarrito':
            // session_destroy();
            unlink($FILE_CART);//Elimino el archivo
            unset($_SESSION["carrito"]);
        break;

        case 'borrarCookiesProductos':
            unlink($FILE_PRODUCTS);//Elimino el archivo
            unset($_SESSION["productos"]);
            break;

        case 'actualizarCookiesProductos':
            //Si elimino un producto lo elimino del carrito
            $aux=[];//Por defecto carrito sera un array vacio
            foreach($_SESSION["productos"] as $key => $value){
                if(isset($_SESSION["carrito"][$key])){
                    $aux[$key]=$_SESSION["carrito"][$key];
                }
            }

            $_SESSION["carrito"]=$aux;

            //Actualizo el fichero de carrito
            $newCarrito="";
            $cart_file=fopen($FILE_CART,"w");
            
            foreach ($_SESSION["carrito"] as $key => $value) {
                $newCarrito.="\"$key\",";
                $newCarrito.="\"$value\"";
                $newCarrito.="\n";
            }
            $newCarrito=substr($newCarrito,0,-1);//Quito ultimo salto de linea
            fwrite($cart_file,"$newCarrito");
        
            fclose($cart_file);

            
            //Actualizo el fichero de productos
            $claves="";
            $valores="";
            $product_file=fopen("$FILE_PRODUCTS","w");
    
            foreach ($_SESSION["productos"] as $key => $value) {
                $valores.="\"$key\",";
                $claves="\"clave\",";
                foreach ($value as $secondKey => $val) {
                    $claves.="\"$secondKey\",";
                    $valores.="\"$val\",";
                }
                $valores=substr($valores,0,-1);//Quito ultima coma
                $valores.="\n";//Añado salto de linea
            }
            $valores=substr($valores,0,-1);//Quito ultimo salto de linea
            $claves=substr($claves,0,-1);//Quito ultima coma
    
            fwrite($product_file,"$claves\n$valores");
    
            fclose($product_file);
            break;
    }
    // header("refresh: 0");//Preguntar a fernando porque falla al tercer añadido
    header('Location: #');//Evito el autorenvio del formulario

}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css">
    <link rel="stylesheet" href="style.css">
    <title>Ej03</title>
</head>

<body>
    <header>
        <h1>Shoes Store</h1>
    </header>
    <div class="container flex">
        <h1>Productos</h1>
        <?php
            foreach ($_SESSION["productos"] as $codigo => $producto) {
                if($producto["urlLocal"]){
                    $aux="imgs/";
                }else{
                    $aux="";
                }
                ?>
        <div class="productos">

            <a href="subSites/zapatos.php?zapato=<?=$codigo?>"><img src="<?=$aux.$producto["imagen"]; ?>" alt=""></a>
            <br>
            <?=$producto["nombre"]?>
            <br>
            Precio: <?=$producto["precio"]?>€
            <form action="" method="post">
                <input type="hidden" name="codigo" value="<?=$codigo?>">
                <button type="submit" value="agregarCarrito" name="accion">Agregar al carrito</button>
            </form>
        </div>
        <?php
            }
            ?>

        <div class="carritoIcon">
            <?php
                $totalCarrito=0;
                if(isset($_SESSION["carrito"])){
                    foreach ($_SESSION["carrito"] as $prod => $cant) {
                        $totalCarrito+=$cant;
                    }
                }
            ?>
            <a href="subSites/carrito.php"><i class="fas fa-shopping-cart"></i>Cant: <?=$totalCarrito?></a>

            <form action="#" method="post">
                <button type="submit" value="vaciarCarrito" name="accion">Vaciar carrito</button>
            </form>
        </div>
        <br>
        <br>
        <div class="adminShop">
            <button onclick="window.location.replace('subSites/adminShop.php');">Administrar Tienda</button>
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