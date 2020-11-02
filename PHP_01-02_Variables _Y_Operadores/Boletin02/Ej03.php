<!-- Realiza un conversor de pesetas a euros. La cantidad en pesetas que se quiere convertir se deberá
introducir por teclado.

 -->
 <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ej03</title>
</head>
<body>
    <center>
    <h1>Pesetas a Euros</h1>
    
    <?php
    if(!isset($_GET["pesetas"])){
        ?>
        <form action="#" method="get">
        <label>Pesetas: <input type="number" name="pesetas"></label>
        <br>
        <input type="submit">
        </form>
        <?php
    }else{
        $pesetas=$_GET["pesetas"];
        echo "$pesetas pesetas son ".round($pesetas/166.386,2)." euros";
    }

    ?>
    </center>
</body>
</html>