<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ej15</title>
</head>
<body>
    <center>
        <?php 
        if((!isset($_GET["r1"]))||(!isset($_GET["r2"]))||(!isset($_GET["r3"]))||(!isset($_GET["r4"]))||(!isset($_GET["r5"]))||(!isset($_GET["r6"]))||(!isset($_GET["r7"]))||(!isset($_GET["r8"]))||(!isset($_GET["r9"]))||(!isset($_GET["r10"]))){
            ?>
            <form action="#" method="get">
              <ol>
                <li>
                  Tu pareja parece estar mas inquieta de lo normal sin ningun motivo
                  aparente<br>
                  <input type="radio" name="r1" value="3">verdadero<br>
                  <input type="radio" name="r1" value="0">falso<br>
                </li>
                
                <li>
                  Ha aumentado sus gastos de vestuario<br>
                  <input type="radio" name="r2" value="3">verdadero<br>
                  <input type="radio" name="r2" value="0">falso<br>
                </li>
                
                <li>
                  Ha perdido el interes que mostraba anteriormente por ti<br>
                  <input type="radio" name="r3" value="3">verdadero<br>
                  <input type="radio" name="r3" value="0">falso<br>
                </li>
                
                <li>
                  Ahora se afeita y se asea con más frecuencia (si es hombre) o ahora se
                  arregla el pelo y se asea con más frecuencia (si es mujer)<br>
                  <input type="radio" name="r4" value="3">verdadero<br>
                  <input type="radio" name="r4" value="0">falso<br>
                </li>
                
                <li>
                  No te deja que mires la agenda de su telefono movil<br>
                  <input type="radio" name="r5" value="3">verdadero<br>
                  <input type="radio" name="r5" value="0">falso<br>
                </li>
                
                <li>
                  A veces tiene llamadas que dice no querer contestar cuando estas
                  tu delante<br>
                  <input type="radio" name="r6" value="3">verdadero<br>
                  <input type="radio" name="r6" value="0">falso<br>
                </li>
                
                <li>
                  Ultimamente se preocupa mas en cuidar la linea y/o estar bronceado/a.<br>
                  <input type="radio" name="r7" value="3">verdadero<br>
                  <input type="radio" name="r7" value="0">falso<br>
                </li>
                
                <li>
                  Muchos dias viene tarde despues de trabajar porque dice tener mucho
                  mas trabajo<br>
                  <input type="radio" name="r8" value="3">verdadero<br>
                  <input type="radio" name="r8" value="0">falso<br>
                </li>
                
                <li>
                  Has notado que ultimamente se perfuma mas<br>
                  <input type="radio" name="r9" value="3">verdadero<br>
                  <input type="radio" name="r9" value="0">falso<br>
                </li>
                
                <li>
                  Se confunde y te dice que ha estado en sitios donde no ha ido contigo<br>
                  <input type="radio" name="r10" value="3">verdadero<br>
                  <input type="radio" name="r10" value="0">falso<br>
                </li>
              </ol>   
              <input type="submit" value="Comprobar">
            </form>
    
            <?php
    
    
        }else{
    
            $puntos=$_GET["r1"]+$_GET["r2"]+$_GET["r3"]+$_GET["r4"]+$_GET["r5"]+$_GET["r6"]+$_GET["r7"]+$_GET["r8"]+$_GET["r9"]+$_GET["r10"];
            if ( $puntos <= 10 ) {
                echo "¡Enhorabuena! tu pareja parece ser totalmente fiel.";
              }
    
              if ( ($puntos > 11 ) && ($puntos <= 22) ) {
                echo "Quizás exista el peligro de otra persona en su vida o en su mente,";
                echo "aunque seguramente será algo sin importancia. No bajes la guardia.";
              }
    
              if ( $puntos >= 22 ) {
                echo "Tu pareja tiene todos los ingredientes para estar viviendo un ";
                echo "romance con otra persona. Te aconsejamos que indagues un poco más ";
                echo "y averigües qué es lo que está pasando por su cabeza.";
              }
              echo"<br><button onclick='window.history.go(-1)'>Realizarlo de nuevo</button>";
        }
        ?>
    </center>
</body>
</html>