<?php
require "../utils/pdfcrowd.php";
include_once "../objetos/Factura.php"; 

$urlBack = "../Ej04.php";
    
if(session_status() == PHP_SESSION_NONE){
    session_start();
}
$factura = unserialize($_SESSION["facturaEj04"]);

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
$str .= $factura->imprimeFactura();
$str .= '</body>';
$str .= '</html>';

try
{
    // create the API client instance
    $client = new \Pdfcrowd\HtmlToPdfClient("demo", "ce544b6ea52a5621fb9d55f8b542d14d");

    // run the conversion and write the result to a file
    $client->convertStringToFile($str, "../Ticket/Factura-".$factura->getFecha().".pdf");
}
catch(\Pdfcrowd\Error $why)
{
    // report the error
    error_log("Pdfcrowd Error: {$why}\n");

    // rethrow or handle the exception
    throw $why;
}
unset($_SESSION["facturaEj04"]);
header("Location: $urlBack");