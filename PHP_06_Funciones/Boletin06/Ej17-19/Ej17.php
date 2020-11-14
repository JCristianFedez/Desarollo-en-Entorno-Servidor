<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Binario a Decimal</title>
</head>

<body>
    <h1>Binario a Decimal</h1>
    <?php
    include_once "cambiarBaseNum.php";
    ?>
    <form action="#" method="post">
        <label for="binary">Numero Binario
            <input type="number" name="binary" id="binary" required>
        </label>
        <br>
        <input type="submit" value="Transformar">
    </form>
    <br>
    <?php 
    if(isset($_REQUEST["binary"])){
        $binary=$_REQUEST["binary"];
        $decimal=binaryToDecimal($binary);
        echo "$binary<sub>2</sub> = $decimal<sub>10</sub>";
    }
    ?>
</body>

</html>