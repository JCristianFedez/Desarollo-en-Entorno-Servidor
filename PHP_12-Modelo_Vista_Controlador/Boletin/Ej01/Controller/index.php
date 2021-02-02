<?php 
require_once "../Model/Articulo.php";
$data["articulos"] = Articulo::getArticulos();



include_once "../View/listaArticulos.php";
