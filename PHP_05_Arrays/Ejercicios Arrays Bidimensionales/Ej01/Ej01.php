<!-- Diseñar una página que esté compuesta por una tabla de 10 filas por 10 columnas, y en
cada celda habrá una imagen de un ojo cerrado. Cada vez que el usuario pulse un ojo,
ser recargará la página con todos los ojos cerrados salvo los que se han ido pulsando
que corresponderá a un ojo abierto. Conforme se vallan pulsando más ojos se irá
completando la tabla de ojos abiertos. Si se pulsa en un ojo abierto se volverá a cerrar.
Usar la función explode() para pasar arrays como cadenas. 
 -->

 <!DOCTYPE html>
 <html lang="en">
 <head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Ej01</title>
     <style>
    table,td{
        border:solid 1px black;
        border-collapse:collapse;
    }
    img{
        width:30px;
        height:30px;
    }
    </style>
 </head>
 <body>
     <?php 
    $CLOSED=0;
    $OPEN=1;

    if(!isset($_GET["miTabla"])){//Genero el array la primera vez con todos los ojos cerrados
        for ($i=0; $i < 10; $i++) { 
            for ($j=0; $j < 10; $j++) { 
                $miTabla[$i][$j]=$CLOSED;
            }
        }
    }else{
////////////Se pasa el string de mi tabla a ArrayBidimensional
    $miStr=$_GET["miTabla"];
    $miTabla=unserialize(base64_decode($miStr)); 
///////////////////////////////////////////////////////
    }
    



    if(isset($_GET["pos"])){//Cuando se pincha en un OJO se CIERRA O ABRE
        $pos=$_GET["pos"];
        list($fila,$columna)=explode(",",$pos);
        if($miTabla[$fila][$columna]==$OPEN){
            $miTabla[$fila][$columna]=$CLOSED;
        }else{
            $miTabla[$fila][$columna]=$OPEN;

        }
    }



/////////////////////////////////////////////
    //Pasar array bidimensional a string:
    $miStr=base64_encode(serialize($miTabla)); 

///////////////////////////////////////



            //SE PINTA LA TABLA CON LOS OJOS Y SE CARGA LA URL CON LA TABLA EN STRING Y LA POSICION DONDE SE PINCHA
        ?>
            <form action="#" method="get">
                <table>
                    <?php 
                        for ($i=0; $i < 10; $i++) { 
                            echo "<tr>";
                            for ($j=0; $j < 10; $j++) { 
                                if($miTabla[$i][$j]==$CLOSED){
                                    echo "<td><a href='?miTabla=$miStr&pos=$i,$j'><img src='Imagenes/closed.png'></a></td>";

                                }else{
                                    echo "<td><a href='?miTabla=$miStr&pos=$i,$j'><img src='Imagenes/open.png'></a></td>";
                                }
                            }
                            echo "</tr>";
                        }
                    ?>
                </table>
            </form>
            <button onclick="window.location='Ej01.php';">Reiniciar</button>

 </body>
 </html>