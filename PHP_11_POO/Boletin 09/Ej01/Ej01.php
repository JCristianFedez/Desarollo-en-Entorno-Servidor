<?php 
    include_once 'Objetos/Pinguino.php';
    include_once 'Objetos/Gato.php';
    include_once 'Objetos/Perro.php';
    include_once 'Objetos/Lagarto.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
    
    $garfield = new Gato("macho", "romano");
    $tom = new Gato("macho",null);
    $lisa = new Gato("hembra",null);
    $silvestre = new Gato(null,null);

    echo $garfield."<br>";
    echo $tom."<br>";
    echo $lisa."<br>";
    echo $silvestre."<br><hr>";

    $miLoro = new Ave(null);
    echo $miLoro->ponHuebo()."<br>";
    echo $miLoro->vuela()."<br><hr>";

    $pingu = new Pinguino("hembra");
    echo $pingu->vuela()."<br>";
    echo $pingu->come("pistachos")."<br>";

    $laika = new Perro("hembra", "chucho");
    echo $laika->duerme()."<br>";
    echo $laika->busca()."<br>";
    echo $laika->ladra()."<br><hr>";

    $godzilla = new Lagarto("macho");
    echo $godzilla->tomaElSol()."<br>";
    echo $godzilla->duerme()."<br><hr>";
    
    ?>
</body>
</html>