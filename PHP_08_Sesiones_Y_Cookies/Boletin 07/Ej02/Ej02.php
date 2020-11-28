<!-- Realiza un programa que vaya pidiendo números hasta que se 
introduzca un numero negativo y nos diga cuantos números se
han introducido, la media de los impares y el mayor de los
 pares. El número negativo sólo se utiliza para indicar el 
 final de la introducción de datos pero no se incluye
en el cómputo. Utiliza sesiones. -->
<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if (!isset($_SESSION["cant"])) {
    $_SESSION["cant"]=0;
    $_SESSION["cantImpar"]=0;
    $_SESSION["avgImpar"]=0;
    $_SESSION["maxPar"]=0;
} else {
    if(isset($_REQUEST["num"])){
        $_SESSION["cant"]+=($_REQUEST["num"]>=0)?1:0;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ej02</title>
</head>
<body>
    <form action="#" method="post">
    <label for="num">Numero</label>
    <input type="number" name="num" id="num" required>
    <br>
    <input type="submit" value="Calcular">
    </form>
    <form action="#" method="post">
    <button type="submit" value="delete" name="delete">Borrar</button>
    </form>
    <?php
    if (isset($_REQUEST["delete"])) {
        session_destroy();
        header("refresh: 0;"); // refresca la página
    }

    if (isset($_REQUEST["num"])) {
        $num=$_REQUEST["num"];
        if ($num>=0) {
            

            if ($num%2==0 && $num>$_SESSION["maxPar"]) {
                $_SESSION["maxPar"]=$num;
            }

            if ($num%2!=0) {
                $_SESSION["cantImpar"]++;
                $_SESSION["avgImpar"]+=$num;
            }
        } else {
            if($_SESSION["cantImpar"]!=0){
                $avgImpar=$_SESSION["avgImpar"]/$_SESSION["cantImpar"];
            }else{
                $avgImpar=0;
            }
            echo "Se han introducido ".$_SESSION["cant"]."<br>";
            echo "El maximo par es: ".$_SESSION["maxPar"]."<br>";
            echo "El promedio par es: $avgImpar <br>";
        }
    }
    echo "<br>";
    echo "<br>";
    echo "<br>";
        print_r($_SESSION);

    ?>
</body>
</html>