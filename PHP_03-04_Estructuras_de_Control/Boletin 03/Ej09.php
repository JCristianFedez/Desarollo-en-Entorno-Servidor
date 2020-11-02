<!-- Realiza un programa que resuelva una ecuación de 
segundo grado (del tipo ax2 + bx + c = 0). -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ej09</title>
</head>
<body>
    <center>
    <h1>Solucion ecuacion segundo grado: ax^2 + bx + c = 0</h1>
    <?php 
    if((!isset($_GET["a"]))||(!isset($_GET["b"]))||(!isset($_GET["c"]))){

        ?>
        <form action="#" method="get">
            <label>A=<input type="number" name="a" require></label>
            <br>
            <label>B=<input type="number" name="b" require></label>
            <br>
            <label>C=<input type="number" name="c" require></label>
            <br>
            <input type="submit" value="Calcular">
        </form>

        <?php

    }else{
        $a=$_GET["a"];
        $b=$_GET["b"];
        $c=$_GET["c"];

                  // 0x^2 + 0x + 0 = 0

                  if (($a == 0) && ($b == 0) && ($c == 0)) {
                    echo  "La ecuación tiene infinitas soluciones.";
                  }
        
                  
                  // 0x^2 + 0x + c = 0  con c distinto de 0
        
                  if (($a == 0) && ($b == 0) && ($c != 0)) {
                    echo  "La ecuación no tiene ninguna solucion.";
                  }
        
                  
                  // ax^2 + bx + 0 = 0  con a y b distintos de 0
        
                  if (($a != 0) && ($b != 0) && ($c == 0)) {
                    echo  "x<sub>1</sub> = 0";
                    echo  "<br>x<sub>2</sub> = ", (-$b / $a);
                  }
        
        
                  // 0x^2 + bx + c = 0  con b y c distintos de 0
        
                  if (($a == 0) && ($b != 0) && ($c != 0)) {
                          echo  "x<sub>1</sub> = x<sub>2</sub> = ", (-$c / $b);
                  }
        
                  
                  // ax^2 + bx + c = 0  con a, b y c distintos de 0
        
                  if (($a != 0) && ($b != 0) && ($c != 0)) {
                      $discriminante = ($b * $b) - (4 * $a * $c);
        
                      if ($discriminante < 0) {
                          echo  "La ecuacion no tiene soluciones reales";
                      } else {
                          echo  "x<sub>1</sub> = ", (-$b + sqrt($discriminante)) / (2 * $a);
                          echo  "<br>x<sub>2</sub> = ", (-$b - sqrt($discriminante)) / (2 * $a);
                      }
                  }
                  echo "<br><button onclick='window.history.go(-1)'>Calcular otra ecuacion</button>";
    }
    
    ?>
    
    </center>
</body>
</html>