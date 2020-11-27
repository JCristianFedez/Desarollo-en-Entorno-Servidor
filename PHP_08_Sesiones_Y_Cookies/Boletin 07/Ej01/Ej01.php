<!-- Escribe un programa que calcule la media de un conjunto
de números positivos introducidos por teclado. A priori, 
el programa no sabe cuántos números se introducirán. El 
usuario indicará que ha terminado de introducir los datos
cuando meta un número negativo. Utiliza sesiones.
 -->
<?php
session_start();
if (!isset($_SESSION["cant"])) {
    $_SESSION["cant"]=0;
    $_SESSION["numbers"]=0;
} else {
    if (isset($_REQUEST["num"])) {//Si existe
        $num=$_REQUEST["num"];
        if (!empty($num)) {//Si no es nula
            $_SESSION["cant"]++;
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ej01</title>
</head>

<body>
    <form action="#" method="post">
        <label for="num">Introduce Numero</label>
        <input type="number" name="num" id="" required>
        <br>
        <input type="submit" value="Añadir">
    </form>
    <form action="#" method="post">
        <button type="submit" value="delete" name="delete">Borrar</button>
    </form>
    <br>
    <?php
    if (isset($_REQUEST["delete"])) {//Borro sesion
        session_destroy();
        header("refresh: 0;"); // refresca la página
    }
    if (isset($_REQUEST["num"])) {//Si se ha introducido numero
        $num=$_REQUEST["num"];
        if (!empty($num)) {//Si el numero introducido no es valido (Solo se le a dado a añadir)
            $_SESSION["numbers"]+=$num;
            $avg=$_SESSION["numbers"]/$_SESSION["cant"];
            echo "La media por ahora es ".round($avg, 2);
        }
    }
        echo "<br>";
        print_r($_SESSION);
        echo "<br>";
        print_r($_REQUEST);
    
    ?>
</body>

</html>