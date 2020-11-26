<!-- 15. Lo mismo que el anterior pero para la hora. 
 -->
 <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
    select{
        margin:1em 0em;
    }
    </style>
    <title>Ej15</title>
</head>
<body>
    <form action="#" method="post">
    <label for="myTime">Introduce Hora</label>
    <input type="text" name="myTime" id="myTime" placeholder="HH:mm" required>
    <br>
    <label for="formatHour">Formato dia</label>
    <select name="formatHour" id="formatHour">
    <option value="g" selected>Formato 12 Horas sin ceros iniciales [1 a 12]</option>
    <option value="h" >Formato 24 Horas sin ceros iniciales [1 a 24]</option>
    <option value="H" >Formato 12 Horas con ceros iniciales [01 a 12]</option>
    <option value="G" >Formato de 24 Horas con ceros iniciales [01 a 24]</option>
    </select>
    <br>
    <input type="submit" value="Calcular Fecha">
    </form>
    <br><br><br>
    <?php
    if (isset($_REQUEST["myTime"]) && isset($_REQUEST["formatHour"])) {
        $myTime=$_REQUEST["myTime"];
        $formatHour=$_REQUEST["formatHour"];
        if (substr_count($myTime, ":")!=1 || ((strlen($myTime))<3 || (strlen($myTime))>5)) {
            echo "Hora incorecta";
        } else {
            $aux=explode(":", $myTime);
            if (($aux[0]>25||$aux[0]<0) || ($aux[1]>60 || $aux[1]<00)) {
                echo "Hora incorrecta";
            } else {
                echo date("$formatHour:i", strtotime($myTime));
            }
        }
    }
    ?>
</body>
</html>