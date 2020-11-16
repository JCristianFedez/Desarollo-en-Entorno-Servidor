<!-- Cambiar todas las vocales de la frase “Tengo una 
hormiguita en la patita, que me esta haciendo cosquillitas y
no me puedo aguantar” por otra vocal pedida al usuario. 
 -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ej02</title>
</head>
<body>
<form action="#" method="post">
    <label for="myVocal">Vocal por sustituir</label>
    <input type="text" name="myVocal" id="myVocal" required>
    <br>
    <input type="submit" value="Modificar">
</form>
<p>Tengo una hormiguita en la patita, que me esta haciendo cosquillitas y no me puedo aguantar</p>
    <?php
    $myStr= "Tengo una hormiguita en la patita, que me esta haciendo cosquillitas y no me puedo aguantar";
    if(isset($_REQUEST["myVocal"])){
        $myVocal=$_REQUEST["myVocal"];
        $myStrMod=str_replace(["a","e,","i","o","u"],$myVocal,strtolower($myStr));
        echo $myStrMod;
    }
    ?>
</body>
</html>