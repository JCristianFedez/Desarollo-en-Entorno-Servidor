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
    <title>Hamburguesa</title>
</head>

<body>
    <h1>Fast Food</h1>
    <?php 
    if(!isset($_REQUEST["addPedido"])){
        $miPedidoStr=$_REQUEST["miPedido"];
        ?>
    <form action="#" method="post" class="ingredientes">
        <fieldset>
            <legend>Hamburguesa</legend>
            <input type="hidden" name="miPedido" value="<?=$miPedidoStr?>">
            <input type="hidden" name="addPedido">
            <br>
            <label for="lechuga">Lechuga</label><input type="checkbox" name="lechuga" id="lechuga">
            <br>
            <label for="tomate">Tomate</label><input type="checkbox" name="tomate" id="tomate">
            <br>
            <label for="queso">Queso</label><input type="checkbox" name="queso" id="queso">
            <br>
            <input type="submit" value="Añadir">
            <br>
        </fieldset>
    </form>
    <div class="cancelar">
        <button onclick="window.history.go(-1);">Cancelar</button>
    </div>
    <?php
    }else{
        $ingredientes=["lechuga","tomate","queso"];
        $miPedido=unserialize(base64_decode($_REQUEST["miPedido"]));
        $aP=count($miPedido);//Posicion para agregar pedido
        $aux=1;
        $miPedido[$aP][0]="Hamburguesa";
        for ($i=0; $i < count($ingredientes); $i++) { //Agrego los ingredientes
            if(isset($_REQUEST[$ingredientes[$i]])){
                $miPedido[$aP][$aux]=$ingredientes[$i];
                $aux++;
            }
        }
        (count($miPedido[$aP])==1)?$miPedido[$aP][1]="Sola":"";

        ?>
    <form action="Ej02_Index.php" method="post" name="autoEnviar">
        <input type="hidden" name="miPedido" value="<?=base64_encode(serialize($miPedido))?>">
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