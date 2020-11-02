<!-- Realiza un programa que pida una hora por teclado y que muestre
luego buenos días, buenas tardes o buenas noches según la hora.
 Se utilizarán los tramos de 6 a 12, de 13 a 20 y de 21 a 5.
respectivamente. Sólo se tienen en cuenta las horas, los minutos 
no se deben introducir por teclado.
 -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ej02</title>
</head>
<body>
    <center>
    <?php 
    if(!isset($_GET["hour"])){
        ?>
            <form action="#" method="get">
            <label >Introduce hora: <input type="number" name="hour" min="0" max="23" require></label>
            <br>
            <input type="submit" value="Saludame">
            </form>
        <?php
    }else{
        $hour=$_GET["hour"];
        if($hour>=6 && $hour<=12){
            echo "<h2>Buenos Dias</h2>";
        }elseif ($hour>=13 && $hour<=20) {
            echo "<h2>Buenas Tardes</h2>";
        }elseif (($hour>=21 && $hour<24) || ($hour<=5 && $hour>=0)) {
            echo "<h2>Buenas Noches</h2>";
        }
        echo "<button onclick='window.history.go(-1)'>Saludame otra vez</button>";
    }
     ?>
    </center>
</body>
</html>