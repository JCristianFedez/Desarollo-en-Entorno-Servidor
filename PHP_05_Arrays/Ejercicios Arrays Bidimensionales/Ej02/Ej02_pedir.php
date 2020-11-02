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
    <title>Pedir</title>
</head>
<body>
<h1>Fast Food</h1>
<br>
<h3>Ticket</h3>
    <?php 
    $miPedido=unserialize(base64_decode($_REQUEST["miPedido"]));
    for ($i=0; $i < count($miPedido); $i++) { 
        echo "<b>".$miPedido[$i][0]." : </b>";
        for ($j=1; $j < count($miPedido[$i]); $j++) { 
            echo $miPedido[$i][$j].", ";
        }
        echo "<br>";
    }
    ?>
    <button onclick="window.location.href='Ej02_Index.php'">Volver a pedir</button>
</body>
</html>