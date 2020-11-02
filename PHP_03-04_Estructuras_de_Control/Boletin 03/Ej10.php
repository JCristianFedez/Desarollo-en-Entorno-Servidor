<!-- Escribe un programa que nos diga el horóscopo 
a partir del día y el mes de nacimiento.
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
     <h1>Horsocopo</h1>
     <?php 
     if((!isset($_GET["month"]))||(!isset($_GET["month"]))){

        ?>
        <form action="#" method="get">
            <label>Introduce tu dia de nacimiento: <input type="number" name="day" placeholder="dia" require min=1></label>
            <br>
            <label>Introduce tu mes de nacimiento: <input type="number" name="month" placeholder="1" require min=1 max=12></label>
            <br>
            <input type="submit" value="Mi horoscopo">
        </form>
        <?php

     }else{
        $month=$_GET["month"];
        $day=$_GET["day"];

        $horoscopo;

        switch($month) {
            case 1:
              if ($day < 21) {
                $horoscopo = "capricornio";
              } else {
                $horoscopo = "acuario";
              }
              break;
              
            case 2:
              if ($day < 20) {
                $horoscopo = "acuario";
              } else {
                $horoscopo = "piscis";
              }
              break;
              
            case 3:
              if ($day < 21) {
                $horoscopo = "piscis";
              } else {
                $horoscopo = "aries";
              }
              break;
              
            case 4:
              if ($day < 21) {
                $horoscopo = "aries";
              } else {
                $horoscopo = "tauro";
              }
              break;
              
            case 5:
              if ($day < 20) {
                $horoscopo = "tauro";
              } else {
                $horoscopo = "géminis";
              }
              break;
              
            case 6:
              if ($day < 22) {
                $horoscopo = "géminis";
              } else {
                $horoscopo = "cáncer";
              }
              break;
              
            case 7:
              if ($day < 22) {
                $horoscopo = "cáncer";
              } else {
                $horoscopo = "Leo";
              }
              break;
              
            case 8:
              if ($day < 24) {
                $horoscopo = "leo";
              } else {
                $horoscopo = "virgo";
              }
              break;
              
            case 9:
              if ($day < 23) {
                $horoscopo = "virgo";
              } else {
                $horoscopo = "libra";
              }
              break;
              
            case 10:
              if ($day < 23) {
                $horoscopo = "libra";
              } else {
                $horoscopo = "escorpio";
              }
              break;
              
            case 11:
              if ($day < 23) {
                $horoscopo = "escorpio";
              } else {
                $horoscopo = "sagitario";
              }
              break;
              
            case 12:
              if ($day < 21) {
                $horoscopo = "sagitario";
              } else {
                $horoscopo = "capricornio";
              }
              break;
          }
        echo "Eres $horoscopo";
        echo "<br><button onclick='window.history.go(-1)'>Mirar otro horoscopo</button>";
     }
 
     ?>
    
     </center>
 </body>
 </html>