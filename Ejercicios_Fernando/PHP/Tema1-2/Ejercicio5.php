<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
        $radio=$_REQUEST['diametro']/2;
        $area=round(M_PI * pow($radio,2),3); 
        $volumen=$area*$_REQUEST['altura'];
        $litros=$volumen*1000;
        $minutos=$litros/$_REQUEST['caudal'];
        //echo $minutos."<br>";
        $horas=intval($minutos/60);
        $minutos=$minutos%60;
    ?>
    <h1>Tiempo de llenado de un cilindro</h1>
    <p>El cilindro tiene una base de <?= $area ?>  m2</p>
    <p>Su volumen es de <?=$volumen ?> m3 con una capacidad de <?= $litros ?> litros</p>
    <p>Y tardaría en llenarse <?= $horas ?> horas y <?= $minutos ?>  minutos</p>
    <img src="https://www.caracteristicass.de/wp-content/uploads/2018/06/caracteristicas-del-cilindro.jpg" alt="imagen de un cilindro">
</body>
</html>