<?php 
if (session_status() == PHP_SESSION_NONE) {
    session_start();
} 

//Si existen las cookies y no la sesion entonces cargo las cookies
if (isset($_COOKIE["ruizGijon2"]) && !isset($_SESSION["ruizGijon2"])) {
    $_SESSION["ruizGijon2"]=unserialize(base64_decode($_COOKIE["ruizGijon2"]));
}

//Si no existe la sesion entonces creo una por defecto
if (!isset($_SESSION["ruizGijon2"])) {
    $_SESSION["ruizGijon2"] = [
        "1SMR" => [],
        "2SMR" => [],
        "1DAW" => [],
        "2DAW" => []
    ];

    //Guardo la sesion en las cockies
    setcookie("ruizGijon2", base64_encode(serialize($_SESSION['ruizGijon2'])), time() + 364 * 24 * 3600);
}

if(isset($_REQUEST["accion"])){
    if($_REQUEST["accion"]){
        switch ($_REQUEST["accion"]) {
            case 'vaciarCursos':
                setcookie("ruizGijon2", NULL, -1);
                unset($_SESSION["ruizGijon2"]);

                //Recargo la pagina para que sea efectivo el borrado de cookies
                header("Refresh:0");
                break;

            case "agregarClase":
                $_SESSION["ruizGijon2"][$_REQUEST["nombreNewClass"]]=[];
                setcookie("ruizGijon2", base64_encode(serialize($_SESSION['ruizGijon2'])), time() + 364 * 24 * 3600);
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
            <?php 
    foreach ($_SESSION["ruizGijon2"] as $key => $value) {
        echo "<option value='$key'>$key</option>";
    }
    ?>
        </select>
        <input type="submit" value="Introducir alumnos">
    </form>
    <br>
    <form action="nuevaClase.php" method="post">
        <input type="submit" value="Añadir nueva clase">
    </form>
    <br>
    <form action="#" method="post">
        <button type="submit" name="accion" value="vaciarCursos">Comenzar un nuevo curso</button>
    </form>
    <span>(se borraran todos los alumnos de todas las clases)</span>
</body>

</html>