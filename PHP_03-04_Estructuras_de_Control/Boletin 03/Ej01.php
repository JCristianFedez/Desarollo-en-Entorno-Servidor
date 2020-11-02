<!-- Escribe un programa que pida por teclado un día de la semana 
y que diga qué asignatura toca a primera hora ese día.
 -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ej01</title>
</head>
<body>
    <center>
    <h1>Horario</h1>
    <?php 
    if(!isset($_GET["dia"])){
        ?>
        <form action="#" method="get">
        <label>Introduce el dia de la semana <input placeholder="Dia de la semana" type="text" name="dia" require></label>
        <br>
        <input type="submit" value="Combrobar">
        </form>
        <?php
    }else{
        $correcto=false;
        $dia=$_GET["dia"];
        $dias=["lunes","martes","miercoles","jueves","viernes","sabado","domingo"];
        $asignatura=["DIW","DWES","DIW","DEWC","Android","Libre","Libre"];
        for ($i=0; $i < count($dias); $i++) { 
            if($dias[$i]==$dia){
                echo "<h2>El $dia toca $asignatura[$i] a primera hora</h2>";
                $i=count($dias)+1;
                $correcto=true;
            }
        }
        if(!$correcto){
            echo "<h2>Dia invalido</h2>";
            echo "<button onclick='window.history.go(-1)'>Volver atras</button>";
        }
    } ?>
    </center>
</body>
</html>