<!-- Diseñar un desarrollo web simple con PHP que dé respuesta a la necesidad que se plantea a
continuación:
Un operario de una fábrica recibe cada cierto tiempo un depósito cilíndrico de dimensiones
variables, que debe llenar de aceite a través de una toma con cierto caudal disponible. Se
desea crear una aplicación web que le indique cuánto tiempo transcurrirá hasta el llenado del
depósito. Para calcular dicho tiempo el usuario introducirá los siguientes datos: diámetro y
altura del cilindro y caudal de aceite (litros por minuto). Una vez introducidos se mostrará el
tiempo total en horas y minutos que se tardará en llenar el cilindro.  -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Ej05</title>
</head>
<body>
        <div class="container">
            <?php
            if ((!isset($_GET["diametro"])&&(!isset($_GET["altura"]))&&(!isset($_GET["litrosMinuto"])))) {
                ?>
                <div id="formulario">
                    <form action="#" method="get">
                        <h2>Calcular tiempo que tarda en llenarse el cilindro</h2>
    
                        <fieldset>
                        <h4>Diametro en Metros: </h4><input placeholder="Diametro en metros" type="number" name="diametro" tabindex="1" required autofocus>
                        </fieldset>
    
                        <fieldset>
                        <h4>Altura en Metros: </h4><input placeholder="Altura en metros" type="number" name="altura" tabindex="2" required>
                        </fieldset>
    
                        <fieldset>
                        <h4>Litros por Minuto: </h4><input placeholder="Litros por minuto" type="number" name="litrosMinuto" tabindex="3" required>
                        </fieldset>
    
                        <fieldset>
                            <input type="submit" value="Calcular">
                        </fieldset>
                    </form>
                </div>

                <?php
            } else {
                $altura=$_GET["altura"];
                $diametro=$_GET["diametro"];
                $litrosMinuto=$_GET["litrosMinuto"];
                $radio=$diametro/2;
                $volumen=pi()*pow($radio, 2)*$altura;
                $capacidadLitros=$volumen*1000;
                $segundosNecesarios=round((($capacidadLitros/$litrosMinuto)*60));
                $minutosNecesarios=0;
                $horasNecesarias=0;
                while($segundosNecesarios>=60){
                    if($segundosNecesarios>=3600){
                        $horasNecesarias++;
                        $segundosNecesarios-=3600;
                    }else{
                        $minutosNecesarios++;
                        $segundosNecesarios-=60;
                    }
                }
                ?>
                <div id="respuesta">
                    <h3>Diametro: <?php echo "$diametro Metros"; ?></h3>
                    <h3>Altura: <?php echo "$altura Metros"; ?></h3>
                    <h3>Litros por Minuto: <?php echo "$litrosMinuto"; ?></h3>
                    <h3>Tiempo necesario : <?php echo "$horasNecesarias:$minutosNecesarios:$segundosNecesarios"; ?></h3>
                </div>
            <?php
            } ?>
        </div>
</body>
</html>