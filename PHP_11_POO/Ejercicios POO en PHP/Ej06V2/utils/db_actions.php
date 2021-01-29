<?php 

require_once "../objetos/Producto.php";
require_once "../objetos/Carrito.php";

if(session_status() == PHP_SESSION_NONE){
    session_start();
}

switch($_REQUEST["accion"]){
    case "vaciarCarrito":
        Carrito::vaciarCarrito();
        break;
        
    case "agregarCarrito":
        if($carritoProd = Carrito::getProdCarritoByClave($_REQUEST["codigo"])){
            $carritoProd->agregar(1);
        }else{
            $carritoProd = new Carrito($_REQUEST["codigo"],0);
            $carritoProd->insert();
            $carritoProd->agregar(1);
        }
        break;

    case "agregarProducto":
        $urlLocal=(isset($_REQUEST["urlLocal"]))?1:0;
        $newProd = new Producto(
            null,$_REQUEST["nombre"],
            $_REQUEST["precio"],$_REQUEST["imagen"],
            $urlLocal,$_REQUEST["stock"]
        );
        $newProd->insert();
        break;

    case "modificarProducto":
        $urlLocal=(isset($_REQUEST["urlLocal"]))?1:0;

        $prodAModificar = Producto::getProductoByClave($_REQUEST["codigo"]);
        $prodAModificar->setNombre($_REQUEST["nombre"]);
        $prodAModificar->setPrecio($_REQUEST["precio"]);
        $prodAModificar->setImagen($_REQUEST["imagen"]);
        $prodAModificar->setUrl_local($urlLocal);
        $prodAModificar->setStock($_REQUEST["stock"]);

        $prodAModificar->update();
        break;

    case "eliminarUndCarrito":
        $carritoProd = Carrito::getProdCarritoByClave($_REQUEST["codigo"]);
        $carritoProd->quitar(1);

        break;
        
    case "eliminarProductoCarrito":
        $carritoProd = Carrito::getProdCarritoByClave($_REQUEST["codigo"]);
        $carritoProd->delete();
        
        break;

    case "eliminarProducto":
        $prodCarrito = Carrito::getProdCarritoByClave($_REQUEST["codProducto"]);
        $prod = Producto::getProductoByClave($_REQUEST["codProducto"]);
        $prodCarrito->delete();
        $prod->delete();
        break;
}

if(isset($_REQUEST["returnTo"])){
    header("Location: ../".$_REQUEST["returnTo"]);
}else{
    header("Location:../Ej06.php");
}

?>

