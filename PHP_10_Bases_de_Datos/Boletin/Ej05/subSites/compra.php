<?php 
if(session_status()==PHP_SESSION_NONE){
    session_start();
}
require_once "../utils/db_conect.php";
require_once "../utils/db_consults.php";
$max=showAllProducts($conexion)->rowCount();

$productsList=showAllProducts($conexion);
$codes=[];
while($product = $productsList->fetchObject()){
    $codes[]=$product->codigo;
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <title>Comprar</title>
</head>
<body>
    <?php 
    if(!isset($_REQUEST["cantProductosComprar"])){
    ?>
        <form action="#" method="post">
            <input type="number" name="cantProductosComprar" id="" min=0 max=<?=$max?> required>
            <input type="submit" value="Empezar a comprar">
        </form>
    <?php
    }else{
        echo "<form action='../utils/db_actions.php' method='post'>";
        for ($i=0; $i < $_REQUEST["cantProductosComprar"]; $i++): 
            ?>
            <label for="codigo<?=$i?>">Producto <?=$i?></label>
            <select name="cod[]" id="codigo<?=$i?>" required>
            <?php foreach ($codes as $value): ?>
                <option value="<?=$value?>"><?=$value?></option>
            <?php endforeach; ?>
            </select>
            <label for="cantidad<?=$i?>">Cantidad</label>
            <input type="number" name="cant[]" id="cantidad<?=$i?>" required min=0>
            <br>
            <?php
        endfor;
            echo "<button type='submit' value='comprar' name='action'>Comprar</button>";
            echo "<a href='../Ej05.php'>Cancelar</a>";
        echo "</form>";
    }

    ?>
</body>
</html>