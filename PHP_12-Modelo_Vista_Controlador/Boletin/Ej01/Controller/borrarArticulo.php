<?php 
require_once "../Model/Articulo.php";

$id = $_REQUEST["id"];
$articuloABorrar = new Articulo($id);

$articuloABorrar->delete();

header("Location: index.php");

?>