<?php 
if(session_status()==PHP_SESSION_NONE){
    session_start();
}

require_once "utils/db_conect.php";
require_once "utils/db_consults.php";

$CANT_CONSULT=10;

if(!isset($_SESSION["pagina"])){
    $pag=0;
    $_SESSION["pagina"]=$pag;

}else{
    $pag=$_SESSION["pagina"];
}

if(isset($_REQUEST["pag-action"])){
    switch($_REQUEST["pag-action"]){
        case "back":
            $pag-=$CANT_CONSULT;
            if($pag<0)$pag=0;
            break;

        case "next":
            $pag+=$CANT_CONSULT;
            break;

        default://Se selecciona numero
            $pag=$_REQUEST["pag-action"]*$CANT_CONSULT;
            break;
    }
    $_SESSION["pagina"]=$pag;
}

$consClientes=showRangeClient($conexion,$pag,($pag+$CANT_CONSULT));

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://necolas.github.io/normalize.css/8.0.1/normalize.css">
    <!-- <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css"> -->
    <link rel="stylesheet" href="css/style.css">
    <title>Ej02</title>
</head>

<body>
    <div class="container">
        <div class="title">
            <h1>Mantenimiento de clientes</h1>
        </div>
        <div class="table">
            <table>
                <thead>
                    <th>DNI</th>
                    <th>Nombre</th>
                    <th>Direccion</th>
                    <th>Telefono</th>
                    <th></th>
                    <th></th>
                </thead>
                <tbody>
                    <?php 
                while($cliente = $consClientes->fetchObject()){
                    ?>
                    <tr>
                        <td><?=$cliente->DNI;?></td>
                        <td><?=$cliente->Nombre;?></td>
                        <td><?=$cliente->Direccion;?></td>
                        <td><?=$cliente->Telefono;?></td>
                        <td><a href="utils/action.php?action=delete&dni=<?=$cliente->DNI?>" class="fa icon delete">Borrar</a></td>
                        <td><a href="utils/modClient.php?dni=<?=$cliente->DNI?>" class="fa icon edit">Moditificar</a></td>
                    </tr>
                    <?php
                }
                ?>
                    <tr>
                        <form action="utils/action.php" method="post">
                            <td><input type="text" name="dni" id="name" required minlength=9 maxlength=9></td>
                            <td><input type="text" name="nombre" id="name" required maxlength=20></td>
                            <td><input type="text" name="direccion" id="name" required maxlength=40></td>
                            <td><input type="number" name="telefono" id="name" required ></td>
                            <input type="hidden" name="action" value="add">
                            <td colspan="2"><button type="submit" class="fa icon add"> Añadir</button></td>
                        </form>
                    </tr>
                </tbody>
            </table>
            <div class="pag-select">
                <form action="#" method="post">
                <button type="submit" name="pag-action" value="back" class="pag-back">Back</button>
                <button type="submit" name="pag-action" value="" class="pag-number"></button>
                <button type="submit" name="pag-action" value="next" class="pag-next">Next</button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>