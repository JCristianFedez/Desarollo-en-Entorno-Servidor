<!-- Realiza un conversor de Mb a Kb.

 -->
 <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ej10</title>
</head>
<body>
<center>
    <h1>Mb a Kb</h1>
    <?php
    if(!isset($_GET["mb"])){
        ?>
            <form action="#" method="get">
            <label>Cantidad de MegaBytes: <input type="number" name="mb"></label>
        
            <br>
            <input type="submit">
            </form>
        <?php

    }else{

        $mb=$_GET["mb"];
        echo "$mb Mb son ".($mb*1024)."Kb";
        


    }
    ?>
    </center>
</body>
</html>