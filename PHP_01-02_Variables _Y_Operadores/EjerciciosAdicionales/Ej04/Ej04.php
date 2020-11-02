<!-- Diseñar un desarrollo web simple con php que pida al usuario el precio de un producto en tres
establecimientos distintos denominados “Tienda 1”, “Tienda 2” y “Tienda 3”. Una vez se
introduzca esta información se debe calcular y mostrar el precio medio del producto en las tres
tiendas. Mostrar en la página resultado, una tabla con un título, el precio en cada una de las
tiendas, la media de los tres precios y la diferencia del precio de cada tienda con la media.
Combina celdas para que quede visualmente agradable. 
 -->
 <!DOCTYPE html>
 <html lang="en">
 <head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel="stylesheet" href="style.css">
     <title>Ej04</title>
 </head>
 <body>
     <center>
         <div class="container">
             <?php
                if (!isset($_GET["formRelleno"])) {
                    ?>
                    <div id="formulario">
                    <form action="#" method="get">
                        <h1>Shoping</h1>
                        <h3>Introduze el valor del producto en cada tienda: </h3>

                                <?php
                                    for ($i=1; $i <= 3; $i++) { //Imprime 3 veces el input para meter el numero
                                        echo "<fieldset>";
                                        echo 'Tienda Nº '.$i.'<input placeholder="Tienda Nº'.$i.'" type="number" name="precioTienda[]" tabindex="'.$i.'" required>';
                                        echo "</fieldset>";
                                    } ?>
                                                   
                            
                        <fieldset>
                            <input type="hidden" name="formRelleno">
                            <input name="submit" type="submit" value="Comprobar">
                        </fieldset>
                        
                    </form>
                </div>
                    <?php
                } else {
                    $precioTienda=$_GET["precioTienda"];
                    $precioMedio=0;
                    foreach ($precioTienda as $value) {
                        $precioMedio+=$value;
                    }
                    $precioMedio/=count($precioTienda); ?>
                    
            <div id="respuesta">
                <h1>Shoping</h1>
                <table>
                    <thead>
                        <tr>
                            <th></th>
                            <?php
                                for ($i=1; $i <= count($precioTienda); $i++) {
                                    echo "<th>Tienda $i</th>";
                                } ?>
                                <th>Media</th>
                        </tr>
                    </thead>
                    
                    <tr>
                        <th>Precio</th>
                        <?php
                            for ($i=0; $i < count($precioTienda); $i++) { 
                                echo "<td>".$precioTienda[$i]."</td>";
                            } ?>
                            <td><?php echo $precioMedio; ?></td>
                    </tr>
                    <tr>
                        <th>Diferencia</th>
                        <?php                            
                            foreach ($precioTienda as $value) {
                               if($value>$precioMedio){
                                echo "<td class='caro'>".($value-$precioMedio)."</td>";
                               }elseif ($value<$precioMedio) {
                                echo "<td class='barato'>".($value-$precioMedio)."</td>";
                               }else{
                                echo "<td class='estandar'>".($value-$precioMedio)."</td>";
                               }
                            }?>
                            <td></td>
                    </tr>

                    
                </table>
            </div>
            <?php
                }
        
             ?>
         </div>
     </center>
 </body>
 </html>