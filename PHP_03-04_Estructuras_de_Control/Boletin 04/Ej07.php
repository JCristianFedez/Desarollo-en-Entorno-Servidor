<!-- Realiza el control de acceso a una caja fuerte. La combinación será 
un número de 4 cifras. El programa nos pedirá la combinación para abrirla. 
Si no acertamos, se nos mostrará el mensaje “Lo siento, esa no es la 
combinación” y si acertamos se nos dirá “La caja fuerte se ha abierto
satisfactoriamente”. Tendremos cuatro oportunidades para abrir la caja 
fuerte -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ej05</title>
</head>
<body>
    <h3>Caja fuerte</h3>
    <?php 
    if(!isset($_REQUEST["clave"])){
        $clave=rand(1,9999);
        $intentos=4;
    }else{
        $clave=$_REQUEST["clave"];
        $intentos=$_REQUEST["intentos"];
    }

    if(!isset($_REQUEST["solucion"])){
        ?>
            <form action="#" method="post">
                <label>Ingrese la clave: <input type="number" name="solucion" require min=1 max=9999 placeholder="[1-9999]"></label>
                <br>
                <input type="hidden" name="clave" value="<?php echo $clave; ?>">
                <input type="hidden" name="intentos" value="<?php echo $intentos; ?>">
                <input type="submit" value="Abrir">
            </form>
        <?php 
    }else{
        $solucion=$_REQUEST["solucion"];
        $clave=$_REQUEST["clave"];
        $intentos=$_REQUEST["intentos"];
        if($solucion==$clave){
            echo "<h1>Clave : $clave</h1>";
            echo "<h3>La caja fuerte se ha abierto satisfactoriamente en el intento $intentos</h3>";
        }else{
            echo "<h3>Lo siento, esa no es la combinacion, te quedan $intentos</h3>";
            $intentos--;

            echo "<button onclick='window.location=\"?clave=$clave&intentos=$intentos\";'>Volver</button>";

        }
    }
    ?>
</body>
</html>