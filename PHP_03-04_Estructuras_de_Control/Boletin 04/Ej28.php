<!-- Escribe un programa que calcule el factorial de un número entero
leído por teclado.  -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ej28</title>
</head>
<body>
    <h3>Factorial de n</h3>
    <?php 
    if(!isset($_REQUEST["num"])){
        ?>
            <form action="#" method="post">
                <label>Numero: <input type="number" name="num" require></label>
                <br>
                <input type="submit" value="Calcular">
            </form>
        <?php
    }else{
        $num=$_REQUEST["num"];
        $fac=1;
        for ($i=1; $i <=$num; $i++) { 
            $fac*=$i;
        }
        echo "El factorial de $num es $fac";
        echo "<br><button onclick='window.location.href=\"Ej28.php\";'>Nueva piramide</button>";
    }
    ?>
</body>
</html>