<?php 
include_once "objetos/DadoPoker.php";
if(session_status() == PHP_SESSION_NONE){
    session_start();
}

//Serializo los dados por primera vez
if(!isset($_SESSION["misDados"])){
    $_SESSION["misDados"] = serialize([new DadoPoker(),new DadoPoker(),new DadoPoker(),new DadoPoker(),new DadoPoker()]);
}

//Cargo la cantidad de tiradas por primera vez
if(!isset($_REQUEST["tiradasTotales"])){
    $_REQUEST["tiradasTotales"] = 0;
}

//Cojo los dados de la sesion
$misDados = unserialize($_SESSION["misDados"]);

//Establezco la cantidad de tiradas que se han echo
DadoPoker::setTiradasTotales($_REQUEST["tiradasTotales"]);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Poker</title>
</head>
<body>
    <h1 style="text-align:center;">Poker</h1>
    <?php foreach($misDados as $num => $dado){
        echo "<p>Dado: $num saca ".$dado->tira()."</p>";
    }?>
    <h3>Tiradas actuales = <?=DadoPoker::getTiradasTotales()?></h3>
    <form action="#" method="post">
        <input type="hidden" name="tiradasTotales" value="<?=DadoPoker::getTiradasTotales();?>">
        <input type="submit" value="Tirar dados">
    </form>
    <?php 
    //Serializo los dados una vez ya lanzados
    $_SESSION["misDados"] = serialize($misDados);
    ?>
</body>
</html>