<!-- Verificar si en una frase se encuentra una determinada 
palabra pedida al usuario.  -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ej07</title>
</head>
<body>
<form action="#" method="post">
    <label for="myStr">Introduce frase</label>
    <input type="text" name="myStr" id="myStr" required>
    <br>
    <label for="myWord">Introduce Palabra a buscar</label>
    <input type="text" name="myWord" id="myWord" required>
    <br>
    <input type="submit" value="Modificar">
</form>
    <?php
        if(isset($_REQUEST["myStr"]) && isset($_REQUEST["myWord"])){
        $myStr=$_REQUEST["myStr"];
        $myWord=$_REQUEST["myWord"];
        $pos=stripos($myStr,$myWord);
        if($pos !== false){
            echo "La palabra $myWord se encuentra en la frase, en la linea $pos";
        }else{
            echo "La palabra $myWord no se encuentra en la frase";
        }
    }
    ?>
</body>
</html>