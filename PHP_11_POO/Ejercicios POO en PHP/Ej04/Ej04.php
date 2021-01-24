<?php 

include_once "objetos/Factura.php"; 

if(session_status() == PHP_SESSION_NONE){
    session_start();
}


if(!isset($_SESSION["facturaEj04"])){
    $_SESSION["facturaEj04"] = serialize(new Factura(null));
}

$factura = unserialize($_SESSION["facturaEj04"]);

if(isset($_REQUEST["pagado"])){
    $factura->setEstado("Pagado");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Factura</title>
    <style>
    table,td,th{
        border: 1px solid black;
        border-collapse: collapse;
    }

    td,th{
        padding: .5rem;
    }
    </style>
</head>
<body>
    <form action="actions/addProd.php" method="post">
    <fieldset>
        <legend>Añadir producto</legend>
        <input type="text" name="nombre" id="nombre" required placeholder="Nombre Prod">
        <br>
        <input type="number" step="0.01" name="cantidad" id="cantidad" required min="1" placeholder="Cantidad">
        <br>
        <input type="number" step="0.01" name="precio" id="precio" required min="1" placeholder="Precio">
        <br>
        <input type="submit" value="Añadir producto">
    </fieldset>
    </form>
    <form action="#" method="post">
        <input type="hidden" name="pagado">
        <input type="submit" value="Pagar">
    </form>
    <form action="actions/reset.php" method="post">
        <input type="submit" value="Resetear Factura">
    </form>
    <form action="actions/imprimir.php" method="post">
        <input type="submit" value="Imprime factura">
    </form>

    <br>
    <br>
    <?php 
    echo $factura->imprimeFactura();
    ?>
</body>
</html>
