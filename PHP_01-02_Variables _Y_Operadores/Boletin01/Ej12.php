<!-- Igual que el programa anterior, pero esta vez la pirámide debe aparecer invertida, con el vértice
hacia abajo.
 -->
 <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ej11</title>
</head>
<body>
    <center>
    <?php
     $base=9;
     $espacio="&nbsp";
     for ($i=0; $i < $base; $i++) { //Base superior
        echo "*";
        $espacio=$espacio."&nbsp&nbsp";
     }
     echo "<br>";

     for ($i=0; $i < $base/2; $i++) { 
        $espacio=substr($espacio,20);//Quito 4 espacios cada linea
        echo "*$espacio*";
         echo "<br>";
     }

    echo "*";
    ?>
    </center>
</body>
</html>