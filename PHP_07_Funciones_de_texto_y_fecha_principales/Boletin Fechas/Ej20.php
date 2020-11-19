<!-- Pedir fecha de nacimiento y una fecha futura, y mostrar la edad que tendrá en esa fecha
(tener en cuenta que un año tiene 60*60*24*365.25 segundos)  -->
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
    <title>Ej20</title>
</head>
<body>
    <form action="#" method="post">
    <label for="myDate">Introduce Fecha Nacimiento</label>
    <input type="text" name="myDate" id="myDate" placeholder="dd/mm/yyyy" pattern="^([0]?[1-9]|[1|2][0-9]|[3][0|1])[./-]([0]?[1-9]|[1][0-2])[./-]([0-9]{4}|[0-9]{2})$" required>
    <br>
    <label for="nextDate">Introduce Fecha Futura</label>
    <input type="text" name="nextDate" id="nextDate" placeholder="dd/mm/yyyy" pattern="^([0]?[1-9]|[1|2][0-9]|[3][0|1])[./-]([0]?[1-9]|[1][0-2])[./-]([0-9]{4}|[0-9]{2})$" required>
    <br>
    <input type="submit" value="Calcular">
    <br><br>
    <?php
    if (isset($_REQUEST["myDate"]) && isset($_REQUEST["nextDate"])) {

        $myDate=str_replace("/", "-", $_REQUEST["myDate"]);
        $nextDate=str_replace("/", "-", $_REQUEST["nextDate"]);

        if (substr_count($myDate, "-")!=2 || (strlen($myDate)-substr_count($myDate, "-"))<3 
        || substr_count($nextDate, "-")!=2 || (strlen($nextDate)-substr_count($nextDate, "-"))<3) {
            echo "Fecha incorecta";
        } else {
            $aux=explode("-", $myDate);
            $aux2=explode("-", $nextDate);
            if (count($aux)!=3 && !checkdate($aux[1], $aux[0], $aux[2])
            || count($aux2)!=3 && !checkdate($aux2[1], $aux2[0], $aux2[2])) {
                echo "Fecha incorrecta";
            } else {
                list($d,$m,$Y) = explode("-",$myDate);
                $edad= date("md") < $m.$d ? date("Y")-$Y-1 : date("Y")-$Y ;

                $edadProxima= date("md",strtotime($nextDate)) < $m.$d ? date("Y",strtotime($nextDate))-$Y-1 : date("Y",strtotime($nextDate))-$Y ;

                
                echo "Edad actual: $edad <br>";
                echo "Edad proxima : $edadProxima";
            }
        }
    }
    ?>
</body>
</html>