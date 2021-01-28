<?php 
if(session_status() == PHP_SESSION_NONE){
    session_start();
}

include_once "objetos/Coche.php";
include_once "objetos/CocheLujo.php";

if(!isset($_SESSION["cochesEjAdicional"])){
    $_SESSION["cochesEjAdicional"] = serialize([
        new Coche("12344K","Audi A1",12000),
        new Coche("12367H","Seat Ibiza",5000),
        new Coche("81273L","Audi A4",34000.99),
        new CocheLujo("18923L","Lamborguini Huracan",30000,10000)
    ]);
}

$coches = unserialize($_SESSION["cochesEjAdicional"]);

$keyAux = 0;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Confesionario</title>
</head>
<body>
    <h1><?= Coche::masCaro(); ?></h1>
    <div class="coche-container container">
        <?php foreach($coches as $coche): ?>
            <?php if(is_a($coche,"CocheLujo")): ?>
                <div class="coche-item lujo">
                    <p>Matricula : <b><?= $coche->getMatricula() ?></b></p>
                    <p>Modelo : <b><?= $coche->getModelo() ?></b></p>
                    <p>Precio base : <b><?= $coche->getPrecioBase() ?></b></p>
                    <p>Suplemento : <b><?= $coche->getSuplemento() ?></b></p>
                    <p>Precio Total : <b><?= $coche->getPrecio() ?></b></p>
                    <a href="actions/deleteCoche.php?key=<?=$keyAux?>" class="btn-secundario">Borrar</a>
                </div>
            <?php else: ?>
                <div class="coche-item">
                <p>Matricula : <b><?= $coche->getMatricula() ?></b></p>
                    <p>Modelo : <b><?= $coche->getModelo() ?></b></p>
                    <p>Precio : <b><?= $coche->getPrecio() ?></b></p>
                    <p>Suplemento : <b>No consta</b></p>
                    <a href="actions/deleteCoche.php?key=<?=$keyAux?>" class="btn-secundario">Borrar</a>
                </div>
            <?php endif; ?>
            <?php $keyAux++; ?>
        <?php endforeach; ?>
    </div>
    <div class="form-container container">
        <form action="actions/addModCoche.php" method="post" class="form-container">
                <legend><h3>
                    Añadir/Modificar coche
                </h3></legend>
            <div class="form-item">
                <label for="matricula">Matricula: </label>
                <input type="text" name="matricula" id="matricula" required>
            </div>

            <div class="form-item">
                <label for="modelo">Modelo: </label>
                <input type="text" name="modelo" id="modelo" required>
            </div>

            <div class="form-item">
                <label for="precio">Precio: </label>
                <input type="number" step="0.01" name="precio" id="precio" required>
            </div>

            <div class="form-item">
                <label for="suplemento">Suplemento: </label>
                <input type="number" step="0.01" name="suplemento" id="suplemento">
            </div>

                <input type="submit" value="Añadir/Modificar" class="btn-principal">
        </form>
        <form action="actions/reset.php" method="post">
            <input type="submit" value="Resetear" class="btn-principal">
        </form>
    </div>
</body>
</html>