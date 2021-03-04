<?php 

require_once "../Model/CAutonoma.php";

$devolver = [];

function test(){
    return CAutonoma::getCAutonomas();
}

$devolver = test(); 
echo json_encode($devolver);
?>