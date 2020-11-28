<?php 
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if(isset($_REQUEST["accion"])){
    //Añadir palabra
    if($_REQUEST["accion"] == "agregar"){
        $_SESSION["diccionario"][$_REQUEST["espanol"]] = $_REQUEST["ingles"];
    }

    //Modificar palabra
    if($_REQUEST["accion"] == "modificar"){
        $_SESSION["diccionario"][$_REQUEST["espanol"]] = $_REQUEST["ingles"];
    }

    //Eliminar palabra
    if($_REQUEST["accion"] == "eliminar"){
        unset($_SESSION["diccionario"][$_REQUEST["espanol"]]);//Elimino la palabra de la sesion
        setcookie($_REQUEST["espanol"],NULL, -1);//Elimino la cookie
    }
}

$diccionario = $_SESSION["diccionario"];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrar Palabras</title>
</head>
<body>
    <table>
        <thead>
            <th>ESPAÑOl</th><th>INGLES</th>
        </thead>
        <tbody>
            <?php 
            foreach ($diccionario as $spanish => $english) {
                ?>
                <tr>
                    <td><?=$spanish?></td><td><?=$english?></td>
                    <td>
                        <form action="#" method="post">
                            <input type="hidden" name="espanol" value="<?=$spanish?>">
                            <input type="submit" name="accion" value="eliminar">
                        </form>
                    </td>
                    <td>
                        <form action="modificarPalabra.php" method="post">
                            <input type="hidden" name="espanol" value="<?=$spanish?>">
                            <input type="submit" name="accion" value="modificar">
                        </form>
                    </td>
                </tr>
                <?php
            }
            ?>
        </tbody>
    </table>
    <hr>
    <form action="agregarPalabra.php" method="post">
        <input type="submit" value="Añadir nueva palabra">
    </form>
    <form action="Ej08.php" method="post">
        <input type="hidden" name="accion" value="borrarCookies">
        <input type="submit" value="Restablecer diccionario">
    </form>
    <form action="Ej08.php" method="post">
        <input type="hidden" name="accion" value="actualizarCookies">
        <input type="submit" value="Guardar cambios">
    </form>
</body>
</html>