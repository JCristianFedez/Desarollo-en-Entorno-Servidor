<?php 

/**
 * SELECT * FROM producto ORDER BY codigo
 */
function showAllProducts($conexion){
    return $conexion->query("SELECT * FROM producto ORDER BY codigo;");
}

/**
 * SELECT * FROM producto
 * ORDER BY codigo
 * LIKE $start,$end;
 */
function showRangProducts($conexion,$start,$end){
    return $conexion->query(
        "SELECT * FROM producto
        ORDER BY codigo
        LIMIT $start,$end;");
}

/**
 * DELETE FROM producto 
 * WHERE DNI = $cod;
 */
function deleteProduct($cod){
    return
        "DELETE FROM producto
        WHERE codigo = '$cod';";
}

/**
 * "SELECT * FROM producto 
 * WHERE DNI = '$cod';"
 */
function showProduct($conexion,$cod){
    return $conexion->query(
        "SELECT * FROM producto
        WHERE DNI = '$cod'
        ORDER BY Nombre;");
}

/**
 * INSERT INTO producto (codigo, descripcion ,precio_compra
 * ,precio_venta, margen, stock) Values ("$cod","$descripcion"
 * ,"$precio_compra","$precio_venta","$margen","$stock");
 */
function addClient($codigo,$descripcion,$precio_compra,$precio_venta,$margen,$stock){
    return 
        "INSERT INTO producto (codigo, descripcion ,precio_compra,precio_venta, margen, stock)
        VALUES ('$codigo','$descripcion',$precio_compra,$precio_venta,$margen,$stock);";
}
?>