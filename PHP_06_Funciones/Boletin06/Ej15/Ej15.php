<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Muchos Primos</title>
</head>

<body>
    <h1>Primos entre dos numeros</h1>
    <?php
    include_once "../Ej01-14/misMatematicas.php"
    ?>
    <form action="#" method="post">
        <label for="num1">Numero Inicial
            <input type="number" name="num1" id="num1" required>
        </label>
        <br>
        <label for="num2">Numero Final
            <input type="number" name="num2" id="num2" required>
        </label>
        <br>
        <input type="submit" value="Calcular">
    </form>
    <br>
    <?php 
    if(isset($_REQUEST["num1"]) && isset($_REQUEST["num2"])){
        $num1=$_REQUEST["num1"];
        $num2=$_REQUEST["num2"];
        while($num1<$num1){
            $num1=siguientePrimo($num1);
            echo "[$num1]";
        }
    }
    ?>
</body>

</html>