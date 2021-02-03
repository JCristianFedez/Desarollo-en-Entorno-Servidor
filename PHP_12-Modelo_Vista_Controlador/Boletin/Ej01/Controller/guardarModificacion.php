<?php 
require_once "../Model/Articulo.php";


    $id = $_REQUEST["id"];
    $titulo = $_REQUEST["titulo"];
    $contenido = $_REQUEST["contenido"];
    
    $articulo = Articulo::getArticuloById($id);
    $articulo->setTitulo($titulo);
    $articulo->setContenido($contenido);
    $articulo->update();


header("Location: index.php");
?>