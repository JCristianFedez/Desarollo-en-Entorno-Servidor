<!-- Diseñar una página que esté compuesta por una
 tabla de 100 filas por 100 columnas, y en cada
celda habrá una imagen de un ojo cerrado. Cada vez 
que el usuario pulse un ojo, ser recargará
la página con todos los ojos cerrados salvo el que 
se ha pulsado que corresponderá a un ojo
abierto.
 -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ej02</title>
    <style>
    table,td{
        border:solid 1px black;
        border-collapse:collapse;
    }
    img{
        width:15px;
        height:15px;
    }
    </style>
</head>
<body>
    <center>
    <?php 
    if(!isset($_GET["pos"])){
        ?>
            <form action="#" method="get">
                <table>
                    <?php 
                        for ($i=0; $i < 100; $i++) { 
                            echo "<tr>";
                            for ($j=0; $j < 100; $j++) { 
                                echo "<td><a href='?pos=$i-$j'><img src='Imagenes/closed.png'></a></td>";
                            }
                            echo "</tr>";
                        }
                    ?>
                </table>
            </form>
        <?php
    }else{
        $pos=$_GET["pos"];
        list($fila,$columna)=explode("-",$pos);
        ?>
        <table>
            <?php 
                for ($i=0; $i < 100; $i++) { 
                    echo "<tr>";
                    for ($j=0; $j < 100; $j++) { 
                        if($i==$fila && $j==$columna){
                            echo "<td><img src='Imagenes/open.png'></td>";

                        }else{
                            echo "<td><img src='Imagenes/closed.png'></td>";
                        }
                    }
                    echo "</tr>";
                }
            ?>
        </table>
        <br>
        <button onclick="window.history.go(-1)">Marcar otro ojo</button>
        <?php
    }
    ?>
    </center>
</body>
</html>