<?php 
if(session_status()==PHP_SESSION_NONE){
    session_start();
}
if(!isset($_SESSION["codigos"]) || !isset($_SESSION["cantidades"])){
    header("Location:../Ej05.php");
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
    <link rel="stylesheet" href="https://necolas.github.io/normalize.css/8.0.1/normalize.css">
    <link rel="stylesheet" href="../css/style.css">
    <title>Ticket</title>
</head>
<body>
    <div class="container">
    <div class="title">
            <h1>Ticket</h1>
        </div>
        <div class="table center ticket">
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
                        <td class="error-stock"><?=$_SESSION["StockInsuficiente"][$codigos[$i]]?></td>
                    <?php endif; ?>
                    <?php $precioTotal+=$producto[$codigos[$i]]["precio_venta"]*$cantidades[$i] ?>
                </tr>
                <?php endfor; ?>
                <tr class="total-pagar">
                    <td colspan="3">Total a pagar</td>
                    <td><?=$precioTotal?></td>
                </tr>
                </tbody>
            </table>
        </div>
        <a href="../Ej05.php" class="volver">Volver a la tienda</a>
    </div>
    <?php 
    unset($_SESSION);
    session_destroy();
    $conexion=null;?>
</body>
</html>    
