<!-- Escribe un programa que pinte por pantalla una pirámide rellena a base de asteriscos. La base de la
pirámide debe estar formada por 9 asteriscos.
 -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ej10</title>
</head>
<body>
    <center>
    <?php
    $base=9;
    $asterisco="*";
        for ($i=0; $i < $base/2; $i++) { 
                echo $asterisco;
                $asterisco=$asterisco."**";
                echo "<br>";
        }

    ?>
    </center>
</body>
</html>