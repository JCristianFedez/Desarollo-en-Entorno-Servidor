<?php 
$CANTIDAD_PRODUCTOS=showAllProducts($conexion)->rowCount();
$PORDUCTOS_POR_PAGINA=5;

//Cojo la pagina en la que estamos
if(!isset($_SESSION["pagina"])){
    $pag=0;
    $_SESSION["pagina"]=$pag;

}else{
    $pag=$_SESSION["pagina"];
}

//En caso de cambiar de pagina
if(isset($_REQUEST["pag-action"])){
    switch($_REQUEST["pag-action"]){
        case "back":
            $pag-=$PORDUCTOS_POR_PAGINA;
            if($pag<0)$pag=0;
            break;

        case "next":
            $pag+=$PORDUCTOS_POR_PAGINA;
            break;

        default://Se selecciona numero
            $pag=$_REQUEST["pag-action"];
            break;
    }
    $_SESSION["pagina"]=$pag;
}

//No romper en caso de que cambiemos de pagina y recargemos
if($pag<0){
    $pag=0;
    $_SESSION["pagina"]=$pag;
}elseif($pag>$CANTIDAD_PRODUCTOS){
    $pag-=$PORDUCTOS_POR_PAGINA;
    $_SESSION["pagina"]=$pag;
}

$productsList=showRangProducts($conexion,$pag,$PORDUCTOS_POR_PAGINA); 
$conexion=null;?>