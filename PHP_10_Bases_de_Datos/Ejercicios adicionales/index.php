<?php 
require_once "utils/db_connect.php";
require_once "utils/db_consults.php";
$aux=selectRegister($conexion,"horario")->fetchAll();


$dias=["Lunes","Martes","Miercoles","Jueves","Viernes"];


//Parche para imprimir correctamente
$count=0;
$horas=["primera","segunda","tercera","cuarta","quinta","sexta"];
foreach ($aux as $key => $value) {
    for ($i=2; $i < (count($value)/2); $i++) { 
        $asig[$horas[$count]][]=$value[$i];
        $count++;
    }
    $count=0;
} 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://necolas.github.io/normalize.css/8.0.1/normalize.css">
    <link rel="stylesheet" href="css/style.css">
    <title>Horario</title>
</head>
<body>
    <div class="container">
        <div class="titulo">
            <h1>Horario</h1>
        </div>
        <div class="horario">
            <table>
                <thead>
                    <tr>
                        <?php foreach ($aux as $key => $value): ?>
                            <th><?=$value[1]?></th>
                        <?php endforeach; ?>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($asig as $hora => $value):?>
                        <tr>
                            <form action="subSites/modAsignatura.php" method="post">
                                <input type="hidden" name="hora" value="<?=$hora?>">
                                <?php $count=0; ?>
                                <?php foreach ($value as $clave => $asignatura): ?>
                                    <td><button type="submit" name="dia" value="<?=$dias[$count]?>"><?=$asignatura?></button></td>
                                    <?php $count++; ?>
                                <?php endforeach; ?>
                            </form>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
<?php 
$conexion=null; 
?>