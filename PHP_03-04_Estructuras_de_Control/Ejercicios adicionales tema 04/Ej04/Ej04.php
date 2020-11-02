<!-- Realiza el ejercicio 2 del tema anterior correspondiente al juego de la primitiva, pero usando
estructuras repetitivas para simplificar el código. -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ej02</title>
    <style>
        table,td{
        border:solid 1px black;
        border-collapse:collapse;
    }

    td{
        padding:10px;
    }
    </style>
</head>
<body>
    <center>
    <?php 
    if(!isset($_GET["check"])){
        ?>
        <form action="#" method="get">
            <input type="hidden" name="check">
            <table>
                <?php 
                    $cont=1;
                    for ($i=0; $i < 7 ; $i++) { 
                        echo "<tr>";
                        for ($j=0; $j < 7; $j++) { 
                            echo "<td><input type='checkbox' name='n$cont'>$cont</td>";
                            $cont++;
                        }
                        echo "</tr>";
                    }
                ?>
            </table>
            <br>
            Serie:<input type="number" name="nserie" min="1" max="999" required placeholder="[1-999]">
            <br>
            <input type="submit" value="Apostar">
        </form>
        <?php
    }else{
        $aciertos=0;
        $nserie=$_GET["nserie"];
        $dineroSerie=($nserie==rand(1,999)) ? 500 : 0;
        for ($i=0; $i < 6; $i++) { 
            $aciertos += (isset($_GET["n".rand(1,49)])) ? 1 : 0 ;
        }


        switch($aciertos){
            case 4:
                $dinero="dinero devuelto";
                break;
            case 5:
                $dinero=30;
                break;
            case 6:
                $dinero=100;
                break;
            default:
                $dinero=0;
        }
        
        echo "Has acertado $aciertos por lo que te has llevado $dinero ";
        if($dineroSerie==500){
            echo "y ademas $dineroSerie extra por acertar la serie";
        }else{
            echo "y no has acertado la serie";
        }
        echo "<br><br><button onclick='window.history.go(-1)'>Apostar de nuevo</button>";
    }
    
    ?>
    </center>
</body>
</html>