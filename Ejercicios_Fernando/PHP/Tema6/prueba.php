<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<h1>Loteria primitiva</h1>
<h3>Genera automaticamente tu combinación ganadora</h3>
<form action="" method="post">
<label for="titulo">Título para tu combinación</label>
<input type="text" id="titulo" name="nombre" size="50"><br>
<?php
for ($i=0; $i < 6; $i++) { ?>   
    <label for="num<?=$i?>"></label>
    <input type="number" id="num<?=$i?>" name="num<?=$i?>" size="2" min="1" max="49">
<?php 
}
function hacer_cafe($tipo, $recipiente="una taza")
{
    echo var_dump($tipo);
    echo var_dump($recipiente);
    return "Hacer $recipiente de $tipo.\n";
}
?>
<label for="serie">Número de serie</label>
<input type="number" id="serie" name="serie" size="3" min="1" max="999"><br>
<input type="submit" value="GENERAR COMBINACIÓN">
</form>
<hr>
<?php 
$num=[5,5,5,5,5,5];
foreach ($num as $key => $value) {
    $num[$key]=2;
}
echo var_dump($num);
?>
</body>
</html>