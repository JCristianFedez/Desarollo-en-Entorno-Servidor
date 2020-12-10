<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
//Si no se ha selccionado una clase vuelve a la pagina principal
if (isset($_REQUEST["clase"])) {
    $clase=$_REQUEST["clase"];
} else {
    header("Location: principal.php");
}

if (isset($_REQUEST["accion"])) {
    switch ($_REQUEST["accion"]) {
        case 'agregarAlumno':
            $myName=trim($_REQUEST["nombre"]);//Quitar espacios inicio final
            $myName=implode(' ',array_filter(explode(' ',$myName))); //Quitar espacios intermedios
            $myName=ucwords(strtolower($myName)," ");//Capitalizar todas las palabras
            $_SESSION["ruizGijon2"][$clase][]=[$myName=>[date("G:i A"),"Dia ".date("d")." del ".date("m")]];
            setcookie("ruizGijon2", base64_encode(serialize($_SESSION['ruizGijon2'])), time() + 364 * 24 * 3600);
        break;
        
        case "eliminarAlumnos":
            $_SESSION["ruizGijon2"][$clase]=[];
            setcookie("ruizGijon2", base64_encode(serialize($_SESSION['ruizGijon2'])), time() + 364 * 24 * 3600);
        break;
    }
    header("Location: ?clase=$clase");//No Introducir otro alumno al recargar la pagina
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        table,
        th,
        td {
            border: 1px solid black;
        }
        th{
            font-size:1.4rem;
        }
        td,th{
            padding:.5rem;
        }
        table {
            border-collapse: collapse;
        }
    </style>
    <title>Registrar Alumnos</title>
</head>

<body>
    <h1>Gestion de alumnos por clase - IES RUIZ GIJON</h1>
    <form action="#" method="post">
        <input type="hidden" name="clase" value="<?=$clase?>">
        <input type="hidden" name="accion" id="agregarAlumno" value="agregarAlumno"/>
        <label for="nombre">Nombre y apellidos del alumno:
        <input type="text" name="nombre" id="nombre" required></label>
        <input type="submit" value="Añadir alumno nuevo">   
    </form>
    <br>
    <button onClick="window.location.href='principal.php'">Volver a la pagina principal</button>
    <br><br>
    <table>
        <thead>
        <th colspan="3">Clase: <?=$clase?></th>
        </thead>
        <tbody>
            <?php
            if (isset($_SESSION["ruizGijon2"][$clase])) {
                foreach ($_SESSION["ruizGijon2"][$clase] as $key => $value) {
                    foreach ($value as $nombre => $date) {
                        echo "<tr><td>$nombre</td>";
                    foreach ($date as $key => $infoFecha) {
                        echo "<td>$infoFecha</td>";
                    }
                    echo "</tr>";
                    }
                }
            }
             ?>
        </tbody>
    </table>
    <br>
    <form action="#" method="post">
        <input type="hidden" name="clase" value="<?=$clase?>">
        <input type="hidden" name="accion" id="eliminarAlumnos" value="eliminarAlumnos"/>
        <input type="submit" value="Eliminar alumnos de esta clase">
    </form>
</body>