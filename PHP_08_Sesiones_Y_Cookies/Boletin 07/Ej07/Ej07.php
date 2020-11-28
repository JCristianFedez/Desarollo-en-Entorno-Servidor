<!-- Escribe un programa que guarde en una cookie el color de 
fondo (propiedad background-color) de una página. Esta página 
debe tener únicamente algo de texto y un formulario para 
cambiar el color -->
<?php
//Si envio un dato lo guardo en la cookie
if (isset($_REQUEST["color"])) {
    $color=$_REQUEST["color"];
    setcookie("color", $color);
// setcookie("color",$color,time()+7*24*3600);

//Si no he enviado nada y hay una cookie cojo el valor de la cookie
} elseif (isset($_COOKIE["color"])) {
    $color=$_COOKIE["color"];
}else{
    $color="white";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ej07</title>
    <style>
        body{
            background-color:<?=$color?>;
        }
    </style>
</head>
<body>
    <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Corporis tempore eligendi, aliquam, magnam cum eveniet perferendis in veniam ut ipsam at consequuntur, error quos voluptates ratione ipsa quia voluptatibus officia!</p>
    <form action="#" method="post">
        <label for="color">Selecciona un color</label>
        <select name="color" id="color" onchange="this.form.submit();">
            <option value="red">Rojo</option>
            <option value="blue">Azul</option>
            <option value="green">Verde</option>
            <option value="yellow">Amarillo</option>
        </select>
    </form>
</body>
</html>