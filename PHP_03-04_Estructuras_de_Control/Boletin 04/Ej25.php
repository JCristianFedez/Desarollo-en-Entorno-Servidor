<!-- Realiza un programa que pida un número por teclado y que luego muestre
ese número al revés. -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ej25</title>
</head>
<body>
    <h3>Invertir numero</h3>
    <?php 
    if(!isset($_REQUEST["num"])){
        ?>
            <form action="#" method="post">
                <label>Numero: <input type="number" name="num" require></label>
                <br>
                <input type="submit" value="Generar piramide">
            </form>
        <?php
    }else{
        $num=$_REQUEST["num"];
        $simbolo=($num<0)?"-":"";
        $numInv=$simbolo.abs(strrev($num));
        echo $numInv;
        echo "<br><button onclick='window.location.href=\"Ej25.php\";'>Nuevo numero</button>";
    }
    ?>
</body>
</html>