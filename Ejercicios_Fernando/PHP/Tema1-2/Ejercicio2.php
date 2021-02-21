<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <table border="1">
        <tr>
            <th></th><th>N1</th><th>N2</th><th>N3</th><th>N4</th><th>N5</th><th>N6</th><th>SERIE</th>
        </tr>
        <tr>
            <!--<td>Combinación ganadora</td><td>4</td><td>14</td><td>23</td><td>30</td><td>32</td><td>48</td><td>432</td> -->
            <td>Combinación ganadora</td>
            <td><?php echo rand(1,49); ?></td>
            <td><?php echo rand(1,49); ?></td>
            <td><?php echo rand(1,49); ?></td>
            <td><?php echo rand(1,49); ?></td>
            <td><?php echo rand(1,49); ?></td>
            <td><?php echo rand(1,49); ?></td>
            <td><?php echo rand(1,999); ?></td>
        </tr>
        <tr><td>Tus números</td>
    <?php
    
    echo "<td>".$_POST['n1']."</td><td>".$_POST['n2']."</td><td>".$_POST['n3']."</td><td>".$_POST['n4'].
    "</td><td>".$_POST['n5']."</td><td>".$_POST['n6']."</td><td>".$_POST['serie']."</td>";
    
    ?>
        </tr>
    </table>
</body>
</html>