<?php
session_start();
if (!isset($_SESSION['alumnos'])||!isset($_REQUEST['clase'])) {
    header("location:principal.php");
}
if (isset($_REQUEST['borrar'])) {
        $_SESSION['alumnos'][$_REQUEST['clase']]=[];
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<h1>Gestión de alumnos por clase - IES RUIZ GIJÓN</h1>
<form action="registrarAlumnos.php" method="post">
    <label for="nombre">Nombre y apellidos del alumno:</label>
    <input type="text" name="nombre" id="nombre" autofocus>
    <input type="hidden" name="clase" value="<?= $_REQUEST['clase'] ?>">
    <input type="submit" name="enviar" value="Añadir alumno">
</form>
<form action="principal.php" method="post">
    <br><input type="submit" value="Volver a la página principal"><br><br>
</form>
<table border="1"><tr><th colspan='3'>Clase: <?= $_REQUEST['clase'] ?></th></tr>
<?php 
if (isset($_REQUEST['nombre'])) {
    $fecha=date("\D\i\a j \d\\e\l n");
    $hora=date("H:i A");
    $nombre=ucwords(strtolower($_REQUEST['nombre']));
    $_SESSION['alumnos'][$_REQUEST['clase']][]=[$nombre,$hora,$fecha];
}
foreach ($_SESSION['alumnos'][$_REQUEST['clase']] as $alumno) {
    echo "<tr>";
    foreach ($alumno as $dato) {
        echo "<td>$dato</td>";
    }
    echo "</tr>";
}
?>
</table><br>
<form action="registrarAlumnos.php" method="post">
    <input type="hidden" name="clase" value="<?= $_REQUEST['clase'] ?>">
    <input type="submit" name="borrar" value="Borrar todos los alumnos de esta clase">
</form>
</body>
</html>