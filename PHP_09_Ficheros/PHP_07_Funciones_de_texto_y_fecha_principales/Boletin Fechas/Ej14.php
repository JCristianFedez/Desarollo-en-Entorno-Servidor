<!-- A través de un formulario, el usuario introduce una fecha, 
si no es correcta se debe indicar en un mensaje;
 si es correcta se debe mostrar en el formato elegido, 
 crea botones de opción para configurar todas las posibilidades
  de los dígitos del dia, mes y año. 
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
    <title>Ej14</title>
</head>
<body>
    <form action="#" method="post">
    <label for="myDate">Introduce Fecha</label>
    <input type="text" name="myDate" id="myDate" placeholder="dd/mm/yyyy" pattern="^([0]?[1-9]|[1|2][0-9]|[3][0|1])[./-]([0]?[1-9]|[1][0-2])[./-]([0-9]{4}|[0-9]{2})$" required>
    <br>
    <label for="formatDay">Formato dia</label>
    <select name="formatDay" id="formatDay">
    <option value="d" selected>Día del mes, 2 dígitos con ceros iniciales [01 a 31]</option>
    <option value="j" >Día del mes sin ceros iniciales [1 a 31]</option>
    <option value="l" >Una representación textual completa del día de la semana [Monday a Sunday]</option>
    <option value="D" >Una representación textual de un día, tres letras [Mon a Sun]</option>
    </select>
    <br>
    <label for="formatMonth">Formato Mes</label>
    <select name="formatMonth" id="formatMonth">
    <option value="m" selected>Representación numérica de un mes, con ceros iniciales [01 a 12]</option>
    <option value="n" >Representación numérica de un mes, sin ceros iniciales [1 a 12]</option>
    <option value="F" >Una representación textual completa de un mes [January a December]</option>
    <option value="M" >Una representación textual corta de un mes, tres letras [Jan a Dec]</option>
    </select>
    <br>
    <label for="formatYear">Formato Año</label>
    <select name="formatYear" id="formatYear">
    <option value="Y" selected>Una representación numérica completa de un año, 4 dígitos</option>
    <option value="y" >Una representación de dos dígitos de un año</option>
    </select>
    <br>
    <input type="submit" value="Calcular Fecha">
    </form>
    <br><br><br>
    <?php
    if (isset($_REQUEST["myDate"]) && isset($_REQUEST["formatDay"]) && isset($_REQUEST["formatMonth"]) && isset($_REQUEST["formatYear"])) {
        $myDate=str_replace("/", "-", $_REQUEST["myDate"]);
        $formatDay=$_REQUEST["formatDay"];
        $formatMonth=$_REQUEST["formatMonth"];
        $formatYear=$_REQUEST["formatYear"];
        if (substr_count($myDate, "-")!=2 || (strlen($myDate)-substr_count($myDate, "-"))<3) {
            echo "Fecha incorecta";
        } else {
            $aux=explode("-", $myDate);
            if (count($aux)!=3 || !checkdate($aux[1], $aux[0], $aux[2])) {
                echo "Fecha incorrecta";
            } else {
                echo date("$formatDay, $formatMonth, $formatYear", strtotime($myDate));
            }
        }
    }
    ?>
</body>
</html>