<!-- Muestra por pantalla todos los números primos entre 2 y 100,
 ambos incluidos.
 -->
 <!DOCTYPE html>
 <html lang="en">
 <head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Ej22</title>
 </head>
 <body>
 <h3>Numeros primos de 2 a 100</h3>
     <?php 
     for ($i=2; $i <=100 ; $i++) { 
         $esPrimo=true;
         for ($j=2; $j <$i ; $j++) { 
             if($i%$j==0){
                $esPrimo=false;
                $j=$i;
             }
         }
         echo ($esPrimo==true)?$i.", ": "";
     }
     ?>
 </body>
 </html>