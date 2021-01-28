<?php 

include_once "objetos/Bombilla.php"; 

if(session_status() == PHP_SESSION_NONE){
    session_start();
}

if(!isset($_SESSION["bombillaEj05"])){
    $_SESSION["bombillaEj05"] = serialize([
        new Bombilla("Comedor",400),
        new Bombilla("Cocina",400),
        new Bombilla("Baño 1",600),
        new Bombilla("Baño 2",600),
        new Bombilla("Garaje",800)
    ]);
}

$bombillas = unserialize($_SESSION["bombillaEj05"]);


if(isset($_REQUEST["fusibleEj05"])){
    switch ($_REQUEST["fusibleEj05"]) {
        case 'bajar':
            Bombilla::bajarFusible();
            break;
        case 'subir':
            Bombilla::subirFusible();
            break;
    }
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>bombillas</title>
</head>
<body>
    <h1>Potencia total <?=Bombilla::getPotenciaTotal()?></h1>
    <div class="container-bombilla">
    <?php $aux = 0; ?>
    <?php foreach($bombillas as $bombilla): ?>
        <div class="item-bombilla">
            <a href="actions/cambiarEstado.php?idBombilla=<?=$aux?>">
                <img src="images/<?=$bombilla->getEstado()?>.svg" alt="Bombilla">
            </a>
            <p>ID = <?=$aux?></p>
            <p>Potencia: <?=$bombilla->getPotencia()?></p>
            <p>Ubicacion: <?=$bombilla->getUbicacion()?></p>
            <p>Estado <?=$bombilla->getEstado()?></p>
        </div>
        <?php $aux++; ?>
    <?php endforeach; ?>
    </div>
    <div class="forms">
        <form action="actions/addModBombilla.php" method="post">
        <fieldset>
            <legend>Añadir/modificar Bombillas</legend>
            <label for="idBombilla">Solo rellenar en caso de querer modificar la bombilla</label>
            <input type="text" name="idBombilla" id="idBombilla" placeholder="idBombilla" min="0" max="<?=count($bombillas)-1?>">
            <br>
            <input type="text" name="ubicacion" id="ubicacion" required placeholder="Ubicacion">
            <br>
            <input type="text" name="potencia" id="potencia" required min="1" placeholder="Potencia">
            <br>
            <input type="submit" value="Añadir/modificar bombilla">
        </fieldset>
        </form>
        <form action="#" method="post">
            <button type="submit" value="bajar" name="fusibleEj05">Bajar fusibles</button>
            <button type="submit" value="subir" name="fusibleEj05">Subir fusibles</button>
        </form>
        <form action="actions/reset.php" method="post">
            <input type="submit" value="Resetear bombillas">
        </form>
    </div>
</body>
</html>
