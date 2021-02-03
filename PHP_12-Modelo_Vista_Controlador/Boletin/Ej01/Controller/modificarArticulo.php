<?php 
require_once "../Model/Articulo.php";
$id = $_REQUEST["id"];
$data["articulo"] = Articulo::getArticuloById($id);



include_once "../View/datosArticuloModificar.php";
