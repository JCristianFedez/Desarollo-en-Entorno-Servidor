<!-- Realiza un programa que pida primero un número y a continuación un 
dígito. El programa nos debe dar la posición (o posiciones) contando de 
izquierda a derecha que ocupa ese dígito en el número introducido.
 -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ej26</title>
</head>
<body>
    <h3>Posicion de digito</h3>
    <?php 
    if((!isset($_REQUEST["num"]))||(!isset($_REQUEST["digito"]))){
        ?>
            <form action="#" method="post">
                <label>Numero: <input type="number" name="num" require ></label>
                <br>
                <label>Digito: <input type="number" name="digito" require ></label>
                <br>
                <input type="submit" value="Calcular">
            </form>
        <?php
    }else{
        $num=$_REQUEST["num"];
        $digito=$_REQUEST["digito"];
        $posiciones="";
        echo "Numero: $num , Digito:$digito";
        for ($i=0; $i <strlen($num) ; $i++) { 
            $posiciones.=($num[$i]==$digito)?$i.",":"";
        }
        echo "<br>Posiciones: $posiciones";
        echo "<br><button onclick='window.location.href=\"Ej26.php\";'>Calcular de nuevo</button>";

    }
    ?>
</body>
</html>