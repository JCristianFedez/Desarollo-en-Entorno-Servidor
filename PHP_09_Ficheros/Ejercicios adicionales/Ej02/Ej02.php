<?php 
$URL_FILE="data_files\mascotas.txt";

if(session_status()==PHP_SESSION_NONE){
    session_start();
}

if(!isset($_SESSION["animales"]) && file_exists($URL_FILE)){
    $file=fopen($URL_FILE,"r");
    while(!feof($file)){
        $row=fgets($file);
        if($row[0]=="#"){
            $data=$row;
        }else{
            $col=explode("-",$row);
            $_SESSION["animales"][$data][]=["nombre"=>$col[0],"especie"=>$col[1],"edad"=>$col[2]];
        }        
    }
    fclose($file);
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
        <div class="form">
            <form action="#" method="post">
                <select name="date" id="date">
                    <?php 
                        foreach ($_SESSION["animales"] as $fecha => $info) {
                            echo "<option value='$fecha'>$fecha</option>";
                        }
                    ?>
                </select>
                <input type="submit" value="Mostrar">
            </form>
        </div>
        <div class="table">
        <?php 
        if(isset($_REQUEST["date"])){
            ?>
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
                    foreach ($_SESSION["animales"][$_REQUEST["date"]] as $fecha => $info) {
                        echo "<tr>";
                            foreach ($info as $propiety) {
                                echo "<td>$propiety</td>";
                            }
                        echo "</tr>";
                    }
                    ?>
                </tbody>
            </table>
            <?php
        }
        ?>
        </div>
    </div>
</body>

</html>