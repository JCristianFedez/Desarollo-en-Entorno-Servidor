<?php 

include_once "objetos/Cubo.php"; 

if(session_status() == PHP_SESSION_NONE){
    session_start();
}


if(!isset($_SESSION["cuboEj03"])){
    $_SESSION["cuboEj03"] = serialize([
        new Cubo(1000,500),
        new Cubo(20,5),
        new Cubo(100,0)
    ]);
}

$cubos = unserialize($_SESSION["cuboEj03"]);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cubos</title>
</head>
<body>
    <?php 
    $aux = 0;
    foreach($cubos as $cubo){
        echo "<h2>Cubo $aux</h2>";
        echo "<p>Capacidad: ".$cubo->getCapacidad()." - Contenido: ".$cubo->getContenido()."</p>";
        echo "<hr></hr>";
        echo "<br>";
        $aux++;
    } 
    ?>
    <form action="actions/mod.php" method="post">
    <fieldset>
        <legend>Modificar cubo</legend>
        <input type="number" name="idCubo" id="idCubo" min="0" max="<?=count($cubos)-1?>" equired placeholder="Cubo">
        <br>
        <input type="text" name="capacidad" id="capacidad" required placeholder="Capacidad">
        <br>
        <input type="text" name="contenido" id="contenido" required placeholder="contenido">
        <br>
        <input type="submit" value="Modificar">
    </fieldset>
    </form>
    <form action="actions/reset.php" method="post">
        <input type="submit" value="Resetear cubos">
    </form>
    <form action="actions/verter.php" method="post">
        <fieldset>
            <legend>Vertir de un contenedor a otro</legend>
            <input type="number" name="deEste" id="deEste" min="0" max="<?=count($cubos)-1?>" required placeholder="deEste">
            <input type="number" name="aEste" id="aEste" min="0" max="<?=count($cubos)-1?>" required placeholder="aEste">
        </fieldset>
        <input type="submit" value="Vertir">
    </form>
</body>
</html>
