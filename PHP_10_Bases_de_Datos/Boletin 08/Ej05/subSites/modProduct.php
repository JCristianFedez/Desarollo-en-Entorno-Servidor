<?php 
if(isset($_REQUEST["codigo"])){
    require_once "../utils/db_conect.php";
    require_once "../utils/db_consults.php";
    $producto = selectProd($conexion,$_REQUEST["codigo"])->fetchObject();

    $codigo=$producto->codigo;
    $descripcion=$producto->descripcion;
    $precio_compra=$producto->precio_compra;
    $precio_venta=$producto->precio_venta;
    $margen=$producto->margen;
    $stock=$producto->stock;

}else{
    header("Location:../Ej04.php");

}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://necolas.github.io/normalize.css/8.0.1/normalize.css">
    <!-- <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css"> -->
    <link rel="stylesheet" href="../css/style.css">
    <title>Modificar Producto</title>
</head>

<body>
    <br>
    <h2 style="text-align:center;">Modificar <?=$descripcion?></h2>
    <form action="../utils/db_actions.php" method="post" class="mod-form">
        <div class="mod-form-item">
            <label for="codigo">Codigo: </label>
            <input type="text" name="codigo" id="codigo" value="<?=$codigo?>" readonly>
        </div>
        <div class="mod-form-item">
            <label for="descripcion">Descripcion: </label>
            <input type="text" name="descripcion" id="descripcion" value="<?=$descripcion?>" required>
        </div>
        <div class="mod-form-item">
            <label for="precio_compra">Precio de compra: </label>
            <input type="number" min="0" step="0.01" name="precio_compra" id="precio_compra" value="<?=$precio_compra?>" required>
        </div>
        <div class="mod-form-item">
            <label for="precio_venta">Precio de venta: </label>
            <input type="number" min="0" step="0.01" name="precio_venta" id="precio_venta" value="<?=$precio_venta?>" required>
        </div>
        <div class="mod-form-item">
            <label for="margen">Margen: </label>
            <input type="number" min="0" step="0.01" name="margen" id="margen" value="<?=$margen?>" required>
        </div>
        <div class="mod-form-item">
            <label for="stock">Stock: </label>
            <input type="number" min="0" name="stock" id="stock" value="<?=$stock?>" required>
        </div>
        <div class="mod-form-button">
            <button type="submit" value="edit" name="action" class="fa icon add">Guardar</button>
            <button type="submit" class="fa icon delete">Cancelar</button>
        </div>
    </form>
</body>

</html>

<?php 
$conexion=null;
?>