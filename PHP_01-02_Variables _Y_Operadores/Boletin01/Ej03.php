<!--
    Escribe un programa que muestre por pantalla 10 palabras en inglés junto a su correspondiente
traducción al castellano. Las palabras deben estar distribuidas en dos columnas. Utiliza la etiqueta
<table> de HTML.
-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ej03</title>
    <style>table,td,tr{border:1px black solid; border-collapse:collapse;}</style>
</head>
<body>
    <center>
    <table >
    <?php 
    echo "<tr><th>Ingles</th><th>Español</th></tr>";
    echo "<tr><td>Cat</td><td>Gato</td></tr>";
    echo "<tr><td>Dog</td><td>Perro</td></tr>";
    echo "<tr><td>Table</td><td>Mesa</td></tr>";
    echo "<tr><td>Stone</td><td>Piedra</td></tr>";
    echo "<tr><td>Dirt</td><td>Tierra</td></tr>";
    echo "<tr><td>Sun</td><td>Sol</td></tr>";
    echo "<tr><td>Spoon</td><td>Cuchara</td></tr>";
    echo "<tr><td>Room</td><td>Habitacion</td></tr>";
    echo "<tr><td>Mouse</td><td>Raton</td></tr>";
    echo "<tr><td>Window</td><td>Ventana</td></tr>";

    ?>
    </table>
    </center>
</body>
</html>