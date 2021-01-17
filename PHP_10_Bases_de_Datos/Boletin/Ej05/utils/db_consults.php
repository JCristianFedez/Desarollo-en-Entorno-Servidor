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
function showRangProducts($conexion,$start,$cant){
    return $conexion->query(
        "SELECT * FROM producto
        ORDER BY codigo
        LIMIT $start,$cant;");
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
 * WHERE codigo = '$cod';"
 */
function showProduct($conexion,$cod){
    return $conexion->query(
        "SELECT * FROM producto
        WHERE codigo = '$cod'
        ORDER BY codigo;");
}

/**
 * INSERT INTO producto (codigo, descripcion ,precio_compra
 * ,precio_venta, margen, stock) Values ("$cod","$descripcion"
 * ,"$precio_compra","$precio_venta","$margen","$stock");
 */
function addProduct($codigo,$descripcion,$precio_compra,$precio_venta,$margen,$stock){
    return 
        "INSERT INTO producto (codigo, descripcion ,precio_compra,precio_venta, margen, stock)
        VALUES ('$codigo','$descripcion',$precio_compra,$precio_venta,$margen,$stock);";
}

/**
 * SELECT * FROM producto  
 * WHERE codigo='$cod'
 */
function selectProd($conexion,$cod){
    return $conexion->query("SELECT * FROM producto 
    WHERE codigo='$cod';");
}

/**
 * UPDATE producto
 * SET codigo='$codigo',descripcion='$descripcion',precio_compra=$precio_compra, 
 *  precio_venta=$precio_venta, margen=$margen, stock=$stock
 * WHERE codigo='$codigo';
 */
function editProduct($codigo,$descripcion,$precio_compra,$precio_venta,$margen,$stock){
    return 
        "UPDATE producto
        SET codigo='$codigo',descripcion='$descripcion',precio_compra=$precio_compra,
            precio_venta=$precio_venta, margen=$margen, stock=$stock
        WHERE codigo='$codigo';";
}

/**
 * Añade $cant de stock al producto con el codigo $codigo
 */
function entradaProduct($conexion,$codigo,$cant=1){
    $cantStock = selectProd($conexion,$codigo)->fetchObject()->stock;
    $cantStock+=$cant;
    $querry="UPDATE producto SET stock=$cantStock WHERE codigo='$codigo';";
    $conexion->exec($querry);
}

/**
 * Saca $cant de stock al producto con el codigo $codigo
 */
function saleProducto($conexion,$codigo,$cant=1){
    $cantStock = selectProd($conexion,$codigo)->fetchObject()->stock;
    if($cantStock>=$cant){
        $cantStock-=$cant;
        $querry="UPDATE producto SET stock=$cantStock WHERE codigo='$codigo';";
        $conexion->exec($querry);
        return true;
    }else{
        $querry="UPDATE producto SET stock=0 WHERE codigo='$codigo';";
        $conexion->exec($querry);
        return $cantStock;
    }

}
?>