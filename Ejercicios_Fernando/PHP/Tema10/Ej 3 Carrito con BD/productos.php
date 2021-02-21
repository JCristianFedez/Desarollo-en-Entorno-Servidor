<?php
session_start();
echo '<table border = "1">';
echo '<tr><th>Producto</th><th>Precio</th><th>Imagen</th><th></th></tr>';
foreach ($_SESSION['productos'] as $prod => $precio) {
    echo '<tr><td>' . $prod . '</td><td>' . $precio[0] . '</td><td><img style="width:100px" src="' . $prod . '.png"/></td><td>';
    ?>
    <form action="borraProducto.php" method="post">
        <input type="hidden" name="prod" value="<?=$prod?>">
        <input type="submit" value="Borrar">
    </form>
    <?php
echo '</td></tr>';
}
echo '<tr><th colspan=4><form action="nuevoProducto.php" method="post"><input type="submit" value="Añadir Nuevo Producto"></form></th></tr>';
echo '</table>';

?>
<a href="Carrito.php">Cerrar</a>