<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Decimal a Binario</title>
</head>

<body>
    <h1>Decimal a Binario</h1>
    <?php
    include_once "cambiarBaseNum.php";
    ?>
    <form action="#" method="post">
        <label for="decimal">Numero Decimal
            <input type="number" name="decimal" id="decimal" required>
        </label>
        <br>
        <input type="submit" value="Transformar">
    </form>
    <br>
    <?php 
    if(isset($_REQUEST["decimal"])){
        $decimal=$_REQUEST["decimal"];
        $binary=decimalToBinary($decimal);
        echo "$decimal<sub>10</sub> = $binary<sub>2</sub>";
    }
    ?>
</body>

</html>