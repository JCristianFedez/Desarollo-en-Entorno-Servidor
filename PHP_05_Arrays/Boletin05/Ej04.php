<!-- Escribe un programa que genere 100 números aleatorios del 0 al 20 y 
que los muestre por pantalla separados por espacios. El programa pedirá 
entonces por teclado dos valores y a continuación cambiará todas las 
ocurrencias del primer valor por el segundo en la lista generada 
anteriormente. Los números que se han cambiado deben aparecer resaltados
de un color diferente. -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ej04</title>
</head>
<body>
    <?php
    if((!isset($_REQUEST["valInicial"]))||(!isset($_REQUEST["valFinal"]))){
        $arraySize=100;
        for ($i=0; $i < $arraySize; $i++) { 
            $miArray[$i]=rand(0,20);
        }
        echo "<h3>Array sin modificar</h3>";
        foreach ($miArray as $value) {
            echo "$value -";
        }
        ?>
        <br><br>
        <form action="#" method="post">
            <label>Valor inicial: <input type="number" name="valInicial" required></label>
            <br>
            <label>Valor final: <input type="number" name="valFinal" required></label>
            <br>
            <input type="hidden" name="miArray" value="<?=implode(',',$miArray)?>">
            <input type="submit" value="Cambiar">
        </form>
        <?php
    }else{
        $miArray=explode(",",$_REQUEST["miArray"]);
        $valInicial=$_REQUEST["valInicial"];
        $valFinal=$_REQUEST["valFinal"];
        echo "<h3>Array sin modificar</h3>";
        foreach ($miArray as $value) {
            echo "$value -";
        }

        for ($i=0; $i < count($miArray); $i++) { 
            $miArray[$i]=($miArray[$i]==$valInicial)?$valFinal:$miArray[$i];
        }

        echo "<br><br>";
        echo "<h3>Array con los valores intercambiados</h3>";
        foreach ($miArray as $value) {
            if($value==$valFinal){
                echo "<span style='color:green; font-weight:bold; font-size:1.2em;'>$value</span> -";
            }else{
                echo "$value -";
            }
        }

    }


    ?>
</body>
</html>