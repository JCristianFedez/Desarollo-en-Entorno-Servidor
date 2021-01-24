<?php 
include_once "objetos/Empleado.php"; 

if(session_status() == PHP_SESSION_NONE){
    session_start();
}

if(!isset($_SESSION["empleadosEj01"])){
    $_SESSION["empleadosEj01"] = serialize([
        new Empleado("Juan",1900),
        new Empleado("Pedro",4000),
        new Empleado("Maria",1233),
        new Empleado("Ivan",5000)
    ]);
}

$empleados = unserialize($_SESSION["empleadosEj01"]);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Empleado</title>
</head>
<body>
    <?php 
    foreach($empleados as $empleado){
        echo "<p>".$empleado->pagaImpuestos()."</p>";
    } 
    ?>
    <form action="utils/actions/add.php" method="post">
    <fieldset>
        <legend>Añadir empleado</legend>
        <input type="text" name="nombre" id="nombre" required placeholder="Nombre">
        <br>
        <input type="number" name="sueldo" id="sueldo" required placeholder="Sueldo">
        <br>
        <input type="submit" value="Añadir">
    </fieldset>
    </form>
    <form action="utils/actions/reset.php" method="post">
        <input type="submit" value="Resetear empleados">
    </form>
</body>
</html>