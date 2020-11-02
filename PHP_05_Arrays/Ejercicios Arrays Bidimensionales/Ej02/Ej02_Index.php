<!-- Realizar una página web para realizar pedidos de comida rápida. Tenemos tres tipos de
comida:
Pizza: jamon, atun, bacon, peperoni
Hamburguesa: lechuga, tomate, queso
Perrito caliente: lechuga, cebolla, patata
A traves de tres formularios distintos, uno para cada tipo de comida se va añadiendo
comida al pedido con sus respectivos ingredientes, hasta que se pulse el botón finalizar
pedido (en otro formulario), con lo que se mostrará el pedido completo en una tabla,
con toda la comida y las opciones de cada una.
Usar las función serialize() y unserialize() para pasar arrays como cadenas
Nota: con arrays de 2 dimensiones la serialización se corrompe, así que hay que usar la
función en combinación con otra de la siguiente forma:
$cadenaTexto=base64_encode(serialize($array));
$array=unserialize(base64_decode($cadenaTexto));  -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Ej02</title>
</head>

<body>
    <h1>Fast Food</h1>
    <?php
        if (!isset($_REQUEST["myBtn"])) {
            if(!isset($_REQUEST["miPedido"])){//La primera vez
                $miPedido=[];//Creo un array Vacio
                $miPedidoStr=base64_encode(serialize($miPedido));//Lo serializo
            }else{
                $miPedidoStr=$_REQUEST["miPedido"];
            }
       ?>
    <form action="#" method="post">
        <input type="hidden" name="miPedido" value="<?=$miPedidoStr?>">
        <button type="submit" name="myBtn" value="pizza">Pedir Pizza</button>
        <button type="submit" name="myBtn" value="hamburguesa">Pedir Hamburguesa</button>
        <button type="submit" name="myBtn" value="perrito">Pedir Perrito</button>
        <button type="submit" name="myBtn" value="pedir">Terminar Pedido</button>
    </form>
    <?php
        }else{
            $accion=$_REQUEST["myBtn"];
            $miPedidoStr=$_REQUEST["miPedido"];
            ?>
    <form action="<?="Ej02_".$accion.".php"?>" method="post" name="autoEnviar">
        <input type="hidden" name="miPedido" value="<?=$miPedidoStr?>">
    </form>
    <?php

        }
    ?>
    <script>
        window.onload = function () {
            // Una vez cargada la página, el formulario se enviara automáticamente.
            document.forms["autoEnviar"].submit();
        }
    </script>
</body>

</html>