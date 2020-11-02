<!-- Realiza un programa que resuelva una ecuación 
de primer grado (del tipo ax + b = 0).
 -->

 <!DOCTYPE html>
 <html lang="en">
 <head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Ej05</title>
 </head>
 <body>
     <center>
     <h1>Solucion ecuacion primer grado: ax + b = 0</h1>
     <?php 
     if((!isset($_GET["a"]))||(!isset($_GET["b"]))){

        ?>
        <form action="#" method="get">
        <label>A: <input type="number" name="a" require></label>
        <br>
        <label>B: <input type="number" name="b" require></label>
        <br>
        <input type="submit" value="Calcular">
        </form>
        <?php
     }else{
        $a=$_GET["a"];
        $b=$_GET["b"];
        if($a==0){
            echo "No tiene solucion";
        }else{
            $x=-($b/$a);
            echo "<h4>".$a."x + ".$b." = 0</h4>";
            echo "<h4>X = $x</h4>";
        }
         echo "<button onclick='window.history.go(-1)'>Comprobar otro ecuacion</button>";

     }
     
     ?>
     </center>
 </body>
 </html>