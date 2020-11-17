<!-- Pedir un string al usuario e imprimir todos los números 
seguidos y sin espacios, correspondientes al código ascii de
 cada uno de sus caracteres. Posteriormente calcular la
frase original a partir de dichos números (usar un array). -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        table,td,th{
            border:1px solid black;
            padding:.5em;
        }
        table{
            border-collapse:collapse;
        }
        th{
            text-align:center;
        }
    </style>
    <title>Ej08</title>
</head>
<body>
<form action="#" method="post">
    <label for="myStr">Introduce frase</label>
    <input type="text" name="myStr" id="myStr" required>
    <br>
    <input type="submit" value="Modificar">
</form>
    <?php
        if(isset($_REQUEST["myStr"])){
        $myStr=$_REQUEST["myStr"];
        echo "String: $myStr";
        $arrayStr=explode(" ",trim($myStr));

        for ($i=0; $i < count($arrayStr); $i++) { //Pasar a ASCII
            for ($j=0; $j < strlen($arrayStr[$i]); $j++) { 
                $arrayChar[$i][$j]=ord($arrayStr[$i][$j]);
            }
        }
        for ($i=0; $i < count($arrayChar); $i++) { //Pasar a String
            $arrayPasado[$i]="";
            for ($j=0; $j < count($arrayChar[$i]); $j++) { 
                $arrayPasado[$i].=chr($arrayChar[$i][$j]);
            }
        }
        ?>
            <table>
                <thead>
                    <th>Palabra</th>
                    <th>ASCII</th>
                </thead>
                <tbody>
                    <?php 
                    for ($i=0; $i < count($arrayPasado); $i++) { 
                        echo "<tr>";
                        echo "<td>".$arrayPasado[$i]."</td>";
                        echo "<td>";
                        for ($j=0; $j < count($arrayChar[$i]); $j++) { 
                            echo $arrayChar[$i][$j];
                        }
                        echo "</td>";
                        echo "</tr>";
                    }
                    ?>
                </tbody>
            </table>
        <?php
    }
    ?>
</body>
</html>