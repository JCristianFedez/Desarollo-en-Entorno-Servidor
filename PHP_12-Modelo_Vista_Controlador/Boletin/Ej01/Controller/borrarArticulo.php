<?php 
require_once "../Model/Articulo.php";

$id = $_REQUEST["id"];
$articuloABorrar = Articulo::getArticuloById($id);

$articuloABorrar->delete();

header("Location: index.php");

?>