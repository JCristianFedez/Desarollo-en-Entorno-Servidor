<?php 

/**
 * $conexion es la conexion a la BD
 * $tabla es la tabla
 * $campos es un array con los valores que se devolveran
 * si no se rellena seran todos
 */
function selectRegister($conexion,$tabla,$campos=["*"]){
    $select=implode(",",$campos);
    return $conexion->query("SELECT $select FROM $tabla;");
}

/**
 * $conexion es la conexion a la BD
 * $tabla es la tabla
 * $dia es el dia al que se referencia
 * $hora es la hora a la que se referencia (primera,segunda...)
 * $nuevaAsignatura es la asignatura que se sobrescribira
 */
function modHora($conexion,$tabla,$dia,$hora,$nuevaAsignatura){
    $conexion->exec("UPDATE $tabla SET $hora='$nuevaAsignatura' WHERE dia='$dia';");
}
?>