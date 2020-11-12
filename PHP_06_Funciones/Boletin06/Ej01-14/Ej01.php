<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EsCapicua</title>
</head>
<body>
    <?php 
    include "misMatematicas.php";
    if(!isset($_REQUEST["miNum"])){
        $miNum=0;
    }
    ?>
    <?php
    $miNum=1221;
    if(esCapicua($miNum)){
        echo "$miNum es capicua";
    }else{
        echo "$miNum no capicua";
    }
    ?>
</body>
</html>