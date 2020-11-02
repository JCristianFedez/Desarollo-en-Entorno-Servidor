<!-- Realiza un minicuestionario con 10 preguntas tipo 
test sobre las asignaturas que se imparten en
el curso. Cada pregunta acertada sumará un punto. El 
programa mostrará al final la calificación
obtenida. Pásale el minicuestionario a tus compañeros y
 pídeles que lo hagan para ver qué tal andan
de conocimientos en las diferentes asignaturas del curso. -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ej12</title>
</head>
<body>
    <center>
    <h1>Cuestionario</h1>

    <?php
    if ((!isset($_GET["resp1"]))||(!isset($_GET["resp2"]))||(!isset($_GET["resp3"])||(!isset($_GET["resp4"])))) {
        ?>
    <form action="#" method="get">
        
        <fieldset>
            <h4>Cual es un lenguaje de entorno servidor</h4> <br>
            <label>Html<input type="radio" name="resp1" value="0"></label><br>
            <label>PHP<input type="radio" name="resp1" value="1"></label><br>
            <label>CSS<input type="radio" name="resp1" value="0"></label><br>
            <label>ServerLenguajeMicrosoft<input type="radio" name="resp1" value="0"></label><br>
        </fieldset>

        <br>
        <fieldset>
            <h4>Que significa el acronimo PHP</h4> <br>
            <label>Personal host pytho<input type="radio" name="resp2" value="0"></label><br>
            <label>Procesament Lenguaje Protocol<input type="radio" name="resp2" value="0"></label><br>
            <label>Hypertext Preprocessor<input type="radio" name="resp2" value="1"></label><br>
            <label>Pop Hyper Pepe<input type="radio" name="resp2" value="0"></label><br>
        </fieldset>

        <br>
        <fieldset>
            <h4>1+1</h4> <br>
            <label>Esta no<input type="radio" name="resp3" value="0"></label><br>
            <label>Sigue bajando<input type="radio" name="resp3" value="0"></label><br>
            <label>ESTA<input type="radio" name="resp3" value="1"></label><br>
            <label>Te has pasado, ve atras<input type="radio" name="resp3" value="0"></label><br>
        </fieldset>

        <br>
        <fieldset>
            <h4>Cual CMS</h4> <br>
            <label>WordPress<input type="radio" name="resp4" value="1"></label><br>
            <label>Windows<input type="radio" name="resp4" value="0"></label><br>
            <label>Ubuntu<input type="radio" name="resp4" value="0"></label><br>
            <label>MacOs<input type="radio" name="resp4" value="0"></label><br>
        </fieldset>
    
        <input type="submit" value="Comprobar">
    </form>

        <?php
    } else {

        $resp1=$_GET["resp1"];
        $resp2=$_GET["resp2"];
        $resp3=$_GET["resp3"];
        $resp4=$_GET["resp4"];

        $resultado=$resp1+$resp2+$resp3+$resp4;

        echo "<h4>Has hacertado $resultado preguntas</h4>";
        
        echo "<button onclick='window.history.go(-1)'>Volver a intentar</button>";
    }
    
    
    ?>
    </center>
</body>
</html>