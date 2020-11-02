<!-- Escribe un programa que muestre en tres columnas, el cuadrado y 
el cubo de los 5 primeros números enteros a partir de uno que se
introduce por teclado.
 -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ej11</title>
</head>
<body>
<h3>Cuadrado, cubo de los 5 primeros numeros a partir del introducido</h3>
    <?php 
    if(!isset($_REQUEST["num"])){
        ?>
        <form action="#" method="post">
            <label>Introduce un Numero:<input type="number" name="num" required></label>
            <br>
            <input type="submit" value="Calcular">
        </form>
        <?php
    }else{
        $num=$_REQUEST["num"];
        echo "<table border='1' cellspacing='0' >";
            echo "<thead><tr><th>Cuadrado</th><th>Cubo</th></tr></thead>";
            echo "<tbody>";
                for ($i=$num; $i <($num+5); $i++) { 
                    echo "<tr>";
                        echo "<td>$num^<sup>2</sup>=".pow($num,2)."</td>";
                        echo "<td>$num^<sup>3</sup>=".pow($num,3)."</td>";
                    echo "</tr>";
                }
            echo "</tbody>";


        echo "</table>";

        echo "<br><button onclick='window.history.go(-1);'>Introducir otro numero</button>";
    }
     ?>
</body>
</html>