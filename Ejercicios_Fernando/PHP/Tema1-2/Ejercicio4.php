<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
        $media=round(($_REQUEST['t1']+$_REQUEST['t2']+$_REQUEST['t3'])/3,2);
    ?>
    <table border=1 cellspacing=0 cellpadding=2 bordercolor="red">
        <tr><th colspan="4">Precio medio de <?=$_REQUEST['nombre']?></th></tr>
        <tr><th></th><th>Tienda 1</th><th>Tienda 2</th><th>Tienda 3</th></tr>
        <tr>
            <!--<td>Combinación ganadora</td><td>4</td><td>14</td><td>23</td><td>30</td><td>32</td><td>48</td><td>432</td> -->
            <td>Diferencia con la media</td>
            <td><?php echo $_REQUEST['t1']-$media; ?></td>
            <td><?php echo $_REQUEST['t2']-$media; ?></td>
            <td><?php echo $_REQUEST['t3']-$media; ?></td>
        </tr>
        <tr><td>Precio medio</td><td colspan="3"><?=$media?></td></tr>
    </table>
</body>
</html>