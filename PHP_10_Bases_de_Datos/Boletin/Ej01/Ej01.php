<?php 
require_once "utils/db_conect.php";
require_once "utils/db_consults.php";

$fullConsulta=showALL($conexion);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://necolas.github.io/normalize.css/8.0.1/normalize.css">
    <!-- <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css"> -->
    <link rel="stylesheet" href="css/style.css">
    <title>Ej01</title>
</head>

<body>
    <div class="container">
        <div class="title">
            <h1>Mantenimiento de clientes</h1>
        </div>
        <div class="table">
            <table>
                <thead>
                    <th>DNI</th>
                    <th>Nombre</th>
                    <th>Direccion</th>
                    <th>Telefono</th>
                    <th></th>
                    <th></th>
                </thead>
                <tbody>
                    <?php 
                while($cliente = $fullConsulta->fetchObject()){
                    ?>
                    <tr>
                        <td><?=$cliente->DNI;?></td>
                        <td><?=$cliente->Nombre;?></td>
                        <td><?=$cliente->Direccion;?></td>
                        <td><?=$cliente->Telefono;?></td>
                        <td><a href="action.php?action=delete&dni=<?=$cliente->DNI?>" class="fa icon delete">Borrar</a></td>
                        <td><a href="action.php?action=edit&dni=<?=$cliente->DNI?>" class="fa icon edit">Moditificar</a></td>
                    </tr>
                    <?php
                }
                ?>
                    <tr>
                        <form action="action.php" method="post">
                            <td><input type="text" name="DNI" id="name" required></td>
                            <td><input type="text" name="Nombre" id="name" required></td>
                            <td><input type="text" name="Direccion" id="name" required></td>
                            <td><input type="number" name="Telefono" id="name" required></td>
                            <input type="hidden" name="action" value="add">
                            <td colspan="2"><button type="submit" class="fa icon add"> Añadir</button></td>
                        </form>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>