<?php
$cant = $_GET['cantidad'];
if ($_GET['moneda']=="eur") {
    $cantidad = $cant*166.386;
    $moneda="pesetas";
}
if ($_GET['moneda']=="pes") {
    $cantidad = $cant/166.386;
    $moneda="euros";
}
echo json_encode(['resultado' => $cantidad,'moneda' => $moneda]);