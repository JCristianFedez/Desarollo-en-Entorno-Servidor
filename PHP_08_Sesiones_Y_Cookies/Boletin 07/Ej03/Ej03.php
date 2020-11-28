<!-- Escribe un programa que permita ir introduciendo una serie 
indeterminada de números mientras su suma no supere el 
valor 10000. Cuando esto último ocurra, se debe mostrar el 
total acumulado, el contador de los números introducidos y 
la media. Utiliza sesiones. -->
<?php 
if(session_status() == PHP_SESSION_NONE){
    session_start();
}

if(!isset($_SESSION["cant"])){
    $_SESSION["cant"]=0;
    $_SESSION["suma"]=0;
}else{
        $_SESSION["cant"]++;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ej03</title>
</head>
<body>
    <form action="#" method="post">
    <label for="num">Numero</label>
    <input type="number" name="num" id="num" required>
    <br>
    <input type="submit" value="Sumar">
    </form>
    <form action="#" method="post">
    <button type="submit" value="delete" name="delete">Borrar</button>
    </form>
    <?php 

    if(isset($_REQUEST["num"])){
        $_SESSION["suma"]+=$_REQUEST["num"];
        if($_SESSION["suma"]>=10000){
            $avg=$_SESSION["suma"]/$_SESSION["cant"];
            echo "Suma total : ".$_SESSION["suma"]."<br>";
            echo "Cantidad de numeros introducidos : ".$_SESSION["cant"]."<br>";
            echo "Promedio: $avg <br>";
        }
    }
    if(isset($_REQUEST["delete"])){//Borrar
        session_destroy();
        header("refresh: 0");
    }
    print_r($_SESSION);
    ?>
</body>
</html>