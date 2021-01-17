<?php 
if(!isset($_REQUEST["dia"]) || !isset($_REQUEST["hora"])){
    header("Location:../index.php");
}
require_once "../utils/db_connect.php";
require_once "../utils/db_consults.php";
$horario=selectRegister($conexion,"horario",["primera","segunda","tercera","cuarta","quinta","sexta"]);
$asignaturas=[];
while ($hora=$horario->fetchObject()) {
    if(!in_array($hora->primera,$asignaturas)){
        $asignaturas[]=$hora->primera;
    }
    if(!in_array($hora->segunda,$asignaturas)){
        $asignaturas[]=$hora->segunda;
    }
    if(!in_array($hora->tercera,$asignaturas)){
        $asignaturas[]=$hora->tercera;
    }
    if(!in_array($hora->cuarta,$asignaturas)){
        $asignaturas[]=$hora->cuarta;
    }
    if(!in_array($hora->quinta,$asignaturas)){
        $asignaturas[]=$hora->quinta;
    }
    if(!in_array($hora->sexta,$asignaturas)){
        $asignaturas[]=$hora->primera;
    }
}

$dia=$_REQUEST["dia"];
$hora=$_REQUEST["hora"];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://necolas.github.io/normalize.css/8.0.1/normalize.css">
    <link rel="stylesheet" href="../css/style.css">
    <title>Cambiar Asignatura</title>
</head>
<body>
    <div class="container">
        <div class="titulo">
            <h1>Modificar Asignatura del <?=$dia?> a <?=$hora?> hora</h1>
        </div>

        <div class="mod-asignatura">
            <form action="../utils/db_actions.php" method="post">
                <input type="hidden" name="action" value="modificar">
                <input type="hidden" name="dia" value="<?=$dia?>">
                <input type="hidden" name="hora" value="<?=$hora?>">
                <label for="nuevaAsignatura">Seleciona la nueva asignatura: </label>
                <select name="nuevaAsignatura" id="nuevaAsignatura" required>
                    <?php foreach($asignaturas as $asig): ?>
                        <option value="<?=$asig?>"><?=$asig?></option>
                    <?php endforeach; ?>
                </select>
                <input type="submit" value="Cambiar" class="boton">
            </form>
            <a href="../index.php" class="boton">Cancelar</a>
        </div>
    </div>
</body>
</html>
<?php $conexion=null; ?>