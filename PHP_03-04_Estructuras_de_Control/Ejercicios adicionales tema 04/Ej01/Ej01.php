<!-- Diseñar una página web que muestre una tabla con 3 columnas, la primera corresponde al
número de bloque, la segunda al piso y en la tercera hay un botón llamar. En total hay 10
bloques y cada bloque tiene 7 pisos. Cuando se pulse llamar en un piso de un bloque, mostrará
en otra página el mensaje del tipo “Usted ha llamado al piso 3 del bloque 6”. Utiliza
estructuras repetitivas para generar la tabla.  -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ej01</title>
    <style>
    table,th,td{
        border:1px solid black;
        border-collapse:collapse;
    }
        </style>
</head>
<body>
    <center>
        <?php 
        if(!isset($_GET["planta"])){
    
            ?>
            <h1>Ascensor</h1>
            <br>
            <form action="#" method="get">
                <table>
                    <thead><th>Num Bloque</th><th>Piso</th><th>Boton</th></thead>
                    <?php 
                    for ($i=1; $i <= 10; $i++) { 
                        for ($j=0; $j <=7; $j++) { 
                            echo "<tr><td>Bloque: $i</td><td>Piso: $j</td><td><button type='submit' name='planta' value='$i-$j'>Ir</button></td></tr>";
                        }
                    }
                    ?>
                </table>
                
            </form>
    
    
            <?php
    
        }else{
            $planta=$_GET["planta"];
            list($bloque,$piso) = explode("-",$planta);
            echo "<h3>Usted a llamado al bloque $bloque, piso $piso</h3>";
            echo "<br><br><button onclick='window.history.go(-1)'>Ir a otro piso</button>";
        }
        ?>
    </center>
</body>
</html>