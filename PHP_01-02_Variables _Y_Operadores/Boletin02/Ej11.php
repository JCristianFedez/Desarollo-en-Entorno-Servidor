<!-- Realiza un conversor de Kb a kb.

 -->
 <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ej11</title>
</head>
<body>
<center>
    <h1>kb a Kb</h1>
    <?php
    if(!isset($_GET["kb"])){
        ?>
            <form action="#" method="get">
            <label>Cantidad de KiloBytes: <input type="nukber" name="kb"></label>
        
            <br>
            <input type="submit">
            </form>
        <?php

    }else{

        $kb=$_GET["kb"];
        echo "$kb kb son ".($kb/1024)."mb";
        


    }
    ?>
    </center>
</body>
</html>