<!-- Escribir un clase lea n caracteres que forman un número romano y que imprima:
a. si la entrada fue correcta, un string que represente el equivalente decimal
b. si la entrada fue errónea, un mensaje de error.
Nota: La entrada será correcta si contiene solo los caracteres M:1000, D:500, C:100, L:50,
X:10, I:1. No se tendrá en cuenta el orden solo se sumará el valor de cada letra.  -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ej11</title>
</head>
<body>
<form action="#" method="post">
    <label for="romanNumber">Introduce tu numero Romano</label>
    <input type="text" name="romanNumber" id="romanNumber" required>
    <br>
    <input type="submit" value="Calcular">
</form>
    <?php
    if(isset($_REQUEST["romanNumber"])){
        $romanNumber=trim(strtoUpper($_REQUEST["romanNumber"]));//Quitar espacios inicio final
        $romanNumber=implode(' ',array_filter(explode(' ',$romanNumber))); //Quitar espacios intermedios
        $value=0;
        $valores=[["M"=>1000],["D"=>500],["C"=>100],["L"=>50],["X"=>10],["I"=>1]];
        if(preg_match("/[^MDCLXI]/",$romanNumber)){//Si no da 0 hay algun numero romano que no esta
            echo "Has introducido algun numero que no es romano [$romanNumber]";
        }else{
            foreach ($valores as $row) {
                foreach ($row as  $key => $col){
                        $value+=$col*substr_count($romanNumber,$key);
                }
            }
            echo "$romanNumber = $value";
        }
    }
    ?>
</body>
</html>