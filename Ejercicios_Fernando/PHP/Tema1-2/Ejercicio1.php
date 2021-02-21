<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    $radio = $_POST['diametro']/2;
    //$volumen=3.14*$radio*$radio*$_POST['altura'];
    $volumen=M_PI * pow($radio,2) * $_POST['altura'];
    echo "<h1>El volumen del cilindro es ".$volumen."</h1>";
    ?>
    <img src="https://www.caracteristicass.de/wp-content/uploads/2018/06/caracteristicas-del-cilindro.jpg" alt="imagen de un cilindro">
</body>
</html>