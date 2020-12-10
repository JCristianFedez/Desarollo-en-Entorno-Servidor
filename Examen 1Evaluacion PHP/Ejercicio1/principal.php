<?php 
if (session_status() == PHP_SESSION_NONE) {
    session_start();
} 
if(isset($_REQUEST["accion"])){
    if($_REQUEST["accion"]){
        switch ($_REQUEST["accion"]) {
            case 'vaciarCursos':
                unset($_SESSION["ruizGijon"]);
                // unset($_SESSION);
                break;
        }
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Principal</title>
</head>
<body>
    <h1>Gestion de alumnos por clase - IES RUIZ GIJON</h1>
    <br>
    <form action="registrarAlumnos.php" method="post">
    <select name="clase">
    <option value="1SMR">1SMR</option>
    <option value="2SMR">2SMR</option>
    <option value="1DAW">1DAW</option>
    <option value="2DAW">2DAW</option>
    </select>
    <input type="submit" value="Introducir alumnos">
    </form>
    <br>
    <form action="#" method="post">
    <button type="submit" name="accion" value="vaciarCursos">Comenzar un nuevo curso</button>
    </form>
    <span>(se borraran todos los alumnos de todas las clases)</span>
</body>
</html>