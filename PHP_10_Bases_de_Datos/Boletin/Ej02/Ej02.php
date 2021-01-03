<?php 
if(session_status()==PHP_SESSION_NONE){
    session_start();
}

require_once "utils/db_conect.php";
require_once "utils/db_consults.php";

//Sirve para poder calcular cuantas paginas habran
$CANT_CLIENTES=showAll($conexion)->rowCount();

$CANT_CONSULT=10;

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
            $pag-=$CANT_CONSULT;
            if($pag<0)$pag=0;
            break;

        case "next":
            $pag+=$CANT_CONSULT;
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
}elseif($pag>$CANT_CLIENTES){
    $pag-=10;
    $_SESSION["pagina"]=$pag;
}


//Sirve para cojer los clientes a mostrar en la pagina
$consClientes=showRangeClient($conexion,$pag,($pag+$CANT_CONSULT));


//Mostrara mensage al añadir un cliente
$mesage="";
if(isset($_SESSION["error"])){
    switch($_SESSION["error"]){
        case 0:
            $mesage=
            "<div class='correct-add'>
                Cliente añadido correctamente
            </div>";
            break;
        case 3:
            $mesage=
            "<div class='error-add'>
                No se ha podido añadir el cliente
            </div>";
            break;
    }
}

unset($_SESSION["error"]);

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
                        <td><a href="utils/action.php?action=delete&dni=<?=$cliente->DNI?>" class="fa icon delete" onclick="return confirm('Estas seguro de eliminar a <?=$cliente->Nombre;?>?')">Borrar</a></td>
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
                <?php 
                    if($pag>0){
                        echo '<button type="submit" name="pag-action" value="back" class="fa icon pag-button pag-back"></button>';
                    }

                    for ($i=0; $i < $CANT_CLIENTES; $i+=$CANT_CONSULT) { 
                        echo '<button type="submit" name="pag-action" value="'.$i.'" class="pag-button pag-number">'.($i/$CANT_CONSULT).'</button>';
                    }

                    if(($pag*10)<$CANT_CLIENTES){
                        echo '<button type="submit" name="pag-action" value="next" class="fa icon pag-button pag-next"></button>';
                    }
                ?>
                </form>
            </div>
        </div>
        <?=$mesage?>
    </div>
</body>
</html>