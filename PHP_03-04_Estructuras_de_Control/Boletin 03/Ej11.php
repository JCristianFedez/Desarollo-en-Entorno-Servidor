<!-- Escribe un programa que dada una hora determinada
 (horas y minutos), calcule los segundos que
faltan para llegar a la medianoche. -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ej11</title>
</head>
<body>
    <center>
    <h1>Calcular tiempo para media noche</h1>

    <?php 
    
    if((!isset($_GET["minutes"]))||(!isset($_GET["hours"]))){
        ?>
            <form action="#" method="get">
                <label>Introduce la hora: <input type="number" name="hours" min=0 max=23 require></label>
                <br>
                <label>Introduce los minutos: <input type="number" name="minutes" min=0 max=59 require></label>
                <br>
                <input type="submit" value="Calcular">
            </form>
        <?php
    }else{
        $minutes=$_GET["minutes"];
        $hours=$_GET["hours"];
        $restantH=0;
        $restantM=0;
        if($minutes!=0){
            $restantM=60-$minutes;
        }
        if($hours!=0){
            $restantH=24-$hours;
            $restantH+=($minutes!=0)? -1 : 0;
        }elseif ($hours==0) {
           $restantH=23; 
        }
        

        echo "Quedan $restantH horas y $restantM minutos";
        echo "<br><button onclick='window.history.go(-1)'>Mirar otro horoscopo</button>";

    }
    
    ?>

    </center>
</body>
</html>