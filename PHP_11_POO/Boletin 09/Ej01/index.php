<?php 
require_once "objetos/Animal/Mamifero/Perro.php";
require_once "objetos/Animal/Mamifero/Gato.php";

$hachiko = new Perro();
$lasie = new Perro("Hembra","Carnibora");
$garfield = new Gato("Hembra","","Naranja");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ej01</title>
</head>
<body>
    <?php 
    print_r($hachiko);
    echo "<br><br>";
    print_r($garfield);
    ?>
</body>
</html>