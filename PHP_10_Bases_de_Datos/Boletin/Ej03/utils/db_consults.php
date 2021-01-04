<?php 
/**
 * SELECT * FROM productos ORDER BY nombre
 */
function showAllProducts($conexion){
    return $conexion->query("SELECT * FROM productos ORDER BY nombre");
}

/**
 * SELECT * FROM carrito ORDER BY nombre
 */
function loadCarrito($conexion){
    return $conexion->query("SELECT * FROM carrito");
}

/**
 * SELECT sum(cant) FROM carrito
 */
function cantProdCarrito($conexion){
    return $conexion->query("SELECT sum(cant) as 'cantidad' FROM carrito");
}

/**
 * TRUNCATE TABLE carrito
 */
function deleteCarrito($conexion){
    $conexion->query("TRUNCATE TABLE carrito");
}

/**
 * SELECT * FROM productos  
 * WHERE clave='$claveProd'
 */
function selectProd($conexion,$claveProd){
    return $conexion->query("SELECT * FROM productos 
    WHERE clave='$claveProd'");
}

/**
 * SELECT * FROM carrito 
 * WHERE clave_prod='$claveProd'
 */
function selectCarritoProd($conexion,$claveProd){
    return $conexion->query("SELECT * FROM carrito 
    WHERE clave_prod='$claveProd'");
}

function addToCarrito($conexion,$claveProd,$cantAdd){
    if($cantAux=selectCarritoProd($conexion,$claveProd)->fetchObject()->cant){
        $cantAux++;
        $conexion->query("UPDATE carrito SET cant=$cantAux
        WHERE carrito.clave_prod='$claveProd'");

    }else{
        print_r($cantAdd);
        $conexion->query("INSERT INTO carrito (clave_prod,cant) 
        VALUES ('$claveProd',$cantAdd)");
    }

}
?>