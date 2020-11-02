<!-- Escribe un programa que lea un número N e imprima una pirámide de 
números con N filas como en la siguiente figura. Recuerda utilizar un tipo
de letra de ancho fijo como por ejemplo Courier para que los espacios 
tengan la misma anchura que los números. 1 -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
    *{
        font-family:Courier;
    }
    </style>
    <title>Ej24</title>
</head>
<body>
    <h3>Piramide numerica</h3>
    <?php 
    if(!isset($_REQUEST["num"])){
        ?>
            <form action="#" method="post">
                <label>Altura de la piramide: <input type="number" name="num" min=1 require></label>
                <br>
                <input type="submit" value="Generar piramide">
            </form>
        <?php
    }else{
        $num=$_REQUEST["num"];
        for ($i=1; $i <= $num; $i++) { 
            for ($spa=1; $spa <= $num-$i; $spa++) { 
                echo "&nbsp";
            }
            if($i==1){
                echo "$i";
            }else{
                for ($left=1; $left <= $i; $left++) { //Parte Izquierda
                    echo "$left";
                }
                for ($right=($i-1); $right >= 1; $right--) { //Parte Izquierda
                    echo "$right";
                }
            }
            echo "<br>";
        }
        echo "<button onclick='window.location.href=\"Ej24.php\";'>Nueva piramide</button>";
    }
    ?>
</body>
</html>