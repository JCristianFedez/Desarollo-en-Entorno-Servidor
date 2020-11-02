<!-- Igual que el programa anterior, pero esta vez la pirámide estará hueca (se debe ver únicamente el
contorno hecho con asteriscos).
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
     echo "*<br>";
         for ($i=0; $i < $base/2; $i++) { 
            echo "*$espacio*";
            $espacio=$espacio."&nbsp&nbsp&nbsp";
            echo "<br>";
         }

         for ($i=0; $i < $base; $i++) { 
             echo "*";
         }
 
    ?>
    </center>
</body>
</html>