<!-- Realiza un programa que calcule la media de tres scoress. -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ej07</title>
</head>
<body>
    <center>
    <h1>Calcular media</h1>
    <?php 
    if(!isset($_GET["scores"])){
        $NUM_SCORES=3;
        ?>
        <form action="#" method="get">
            <?php
            for ($i=1; $i <= $NUM_SCORES; $i++) { 
                echo "<label>Nota Nº$i: <input type='number' name='scores[$i]' require min=0><br></label>";
            }
            ?>
            <input type="submit" value="Calcular">
        </form>
        <?php
    }else{
        $scores=$_GET["scores"];
        $sqr=0;
        foreach ($scores as $value) {
            $sqr+=$value;
        }
        $sqr/=count($scores);
        echo "El promedio es $sqr";
        echo "<br><button onclick='window.history.go(-1)'>Calcular otra media</button>";

    }

    ?>
    </center>
</body>
</html>