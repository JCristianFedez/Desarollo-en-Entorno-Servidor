//TODO: POR HACER ENTRADA SALIDA DE PRODUCTO
<?php 
if(session_status()==PHP_SESSION_NONE){
    session_start();
}

require_once "utils/db_conect.php";
require_once "utils/db_consults.php";

$CANTIDAD_PRODUCTOS=showAllProducts($conexion)->rowCount();
$PORDUCTOS_POR_PAGINA=5;

//Cojo la pagina en la que estamos
if(!isset($_SESSION["pagina"])){
    $pag=0;
    $_SESSION["pagina"]=$pag;

}else{
    $pag=$_SESSION["pagina"];
}

//En caso de cambiar de pagina
if(isset($_REQUEST["pag-action"])){
    switch($_REQUEST["pag-action"]){
        case "back":
            $pag-=$PORDUCTOS_POR_PAGINA;
            if($pag<0)$pag=0;
            break;

        case "next":
            $pag+=$PORDUCTOS_POR_PAGINA;
            break;

        default://Se selecciona numero
            $pag=$_REQUEST["pag-action"];
            break;
    }
    $_SESSION["pagina"]=$pag;
}

//No romper en caso de que cambiemos de pagina y recargemos
if($pag<0){
    $pag=0;
    $_SESSION["pagina"]=$pag;
}elseif($pag>$CANTIDAD_PRODUCTOS){
    $pag-=$PORDUCTOS_POR_PAGINA;
    $_SESSION["pagina"]=$pag;
}

$productsList=showRangProducts($conexion,$pag,($pag+$PORDUCTOS_POR_PAGINA));
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://necolas.github.io/normalize.css/8.0.1/normalize.css">
    <link rel="stylesheet" href="css/style.css">
    <title>GESTISIMAL</title>
</head>

<body>
    <div class="container">
        <div class="title">
            <h1>GESTISIMAL</h1>
        </div>
        <div class="table">
            <table>
                <thead>
                    <tr>
                        <th>Codigo</th>
                        <th>Descripcion</th>
                        <th>Precio de compra</th>
                        <th>Precio de venta</th>
                        <th>Margen</th>
                        <th>Stock</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    while($product = $productsList->fetchObject()):
                    ?>
                    <tr>
                        <td><?=$product->codigo?></td>
                        <td><?=$product->descripcion?></td>
                        <td><?=$product->precio_compra?></td>
                        <td><?=$product->precio_venta?></td>
                        <td><?=$product->margen?></td>
                        <td><?=$product->stock?></td>
                        <td><a href="utils/action.php?action=delete&cod=<?=$product->codigo?>" class="fa icon delete"
                                onclick="return confirm('Estas seguro de eliminar a <?=$cliente->descripcion?>?');">
                                Borrar</a></td>
                        <td><a href="subSite/modProduct.php?cod=<?=$product->codigo?>" class="fa icon edit">Modificar</a></td>
                    </tr>
                    <?php
                    endwhile;
                ?>
                <tr>
                        <form action="utils/action.php" method="post">
                            <td><input type="text" name="codigo" id="name" required></td>
                            <td><input type="text" name="descripcion" id="name" required></td>
                            <td><input type="number" step=".01" name="precio_compra" id="name" required min=0></td>
                            <td><input type="number" step=".01" name="precio_venta" id="name" required min=0></td>
                            <td><input type="number" step=".01" name="margen" id="name" required min=0></td>
                            <td><input type="number" name="stock" id="name" required min=0></td>
                            <input type="hidden" name="action" value="add">
                            <td colspan="2"><button type="submit" class="fa icon add"> Añadir</button></td>
                        </form>
                    </tr>
                </tbody>
            </table>
            <div class="pag-select">
                <form action="#" method="post">
                    <?php 
                    if($pag>0){
                        echo '<button type="submit" name="pag-action" value="back" class="fa icon pag-button pag-back"></button>';
                    }
                    for ($i=0; $i < $CANTIDAD_PRODUCTOS; $i+=$CANTIDAD_PRODUCTOS) { 
                        echo '<button type="submit" name="pag-action" value="'.$i.'" class="pag-button pag-number">'.($i/$PORDUCTOS_POR_PAGINA).'</button>';
                    }
                    if(($pag*10)<$CANTIDAD_PRODUCTOS){
                        echo '<button type="submit" name="pag-action" value="next" class="fa icon pag-button pag-next"></button>';
                    }
                    ?>
                </form>
            </div>
        </div>
    </div>
</body>
<?php 
print_r($pag); ?>
</html>

<?php 

$conexion=null;
?>