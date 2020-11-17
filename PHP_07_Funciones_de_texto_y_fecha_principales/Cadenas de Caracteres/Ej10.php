<!-- Escribir un programa que pida un nombre
(con sus apellidos) y escriba en pantalla tanto el
nombre con las primeras letras en mayúsculas como 
las iniciales de dicho nombre.  -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ej10</title>
</head>
<body>
<form action="#" method="post">
    <label for="myName">Introduce tu nombre</label>
    <input type="text" name="myName" id="myName" required>
    <br>
    <input type="submit" value="Modificar">
</form>
    <?php
    if(isset($_REQUEST["myName"])){
        $myName=trim($_REQUEST["myName"]);//Quitar espacios inicio final
        $myName=implode(' ',array_filter(explode(' ',$myName))); //Quitar espacios intermedios
        $myName=ucwords(strtolower($myName)," ");//Capitalizar todas las palabras
        $arAux=explode(" ",$myName);//Aray del string
        $iniciales="";
        for ($i=0; $i < count($arAux); $i++) { 
            $iniciales.=$arAux[$i][0].".";
        }
        echo "Nombre: $myName <br>";
        echo "Iniciales: $iniciales";
    }
    ?>
</body>
</html>