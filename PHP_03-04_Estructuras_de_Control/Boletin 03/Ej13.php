<!-- Escribe un programa que ordene tres números enteros introducidos por teclado.
 -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ej13</title>
</head>
<body>
    <center>
        <?php 
        if((!isset($_GET["n1"]))||(!isset($_GET["n2"]))||(!isset($_GET["n3"]))){
    
            ?>
        <form action="#" method="get">
        <label>Primer Numero: <input type="number" name="n1" require></label>
        <br>
        <label>Segundo Numero: <input type="number" name="n2" require></label>
        <br>
        <label>Tercer Numero: <input type="number" name="n3" require></label>
        <br>
        <input type="submit" value="calcular">
        </form>
            <?php
        }else{
            $n1=$_GET["n1"];
            $n2=$_GET["n2"];
            $n3=$_GET["n3"];
    
            if($n1>$n2 && $n1>$n3){
                $large=$n1;
                if($n2>$n3){
                    $medium=$n2;
                    $small=$n3;
                }else{
                    $medium=$n3;
                    $small=$n2;
                }
            }elseif($n2>$n1 && $n2>$n3){
                $large=$n2;
                if($n1>$n3){
                    $medium=$n1;
                    $small=$n3;
                }else{
                    $medium=$n3;
                    $small=$n1;
                }
            }elseif($n3>$n1 && $n3>$n1){
                $large=$n3;
                if($n2>$n1){
                    $medium=$n2;
                    $small=$n1;
                }else{
                    $medium=$n1;
                    $small=$n2;
                }
            }
    
            echo "Numeros sin ordenar: $n1, $n2, $n3<br>";
            echo "Numeros ordenados descendentemente: $large, $medium, $small<br>";
            echo "Numeros ordenados ascendentemente: $small, $medium, $large<br>";
            echo "<button onclick='window.history.go(-1)'>Ordenar otros numeros</button>";
        }
        ?>
    </center>
</body>
</html>