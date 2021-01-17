<?php 
//TODO: Poner bonita la pagina de compra y ticket
if(session_status()==PHP_SESSION_NONE){
    session_start();
}

require_once "utils/db_conect.php";
require_once "utils/db_consults.php";
require_once "utils/pagSelected.php";
require_once "utils/errorMesages.php";


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
                        <th colspan="4"></th>
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
                        <td><a href="utils/db_actions.php?action=delete&codigo=<?=$product->codigo?>" class="fa icon delete"
                                onclick="return confirm('Estas seguro de eliminar a <?=$product->descripcion?>?');">
                                Borrar</a></td>
                        <td><a href="subSites/modProduct.php?codigo=<?=$product->codigo?>" class="fa icon edit">Modificar</a></td>
                        <td><a href="utils/db_actions.php?action=enter&codigo=<?=$product->codigo?>" class="fa icon enter">Entada</a></td>
                        <td><a href="utils/db_actions.php?action=exit&codigo=<?=$product->codigo?>" class="fa icon exit">Salida</a></td>
                    </tr>
                    <?php
                    endwhile;
                ?>
                <tr>
                        <form action="utils/db_actions.php" method="post">
                            <td><input type="text" name="codigo" id="name" required></td>
                            <td><input type="text" name="descripcion" id="name" required></td>
                            <td><input type="number" step=".01" name="precio_compra" id="name" required min=0></td>
                            <td><input type="number" step=".01" name="precio_venta" id="name" required min=0></td>
                            <td><input type="number" step=".01" name="margen" id="name" required min=0></td>
                            <td><input type="number" name="stock" id="name" required min=0></td>
                            <input type="hidden" name="action" value="add">
                            <td colspan="4"><button type="submit" class="fa icon add"> Añadir</button></td>
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

                    for ($i=0; $i < $CANTIDAD_PRODUCTOS; $i+=$PORDUCTOS_POR_PAGINA) {
                        if($pag==$i){
                            $select="pag-number-selected";
                        }else{
                            $select="pag-button";
                        }
                        echo '<button type="submit" name="pag-action" value="'.$i.'" class="pag-number '.$select.'">'.($i/$PORDUCTOS_POR_PAGINA).'</button>';
                    }
                    if(($pag+$PORDUCTOS_POR_PAGINA)<$CANTIDAD_PRODUCTOS){
                        echo '<button type="submit" name="pag-action" value="next" class="fa icon pag-button pag-next"></button>';
                    }
                    ?>
                </form>
            </div>
        </div>
        <?=$mesage?>
    </div>
    <div class="buy-container">
    <a href="subSites/compra.php" class="buy">Comprar</a>
    </div>
</body>
</html>

<?php 

$conexion=null;
?>