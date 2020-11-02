<!-- Escribe un programa en que dado un número del 1 a 7 escriba el correspondiente nombre del día
de la semana.
 -->
 <!DOCTYPE html>
 <html lang="en">
 <head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Ej03</title>
 </head>
 <body>
     <center>
     <?php
     if (!isset($_GET["day"])) {
         ?>
            <h2>Transforma numero a dia</h2>
            <form action="#" method="get">
            <label>Introduce el dia de la semana en formato numerico: <input type="number" name="day" min=1 max=7 require></label>
            <br>
            <input type="submit" value="Transformar">
            </form>
        <?php
     } else {
         $day=$_GET["day"];
         switch ($day) {
            case 1:echo "<h3>Hoy es Lunes</h3>";
                break;
            case 2:echo "<h3>Hoy es Martes</h3>";
                break;
            case 3:echo "<h3>Hoy es Miercoles</h3>";
                break;
            case 4:echo "<h3>Hoy es Jueves</h3>";
                break;
            case 5:echo "<h3>Hoy es Viernes</h3>";
                break;
            case 6:echo "<h3>Hoy es Sabado</h3>";
                break;
            case 7:echo "<h3>Hoy es Domingo</h3>";
                break;
            default:echo "<h3>Dia erroneo</h3>";
                break;
        }
        echo "<button onclick='window.history.go(-1)'>Comprobar otro dia</button>";
     }
      ?>
     </center>
 </body>
 </html>