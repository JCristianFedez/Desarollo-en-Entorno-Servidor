<?php 
if(session_status() == PHP_SESSION_NONE){
    session_start();
}

if(isset($_REQUEST["accion"])){
    if($_REQUEST["accion"]=="agregarProducto"){
        if(isset($_REQUEST["urlLocal"])){
            $aux=true;
        }else{
            $aux=false;
        }
        $_SESSION["productos"][$_REQUEST["codigo"]]=[
            "nombre"=>$_REQUEST["nombre"],
            "precio"=>$_REQUEST["precio"],
            "imagen"=>$_REQUEST["imagen"],
            "urlLocal"=>$aux];
    }

    if($_REQUEST["accion"] == "modificarProducto"){
        $_SESSION["productos"][$_REQUEST["codigo"]]=[
            "nombre"=>$_REQUEST["nombre"],
            "precio"=>$_REQUEST["precio"],
            "imagen"=>$_REQUEST["imagen"],
            "urlLocal"=>$aux];
    }

    if($_REQUEST["accion"] == "eliminarProducto"){
        unset($_SESSION["productos"][$_REQUEST["codigo"]]);
        setcookie("productos", base64_encode(serialize($_SESSION['productos'])), time() + 1 * 24 * 3600);
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
    <header>
        <h1>Shoes Store</h1>
    </header>
    <div class="container flex">
        <?php 
            foreach ($productos as $codigo => $producto) {
                if($producto["urlLocal"]){
                    $aux="../imgs/";
                }else{
                    $aux="";
                }
                    ?>
        <div class="productos">
            <img src="<?=$aux.$producto["imagen"]; ?>" alt="">
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
        <div class="adminShop">
            <form action="agregarProducto.php" method="post">
                <input type="submit" value="Añadir nuevo producto">
            </form>
            <form action="../Ej13.php" method="post">
                <input type="hidden" name="accion" value="borrarCookiesProductos">
                <input type="submit" value="Restablecer Productos">
            </form>

            <form action="../Ej13.php" method="post">
                <input type="hidden" name="accion" value="actualizarCookiesProductos">
                <input type="submit" value="Guardar cambios">
            </form>
        </div>

    </div>
    <!-- <?php print_r(unserialize(base64_decode($_COOKIE["productos"]))); ?> -->

</body>

</html>