<!-- Realiza un conversor de euros a pesetas. Ahora la cantidad en euros que se quiere convertir se
deberá introducir por teclado.
 -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ej02</title>
</head>
<body>
    <center>
    <h1>Euros a Pesetas</h1>
    
    <?php
    if(!isset($_GET["euros"])){
        ?>
        <form action="#" method="get">
        <label>Euros: <input type="number" name="euros"></label>
        <br>
        <input type="submit">
        </form>
        <?php
    }else{
        $euros=$_GET["euros"];
        echo "$euros euros son ".round($euros*166.386,2)." pesetas";
    }

    ?>
    </center>
</body>
</html>