<!-- Escribe un programa que lea 15 números por teclado y que los almacene
en un array. Rota los elementos de ese array, es decir, el elemento de la
posición 0 debe pasar a la posición 1, el de la 1 a la 2, etc. El número
que se encuentra en la última posición debe pasar a la posición 0. 
Finalmente, muestra el contenido del array.
 -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ej03</title>
</head>
<body>
    <?php 
   if(!isset($_REQUEST["nums"])){
    $cantNums=15;
    echo "<form action='#' method='post'>";
    for ($i=0; $i < $cantNums; $i++) { 
        echo "<label>Numero $i: <input type='number' name='nums[]' required></label>";
        echo "<br>";
    }
    echo "<input type='submit' value='Enviar'>";
    echo "</form>";
   }else{
    $nums=$_REQUEST["nums"];
    echo "<h3>Array sin rotar</h3>";
    foreach ($nums as $value) {
        echo "$value -";
    }
    array_unshift($nums,array_pop($nums));
    echo "<br><br>";
    echo "<h3>Array rotado</h3>";
    foreach ($nums as $value) {
        echo "$value -";
    } 
  }
    ?>
</body>
</html>