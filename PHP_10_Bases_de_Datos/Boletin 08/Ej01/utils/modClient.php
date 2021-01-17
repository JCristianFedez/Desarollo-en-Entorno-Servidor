<?php 
if(isset($_REQUEST["dni"])){
    require_once "db_conect.php";
    require_once "db_consults.php";
    $cliente = showClient($conexion,$_REQUEST["dni"])->fetchObject();

    $dni=$cliente->DNI;
    $nombre=$cliente->Nombre;
    $direccion=$cliente->Direccion;
    $telefono=$cliente->Telefono;

}else{
    header("Location:../Ej01.php");

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
    <title>Modificar Cliente</title>
</head>
<body>
    <br>
    <h2 style="text-align:center;">Modificar a <?=$nombre?></h2>
        <form action="action.php" method="post" class="mod-form">
        <div class="mod-form-item">
            <label for="dni">DNI: </label>
            <input type="text" name="dni" id="dni" value="<?=$dni?>" readonly>
        </div>
        <div class="mod-form-item">
            <label for="nombre">Nombre: </label>
            <input type="text" name="nombre" id="nombre" value="<?=$nombre?>" required>
        </div>
        <div class="mod-form-item">
            <label for="direccion">Direccion: </label>
            <input type="text" name="direccion" id="direccion" value="<?=$direccion?>" required>
        </div>
        <div class="mod-form-item">
            <label for="telefono">Telefono: </label>
            <input type="text" name="telefono" id="telefono" value="<?=$telefono?>" required>
        </div>
        <div class="mod-form-button">
            <button type="submit" value="edit" name="action"class="fa icon add">Guardar</button>
            <button type="submit" class="fa icon delete">Cancelar</button>
        </div>
        </form>
</body>
</html>

<?php 
$conexion=null;
?>