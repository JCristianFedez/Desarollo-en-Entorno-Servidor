<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        table{
            text-align: center;
        }
        .paginas td{
            width:15px;
        }
    </style>
</head>
<body>
    
    <?php 
    try {
        $conexion = new PDO("mysql:host=localhost;dbname=banco;charset=utf8", "root", "");
    } catch (PDOException $e) {
        echo "No se ha podido establecer conexión con el servidor de bases de datos.<br>";
        die("Error: " . $e->getMessage());
    }
    $clientes_consulta = $conexion->query("select * from cliente");
    ///paginacion
    $tamano_pagina = 5;
    $num_total_registros = $clientes_consulta->rowCount();
    $total_paginas = ceil($num_total_registros / $tamano_pagina);

    if (isset($_GET["pagina"])) {
        $pagina = $_GET["pagina"];
        $inicio = ($pagina - 1) * $tamano_pagina;
    } else {
        $pagina = 1;
        $inicio = 0;
    }
    $clientes_consulta2 = $conexion->query("select * from cliente limit " . $inicio . "," . $tamano_pagina);

    ?>

    <table border="1">
        <tr>
       <td colspan="6">mantenimiento de clientes</td> 
    </tr>
        <tr>
            <td><h3>dni</h3></td>
            <td><h3>nombre</h3></td>
            <td><h3>direccion</h3></td>
            <td><h3>telefono</h3></td>
            <td colspan="2"><h3>modificaciones</h3></td>
        </tr>
        
            <?php 

            while ($registro = $clientes_consulta2->fetchObject()) {
                ?>
                    <tr>
                    <td><?= $registro->dni ?></td>
                    <td><?= $registro->nombre ?></td>
                    <td><?= $registro->direccion ?></td>
                    <td><?= $registro->telefono ?></td>
                    <td>
                        <form action="modificar.php" method="post">
                            <input type="hidden" name="dni" value="<?= $registro->dni ?>">
                            <input type="hidden" name="nombre" value="<?= $registro->nombre ?>">
                            <input type="hidden" name="direccion" value="<?= $registro->direccion ?>">
                            <input type="hidden" name="telefono" value="<?= $registro->telefono ?>">
                            <input type="submit" value="modificar"></td>
                        </form>
                    </td>
                    <td>
                        <form action="borrar.php" method="post">
                            <input type="hidden" name="dni" value="<?= $registro->dni ?>">
                            <input type="submit" value="borrar">
                        </form>
                    </td>

                    </tr>
                    <?php

                }
                
                ?>
        <tr>
            <form action="añadir.php" method="post">
                
                <td><input type="text" name="dni"></td>
                <td><input type="text" name="nombre"></td>
                <td><input type="text" name="direccion"></td>
                <td><input type="number" name="telefono"></td>
                <td colspan="2"><input type="submit" value="añadir" style=" width:100%"></td>
            </form>

        </tr>
         
    </table>
    <table border="1" class="paginas">
    <tr>
        <td><a href='ejercicio1.php?pagina=1'>inicio</a></td>
        <td><a href='ejercicio1.php?pagina=<?=$total_paginas ?>'>final</a></td>
    <?php  
        if ($total_paginas > 1) {
            for ($i = 1; $i <= $total_paginas; $i++) {
                echo("<td>");
                if ($pagina == $i) {
                  //muestro el índice de la página actual, no coloco enlace 
                    echo $pagina;
                } else {
                //si el índice no corresponde con la página mostrada actualmente, coloco el enlace para ir a esa página 
                    echo "<a href='ejercicio1.php?pagina=" . $i . "'>". $i ."</a>";
                }
                echo("</td>");
            }

        }
    
    ?>
       
    </tr>
</table>

</body>
</html>