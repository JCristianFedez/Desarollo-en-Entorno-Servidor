<!-- Realiza un programa que pida 8 números enteros y que luego muestre
esos números de colores, los pares de un color y los impares de otro. -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>

    .par{
        color:blue;
    }

    .impar{
        color:red;
    }
    </style>
    <title>Ej06</title>
</head>
<body>
    <?php 
    if(!isset($_REQUEST["nums"])){
        $cantNums=8;
        echo "<form action='#' method='post'>";
            for ($i=0; $i < $cantNums; $i++) { 
                echo "<label>Numero $i: <input type='number' name='nums[]' required></label>";
                echo "<br>";
            }
            echo "<input type='submit' value='Enviar'>";
        echo "</form>";
    }else{
        $nums=$_REQUEST["nums"];
        foreach ($nums as $value) {
            $clase=($value%2==0)?"par":"impar";
            echo "<span class='$clase'>$value</span>-";
            
        }
    }
    ?>
</body>
</html>