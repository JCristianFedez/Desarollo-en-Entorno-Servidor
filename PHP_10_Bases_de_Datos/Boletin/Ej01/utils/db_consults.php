<?php 
/**
 * SELECT * FROM cliente
 */
function showAll($conexion){
    return $conexion->query("SELECT * FROM cliente;");
}

/**
 * "SELECT * FROM cliente 
 * WHERE DNI = '$dni';"
 */
function showClient($conexion,$dni){
    return $conexion->query(
        "SELECT * FROM cliente
        WHERE DNI = '$dni';");

}

/**
 * DELETE FROM cliente 
 * WHERE DNI = $dni;
 */
function deleteClient($dni){
    return
        "DELETE FROM cliente
        WHERE DNI = '$dni';";
}

/**
 * UPDATE cliente 
 * SET Nombre='$nombre',Direccion='$direccion',Telefono='$telefono'
 * WHERE DNI='$dni';
 */
function editClient($dni,$nombre,$direccion,$telefono){
    return 
        "UPDATE cliente 
        SET Nombre='$nombre',Direccion='$direccion',Telefono='$telefono'
        WHERE DNI='$dni';";
}

/**
 * INSERT INTO clinete (DNI, Nombre ,Direccion
 * ,Telefono) Values ("$dni","$nombre","$direccion","$tlfn");
 */
function addClient($dni,$nombre,$direccion,$tlfn){
    return 
        "INSERT INTO cliente (DNI,Nombre,Direccion,Telefono)
        VALUES ('$dni','$nombre','$direccion',$tlfn);";
}
?>