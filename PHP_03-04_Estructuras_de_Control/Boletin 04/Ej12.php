<!-- Escribe un programa que muestre los n primeros términos de la serie
de Fibonacci. El primer término de la serie de Fibonacci es 0, el 
segundo es 1 y el resto se calcula sumando los dos anteriores, por lo
que tendríamos que los términos son 0, 1, 1, 2, 3, 5, 8, 13, 21, 34, 55,
89, 144… El número n se debe introducir por teclado.
 -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ej12</title>
</head>
<body>
    <h3>Fibonacci</h3>
    <?php 
        if(!isset($_REQUEST["num"])){
            ?>
            <form action="#" method="post">
            <label>Introduce un Numero:<input type="number" name="num" required min=0></label>
            <br>
            <input type="submit" value="Calcular">
        </form>
            <?php
        }else{
            $num=$_REQUEST["num"];
            $fibonacci=1;
            $fibonacciOld=1;
            $fibonacciOldV2=0;
            echo "Ahora se mostraran los siguientes $num primeros numeros Fibonacci<br>";
            if($num==1){
                echo "0";
            }elseif($num>1){
                echo "0,1,";
                for ($i=2; $i < $num; $i++) { 
                    echo "$fibonacci,";
                    $fibonacciOldV2=$fibonacci;
                    $fibonacci+=$fibonacciOld;
                    $fibonacciOld=$fibonacciOldV2;
                }
            }


            echo "<br><button onclick='window.history.go(-1);'>Mas Fibonacci</button>";
        }
    ?>
</body>
</html>