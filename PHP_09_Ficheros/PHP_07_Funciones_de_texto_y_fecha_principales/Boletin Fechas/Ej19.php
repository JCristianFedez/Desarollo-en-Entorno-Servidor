<!-- Mostrar el día de la semana una vez transcurridos un numero de años, meses, y días,
elegidos por el usuario, desde la fecha actual. 
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
    <title>Ej19</title>
</head>
<body>
    <form action="#" method="post">
    <label for="days">Introduce dias a sumar</label>
    <input type="text" name="days" id="days">
    <br>
    <label for="months">Introduce meses a sumar</label>
    <input type="text" name="months" id="months">
    <br>
    <label for="years">Introduce años a sumar</label>
    <input type="text" name="years" id="years">
    <br>
    <input type="submit" value="Calcular">
    <br><br>
    <?php
    if (isset($_REQUEST["days"]) && isset($_REQUEST["months"]) && isset($_REQUEST["years"])) {

        $days=($_REQUEST["days"])?$_REQUEST["days"]:0;
        $months=($_REQUEST["months"])?$_REQUEST["months"]:0;
        $years=($_REQUEST["years"])?$_REQUEST["years"]:0;
        
                $fechaActual=date("l d F Y");
            
                $fechaProxima=date("l d F Y", strtotime($fechaActual."+ $years year $months months $days days"));

                echo "Fecha Actual: $fechaActual <br>";
                echo "Proxima fecha = $fechaProxima";
        }
    
    ?>
</body>
</html>