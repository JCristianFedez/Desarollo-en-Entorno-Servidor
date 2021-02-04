<?php
require "../Model/pdfcrowd.php";

include_once "../Model/Producto.php";
include_once "../Model/Carrito.php";

$allCarrito=Carrito::getFullCarrito();
$ticket = "";
$totalCarrito = 0;
foreach($allCarrito as $codigo => $carritoProd){
    $prod=Producto::getProductoById($carritoProd->getIdProd());
    $totalCarrito+=$prod->getPrecio()*$carritoProd->getCant();
    $ticket .= "<tr>";
    $ticket .= "<td>".$prod->getNombre()."</td>";
    $ticket .= "<td>".$prod->getPrecio()."</td>";
    $ticket .= "<td>".$carritoProd->getCant()."</td>";
    $ticket .= "<td>".($carritoProd->getCant() * $prod->getPrecio())."</td>";
    $ticket .= "</tr>";
}

$str = '<!DOCTYPE html>';
$str .= '<html lang="en">';
$str .= '<head>';
$str .= '<meta charset="UTF-8">';
$str .= '<meta name="viewport" content="width=device-width, initial-scale=1.0">';
$str .= '<title>Factura</title>';
$str .= '<style>';
$str .= 'table,td,th{';
$str .= 'border: 1px solid black;';
$str .= 'border-collapse: collapse;';
$str .= '}';
$str .= 'td,th{';
$str .= 'padding: .5rem;';
$str .= '}';
$str .= '</style>';
$str .= '</head>';
$str .= '<body>';
$str .= "<table>";
$str .= "<thead>";
$str .= "<tr><th colspan=4>Ticket ".date("d-m-y")."</th></tr>";
$str .= "</thead>";
$str .= "<tbody>";
$str .= "<tr><td>Producto</td><td>€/U</td><td>Unds</td><td>Total</td></tr>";
$str .= $ticket;
$str .= "<tr><td colspan=3>Total a pagar</td><td>$totalCarrito</td></tr>";
$str .= "</tbody>";
$str .= "</table>";
$str .= '</body>';
$str .= '</html>';

try
{
    // create the API client instance
    $client = new \Pdfcrowd\HtmlToPdfClient("demo", "ce544b6ea52a5621fb9d55f8b542d14d");

    // run the conversion and write the result to a file
    $client->convertStringToFile($str, "../Ticket/Factura-".date("d-m-y-s").".pdf");
}
catch(\Pdfcrowd\Error $why)
{
    // report the error
    error_log("Pdfcrowd Error: {$why}\n");

    // rethrow or handle the exception
    throw $why;
}

Carrito::realizarCompra();

header("Location: index.php");