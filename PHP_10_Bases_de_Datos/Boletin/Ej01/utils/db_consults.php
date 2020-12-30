<?php 

function showAll($conexion){
    return $conexion->query("SELECT * FROM cliente");
}
?>