<?php session_start();
if (isset($_REQUEST['limpiar'])) {
    session_destroy();
    header("refresh:0;");
}
if (!isset($_SESSION['alumnos'])) {
    $_SESSION['alumnos']=[
    '1SMR'=>[],
    '2SMR'=>[],
    '1DAW'=>[],
    '2DAW'=>[]];
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
<form action="registrarAlumnos.php">
    <select name="clase">
<?php 
  foreach ($_SESSION['alumnos'] as $clase => $alumnos) { 
    echo "<option value='$clase'>".strtoupper($clase)."</option>";
}
?>
</select>
<input type="submit" name="enviar" value="Introducir alumnos">
</form>
<br><br>
<form action="principal.php" method="post">
    <input type="submit" name="limpiar" value="Comenzar un nuevo curso">
    (se borraran todos los alumnos de todos las clases)
</form>
</body>
</html>