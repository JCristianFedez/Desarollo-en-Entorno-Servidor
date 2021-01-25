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
 * Elimina $cant cantidad de unidades, si 
 * no se establece nada se elimina el producto
 */
function deleteProdCarrito($conexion,$claveProd,$cantDelete=0){
    $prodAux=selectCarritoProd($conexion,$claveProd)->fetchObject()->cant;

    if(($prodAux-$cantDelete>0)&&($cantDelete>0)){
        $cantAux = $prodAux-$cantDelete;
        $conexion->query("UPDATE carrito
        SET cant=".$cantAux."
        WHERE clave_prod='$claveProd'");

    }elseif(($prodAux-$cantDelete<=0)||($cantDelete<=0)){
        $conexion->query("DELETE FROM carrito
                        WHERE clave_prod='$claveProd'");
    }

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
 * ELimina producto si existe
 */
function deleteProd($conexino,$claveProd){
    $conexino->query("DELETE FROM productos
                    WHERE clave='$claveProd'
                    AND EXISTS(SELECT 1 FROM productos WHERE clave ='$claveProd' LIMIT 1)");
}

/**
 * SELECT * FROM carrito 
 * WHERE clave_prod='$claveProd'
 */
function selectCarritoProd($conexion,$claveProd){
    return $conexion->query("SELECT * FROM carrito 
    WHERE clave_prod='$claveProd'");
}

function addToCarrito($conexion,$claveProd,$cantAdd = 1){
    //Si ya esta en carrito le sumo 1
    if($cantAux=selectCarritoProd($conexion,$claveProd)->fetchObject()->cant){
        $cantAux++;
        $conexion->query("UPDATE carrito SET cant=$cantAux
        WHERE carrito.clave_prod='$claveProd'");

    }else{
        $conexion->query("INSERT INTO carrito (clave_prod,cant) 
        VALUES ('$claveProd',$cantAdd)");
    }

}

function quitarStock($conexion,$claveProd,$cantQuitar = 1){
    if($cantAux=selectProd($conexion,$claveProd)->fetchObject()->stock){
        $cantAux -= $cantQuitar;
        $conexion->query("UPDATE productos SET stock=$cantAux
        WHERE productos.clave='$claveProd'");
        return true;
    }else{
        return false;
    }
}

function addStock($conexion,$claveProd,$cantAdd = 1){
    if($cantAdd >= 0){
        $cantAux=selectProd($conexion,$claveProd)->fetchObject()->stock;
        $cantAux += $cantAdd;
        $conexion->query("UPDATE productos SET stock=$cantAux
        WHERE productos.clave='$claveProd'");
        return true;    
        }else{
        return false;
    }
}

/**
 * INSERT INTO productos (clave,nombre,precio,imagen,url_local,stock) 
 * VALUES ($claveProd,$nombre,$precio,$imagen,$urlLocal,$stock
 */
function addProductShop($conexion,$claveProd,$nombre,$precio,$imagen,$urlLocal,$stock){
    $conexion->query("INSERT INTO productos (clave,nombre,precio,imagen,url_local,stock)
                    VALUES ('$claveProd','$nombre',$precio,'$imagen',$urlLocal,$stock)");
}

/**
 * UPDATE productos 
 * SET nombre='$nombre',precio=$precio,imagen='$imagen',url_local=$urlLocal,$stock=$stock
 * WHERE clave='$claveProd'
 */
function modProductShop($conexion,$claveProd,$nombre,$precio,$imagen,$urlLocal,$stock){
    $conexion->query("UPDATE productos 
                    SET nombre='$nombre',precio=$precio,imagen='$imagen',url_local=$urlLocal,stock=$stock
                    WHERE clave='$claveProd'");
}
?>