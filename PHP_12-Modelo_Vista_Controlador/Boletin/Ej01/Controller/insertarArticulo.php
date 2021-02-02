<?php 

require_once "../Model/Articulo.php";

$titulo = $_REQUEST["titulo"];
$contenido = $_REQUEST["contenido"];

$nuevoArticulo = new Articulo(null,$titulo,$contenido,null);
print_r($nuevoArticulo);
$nuevoArticulo->insert();

header("Location: index.php");
