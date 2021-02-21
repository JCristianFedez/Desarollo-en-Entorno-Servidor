<?php 
include "../Model/Articulos.php";
$articulo=new Articulos(0, $_POST['titulo'], $_POST['fecha'], $_POST['contenido']);
$articulo->insert();
header("location: index.php");