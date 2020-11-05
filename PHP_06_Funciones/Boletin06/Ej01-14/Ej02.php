<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>esPrimo</title>
</head>
<body>
    <?php 
    include "misMatematicas.php";
    $miNum=-1;
    if(esPrimo($miNum)){
        echo "$miNum es primo";
    }else{
        echo "$miNum no es primo";
    }
    ?>
</body>
</html>