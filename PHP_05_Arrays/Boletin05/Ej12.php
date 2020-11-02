<!-- Realiza un programa que escoja al azar 5 palabras en español del 
mini-diccionario del ejercicio anterior. El programa pedirá que el usuario
teclee la traducción al inglés de cada una de las palabras y comprobará 
si son correctas. Al final, el programa deberá mostrar cuántas respuestas 
son válidas y cuántas erróneas.  -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
    *{
        font-size:1.025em;
    }
    table,td,th{
        border:1px solid black;
        border-collapse:collapse;
        padding:.5em;
    }
    .acierto{
        color:green;
    }
    .fallo{
        color:red;
    }
    </style>
    <title>Ej12</title>
</head>
<body>
    <?php 
        $diccionario=["mesa"=>"table", "ventana"=>"window",
        "silla"=>"chair", "perro"=>"dog",
        "portatil"=>"laptop","pelota"=>"ball",
        "viento"=>"wind", "dinero"=>"money",
        "casa"=>"house","coche"=>"car"];

    if(!isset($_REQUEST["ingles"])){

                
        foreach ($diccionario as $key => $value) {//Paso as palabras a español
            $wordSpanish[] = $key;
         }
    
        $count=0;
        $spanishTraduction[0]="";//Donde iran las palabras en español a traducir
        do{//Creo array con 5 palabras espanolas
            $palabra=$wordSpanish[rand(0,9)];
            if(!in_array($palabra,$spanishTraduction)){
                $spanishTraduction[$count]=$palabra;
                $count++;
            }
        }while(count($spanishTraduction)<5);

        ?>
        <form action="#" method="post">
            <?php 
                foreach ($spanishTraduction as $value) {
                    echo "<label>$value: <input type='text' name='ingles[]' required></label><br>";
                }
            ?>
            <input type="hidden" name="spanishTraduction" value="<?=implode(",",$spanishTraduction)?>">
            <input type="submit" value="Traducir">
        </form>
        <?php
    }else{
        $ingles=$_REQUEST["ingles"];
        
        $spanishTraduction=explode(",",$_REQUEST["spanishTraduction"]);
        $aciertos=0;
        $errores=0;

        ?>
        <table>
            <thead>
                <tr>
                    <th>Español</th><th>Tu Traduccion</th><th>Traduccion Correcta</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    for ($i=0; $i < count($ingles); $i++) { 
                        if($diccionario[$spanishTraduction[$i]]==$ingles[$i]){
                            $aciertos++;
                            echo "<tr class='acierto'>";
                            echo "<td>$spanishTraduction[$i]</td><td>$ingles[$i]</td><td>".$diccionario[$spanishTraduction[$i]]."</td>";
                        }else{
                            $errores++;
                            echo "<tr class='fallo'>";
                            echo "<td>$spanishTraduction[$i]</td><td>$ingles[$i]</td><td>".$diccionario[$spanishTraduction[$i]]."</td>";
                        }
                        
                        echo "</tr>";
                    }
                ?>
            </tbody>
        </table>
        <?php
        echo "Palabras acertadas: $aciertos";
        echo "<br>";
        echo "Palabras falladas: $errores";
        echo "<br>";
        echo "<button onclick='window.location.href=\"Ej12.php\"'>Nuevas palabras</button>";
    }

     ?>
</body>
</html>