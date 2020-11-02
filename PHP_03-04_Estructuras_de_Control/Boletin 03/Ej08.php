<!-- Amplía el programa anterior para que diga la 
nota del boletín (insuficiente, suficiente, bien, notable
o sobresaliente).
 -->
 <!DOCTYPE html>
 <html lang="en">
 <head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Ej08</title>
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
                echo "<label>Nota Nº$i: <input type='number' name='scores[$i]' require min=0 max=10><br></label>";
            }
            ?>
            <input type="submit" value="Calcular">
        </form>
        <?php
    }else{
        $scores=$_GET["scores"];
        $sqr=0;
        $calification;
        foreach ($scores as $value) {
            $sqr+=$value;
        }
        $sqr/=count($scores);
        if($sqr<5){
            $calification="insuficiente";
        }elseif ($sqr<6) {
            $calification="bien";
        
        }elseif ($sqr<9) {
            $calification="notable";
        
        }elseif ($sqr>9) {
            $calification="sobresaleinte";

        }
        echo "El promedio es $sqr, el cual es $calification";
        echo "<br><button onclick='window.history.go(-1)'>Calcular otra media</button>";

    }

    ?>
    </center>
 </body>
 </html>