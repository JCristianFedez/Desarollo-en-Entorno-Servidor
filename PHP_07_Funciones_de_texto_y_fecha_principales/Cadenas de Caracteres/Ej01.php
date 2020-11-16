<!-- 1. Imprimir carácter por carácter un string dado, 
cada uno en una línea distinta. -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ej01</title>
</head>

<body>
    <form action="#" method="post">
        <label for="myStr">Introduce string</label>
        <input type="text" name="myStr" id="myStr" required>

        <br>
        <input type="submit" value="Modificar">
    </form>
    <?php
    if (isset($_REQUEST["myStr"])) {
        $myStr=$_REQUEST["myStr"];
        for ($i=0; $i < strlen($myStr); $i++) {
            echo $myStr[$i]."<br>";
        }
    }
    ?>
</body>

</html>