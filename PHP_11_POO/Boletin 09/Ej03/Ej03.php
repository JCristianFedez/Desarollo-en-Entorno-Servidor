<?php 
include_once "objetos/Ej03.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Poker</title>
</head>
<body>
    <?php 
    $a = new DadoPoker();
    $b = new DadoPoker();
    echo "Primera tirada de dado A: ".$a->tira()."<br>";
    echo "Segunda tirada de dado A: ".$a->tira()."<br>";
    echo "Ultima tirada de dado A: ".$a->nombreFigura()."<br>";
    echo "<br><hr><br>";
    echo "Primera tirada de dado B: ".$b->tira()."<br>";
    echo "Segunda tirada de dado B: ".$b->tira()."<br>";
    echo "Ultima tirada de dado B: ".$b->nombreFigura()."<br>";
    echo "<br><hr><br>";
    echo "TIradas totales: ".$a->getTiradasTotales();
    ?>
</body>
</html>