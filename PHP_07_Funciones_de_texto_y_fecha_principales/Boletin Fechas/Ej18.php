<!-- Mostrar la fecha correspondiente al próximo día de la semana elegido por el usuario. 
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
    <title>Ej17</title>
</head>
<body>
    <form action="#" method="post">
    <label for="myDate">Introduce Fecha</label>
    <input type="text" name="myDate" id="myDate" placeholder="dd/mm/yyyy" pattern="^([0]?[1-9]|[1|2][0-9]|[3][0|1])[./-]([0]?[1-9]|[1][0-2])[./-]([0-9]{4}|[0-9]{2})$" required>
    <br>
    <input type="submit" value="Calcular">
    <br><br>
    <?php
    if (isset($_REQUEST["myDate"])) {
        $weekDay=["Mon","Tue","Wed","Thu","Fri","Sat","Sun"];
        $diasSemana=["Lunes","Martes","Miercoles","Jueves","Viernes","Sabado","Domingo"];    
        
        $monthName=["Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec"];
        $nombreMeses=["Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre"];

        $myDate=str_replace("/", "-", $_REQUEST["myDate"]);
        if (substr_count($myDate, "-")!=2 || (strlen($myDate)-substr_count($myDate, "-"))<3) {
            echo "Fecha incorecta";
        } else {
            $aux=explode("-", $myDate);
            if (count($aux)!=3 && !checkdate($aux[1], $aux[0], $aux[2])) {
                echo "Fecha incorrecta";
            } else {
                $fechaActual=date("D d", strtotime($myDate))." de ".date("M", strtotime($myDate))." de ".date("Y", strtotime($myDate));
                $fechaActual=str_replace($weekDay,$diasSemana,$fechaActual);
                $fechaActual=str_replace($monthName,$nombreMeses,$fechaActual);
                $fechaProxima=date("D d M Y", strtotime($myDate."+ 1 days"));
                $fechaProxima=str_replace($weekDay,$diasSemana,$fechaProxima);
                $fechaProxima=str_replace($monthName,$nombreMeses,$fechaProxima);
                echo "Fecha introducida: $fechaActual <br>";
                echo "Proxima fecha = $fechaProxima";
            }
        }
    }
    ?>
</body>
</html>