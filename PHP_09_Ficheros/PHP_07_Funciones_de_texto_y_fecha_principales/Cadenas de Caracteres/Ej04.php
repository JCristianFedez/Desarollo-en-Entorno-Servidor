<!-- Verificar si un string leído por teclado finaliza con la 
misma palabra que empieza.  -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ej04</title>
</head>
<body>
<form action="#" method="post">
    <label for="myStr">Introduce frase</label>
    <input type="text" name="myStr" id="myStr" required>
    <br>
    <input type="submit" value="Modificar">
</form>
    <?php
    if(isset($_REQUEST["myStr"])){
        $myStr=$_REQUEST["myStr"];
        if($myStr[strlen($myStr)-1]=="."){//Si termina en punto lo elimno
            $myStr=substr($myStr,0,-1);
        }

        //Quito espacios en exceso
        $myStr=implode(' ',array_filter(explode(' ',$myStr))); 

        $cadenaArray=explode(" ",$myStr);

        echo "$myStr <br>";
        if($cadenaArray[0]==$cadenaArray[count($cadenaArray)-1]){
            echo "Empieza y termina por la misma palabra";
        }else{
            echo "No termina por la misma palabra";
        }
    }
    ?>
</body>
</html>