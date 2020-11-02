<!-- Realiza un programa que diga si un número introducido por teclado es par y/o divisible entre 5.
 -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ej14</title>
</head>
<body>
    <center>
        <?php  
        
        if (!isset($_GET["num"])) {
            ?>
                <form action="#" method="get">
                    <label>Introduce numero: <input type="number" name="num" require></label>
                    <br>
                    <input type="submit" value="Calcular">
                </form>
            <?php
        }else{
            $num=$_GET["num"];
    
            $par="no";
            $div5="no";
    
            if($num%2==0){
                $par="si";
            }
    
            if($num%5==0){
                $div5="si";
            }
    
            echo "$num $par es par y $div5 es divisible entre 5<br>";
            echo "<button onclick='window.history.go(-1)'>Calcular otro numero</button>";
        }
        ?>
    </center>
</body>
</html>