<?php 
if(session_status()==PHP_SESSION_NONE){
    session_start();
}

if(!isset($_REQUEST["newPet"]) || !isset($_SESSION["animales"])){
    header("Location: ../Ej01.php");
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <title>Add Pet</title>
</head>

<body>
    <div class="container row">
        <div class="table">
            <table>
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Especie</th>
                        <th>Edad</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    foreach($_SESSION["animales"] as $name => $info){
                        echo "<tr>";
                        echo "<td>$name</td>";
                        foreach($info as $propiety){
                            echo "<td>$propiety</td>";
                        }
                        echo "</tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
        <div class="form">
            <form action="actions.php" method="post">
                <div class="form-item">
                    <label for="name">Nombre:</label>
                    <input type="text" name="name" id="name" required>
                </div>

                <div class="form-item">
                    <label for="specie">Especie:</label>
                    <input type="text" name="specie" id="specie" required>
                </div>

                <div class="form-item">
                    <label for="age">Edad:</label>
                    <input type="number" name="age" id="age">
                </div>
                <input type="hidden" name="action" value="add">
                <input type="submit" value="Añadir">
            </form>
            <div class="form-button">
                <form action="actions.php" method="post">
                    <input type="hidden" name="action" value="save">
                    <input type="submit" value="Guardar nuevos">
                </form>
            </div>
        </div>

    </div>
</body>

</html>