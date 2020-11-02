<!-- Realiza un programa que sume los 100 números siguientes a un número 
entero y positivo introducido por teclado. Se debe comprobar que el 
dato introducido es correcto (que es un número positivo).
 -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ej17</title>
</head>
<body>
    <h3>Sumar los 100 siguientes numeros</h3>
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
        $numAux=$num;
        $sum=0;
        for ($i=0; $i < 100; $i++) { 
            $numAux++;
            $sum+=$numAux;
        }
        echo "La suma de los siguientes 100 numeros a $num es $sum";
        echo "<br><button onclick='window.location.href=\"Ej17.php\"'>Nuevo numero</button>";
    }
    ?>
</body>
</html>