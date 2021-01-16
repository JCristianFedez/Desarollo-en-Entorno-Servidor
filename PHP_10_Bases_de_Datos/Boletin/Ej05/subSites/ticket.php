<?php 
if(session_status()==PHP_SESSION_NONE){
    session_start();
}

require_once "../utils/db_conect.php";
require_once "../utils/db_consults.php";
$productsList=showAllProducts($conexion);
while($product = $productsList->fetchObject()){
    $producto[$product->codigo]["descripcion"]=$product->descripcion;
    $producto[$product->codigo]["precio_venta"]=$product->precio_venta;
}

$codigos=$_SESSION["codigos"];
$cantidades=$_SESSION["cantidades"];
$precioTotal=0;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ticket</title>
</head>
<body>
    <table>
        <thead>
            <tr>
                <th>Producto</th><th>Precio Unidad</th><th>Cantidad comprado</th><th>Precio total</th>
            </tr>
        </thead>
        <tbody>
    <?php for ($i=0; $i <count($codigos) ; $i++):?>
        <tr>
            <td><?=$producto[$codigos[$i]]["descripcion"]?></td>
            <td><?=$producto[$codigos[$i]]["precio_venta"]?></td>
            <td><?=$cantidades[$i]?></td>
            <td><?=$producto[$codigos[$i]]["precio_venta"]*$cantidades[$i]?></td>
            <?php if(isset($_SESSION["StockInsuficiente"][$codigos[$i]])):?>
                <td><?=$_SESSION["StockInsuficiente"][$codigos[$i]]?></td>
            <?php endif; ?>
            <?php $precioTotal+=$producto[$codigos[$i]]["precio_venta"]*$cantidades[$i] ?>
        </tr>
    <?php endfor; ?>
        <tr>
            <td colspan="3">Total a pagar</td>
            <td><?=$precioTotal?></td>
        </tr>
        </tbody>
    </table>
    <a href="../Ej05.php">Volver a la tienda</a>
    <?php unset($_SESSION);
    session_destroy();?>
</body>
</html>