<?php 
$URL_FILE="data_files\mascotas.txt";

if(session_status()==PHP_SESSION_NONE){
    session_start();
}

if(!isset($_SESSION["animales"]) && file_exists($URL_FILE)){
    $file=fopen($URL_FILE,"r");
    while(!feof($file)){
        $row=fgets($file);
        if($row[0]!="#"){
            $col=explode("-",$row);
            $_SESSION["animales"][$col[0]]=["especie"=>$col[1],"edad"=>$col[2]];
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Veterinaria</title>
</head>

<body>
    <div class="container">
        <h1>Veterinaria</h1>
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
        <div class="addPet">
            <form action="subSites/addPet.php" method="post">
                <input type="hidden" name="newPet" value="true">
                <input type="submit" value="Añadir mascota">
            </form>
        </div>
    </div>
</body>

</html>