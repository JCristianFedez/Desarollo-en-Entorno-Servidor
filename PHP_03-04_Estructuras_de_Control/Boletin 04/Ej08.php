<!-- Muestra la tabla de multiplicar de un número introducido por teclado. 
El resultado se debe mostrar en una tabla (<table> en HTML). -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ej08</title>
    <style>
    table,td{
        border:1px black solid;
        border-collapse:collapse;
        padding:0.5em;
    }
    </style>
</head>
<body>
    <?php
    if (!isset($_REQUEST["num"])) {
        ?>
    <form action="#" method="post">
    <label>Serie de la tabla de multiplicar: <input type="number" name="num" id="" require></label>
    <br>
    <input type="submit" value="Calcular">
    </form>
        <?php
    } else {
        $num=$_REQUEST["num"]; ?>
        <h3>Introduzca un numero y se le dira su tabla de multiplicar</h3>
        <table>
            <?php for ($i=0; $i <=10; $i++) {
            echo "<tr>";
            echo "<td>$num</td><td>X</td><td>$i</td><td>".($i*$num)."</td>";
            echo "</tr>";
        } ?>
        </table>
        <button onclick="window.history.go(-1);">Otra tabla</button>
        <?php
    }
     ?>
</body>
</html>