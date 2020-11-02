<!-- Realiza un conversor de pesetas a euros. La cantidad en pesetas que se quiere convertir deberá estar
almacenada en una variable. -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ej08</title>
</head>
<body>
    <center>
    <h1>Pesetas a Euros</h1>
    <?php
    $pesetas=600;
    $euros=$pesetas/166.386;
    echo "$pesetas pesetas son ".round($euros,2)." euros";
    ?>
    </center>
</body>
</html>