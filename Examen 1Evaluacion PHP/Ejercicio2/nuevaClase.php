<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

//Si no estan cargada la sesion redirige a la pagina principal
//-Debido a que si no esta cargada y agregamos uno este sera el unico
//-curso que tengamos ya que no cargara ni la cookie ni la sesion por defecto
if (!isset($_SESSION["ruizGijon2"])) {
    header("Location: principal.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nueva Clase</title>
</head>
<body>
    <form action="principal.php" method="post">
    <input type="hidden" name="accion" value="agregarClase">
    <label for="nuevaClase"><h2>CLASE NUEVA:</h2>
    <input type="text" name="nombreNewClass">
    </label>
    <input type="submit" value="Añadir"></form>
</body>
</html>