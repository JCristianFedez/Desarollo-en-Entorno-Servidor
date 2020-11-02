<!-- 
    EJERCICIO ANTERIOR:
    Diseñar una web para jugar a la lotería primitiva. En un formulario se pedirá introducir la
combinación de 6 números entre 1 y 49 y el numero de serie entre 1 y 999. Mostrar la
combinación generada y la introducida por el usuario en dos filas de una tabla, para que
compruebe los aciertos. 

    
    Mejora el ejercicio de la lotería primitiva del tema anterior. Ahora los números se seleccionan
de un boleto al estilo “bingo” con filas y columnas, para representar los números
seleccionados se usarán checkbox, y para el número de serie una caja de texto. Cuando se
pulse el botón jugar, se mostrará la combinación ganadora generada aleatoriamente y los
aciertos que ha tenido. No se usarán estructuras repetitivas ni arrays, se mostrará la
combinación ganadora en una tabla con una sola fila y un número en cada columna.
Se mostrará el número de aciertos que ha tenido el usuario y cuánto dinero ha ganado:
-menos de 4 aciertos: nada
-4 aciertos: dinero vuelto
-5 aciertos: 30 euros
-6 aciertos: 100 euros
-número de serie: Si se acierta se sumarán 500 euros independientemente del número de
aciertos.
Nota: no hace falta comprobar todos los números, solo los de la combinación ganadora, por lo
que no se controla si el usuario selecciona más de 6 números.
-->

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
                <tr>
                    <td><input type="checkbox" name="n1" id="">1</td>
                    <td><input type="checkbox" name="n2" id="">2</td>
                    <td><input type="checkbox" name="n3" id="">3</td>
                    <td><input type="checkbox" name="n4" id="">4</td>
                    <td><input type="checkbox" name="n5" id="">5</td>
                    <td><input type="checkbox" name="n6" id="">6</td>
                    <td><input type="checkbox" name="n7" id="">7</td>
                </tr>
                <tr>
                    <td><input type="checkbox" name="n8" id="">8</td>
                    <td><input type="checkbox" name="n9" id="">9</td>
                    <td><input type="checkbox" name="n10" id="">10</td>
                    <td><input type="checkbox" name="n11" id="">11</td>
                    <td><input type="checkbox" name="n12" id="">12</td>
                    <td><input type="checkbox" name="n13" id="">13</td>
                    <td><input type="checkbox" name="n14" id="">14</td>
                </tr>
                <tr>
                    <td><input type="checkbox" name="n15" id="">15</td>
                    <td><input type="checkbox" name="n16" id="">16</td>
                    <td><input type="checkbox" name="n17" id="">17</td>
                    <td><input type="checkbox" name="n18" id="">18</td>
                    <td><input type="checkbox" name="n19" id="">19</td>
                    <td><input type="checkbox" name="n20" id="">20</td>
                    <td><input type="checkbox" name="n21" id="">21</td>
                </tr>
                <tr>
                    <td><input type="checkbox" name="n22" id="">22</td>
                    <td><input type="checkbox" name="n23" id="">23</td>
                    <td><input type="checkbox" name="n24" id="">24</td>
                    <td><input type="checkbox" name="n25" id="">25</td>
                    <td><input type="checkbox" name="n26" id="">26</td>
                    <td><input type="checkbox" name="n27" id="">27</td>
                    <td><input type="checkbox" name="n28" id="">28</td>
                </tr>
                <tr>
                    <td><input type="checkbox" name="n29" id="">29</td>
                    <td><input type="checkbox" name="n30" id="">30</td>
                    <td><input type="checkbox" name="n31" id="">31</td>
                    <td><input type="checkbox" name="n32" id="">32</td>
                    <td><input type="checkbox" name="n33" id="">33</td>
                    <td><input type="checkbox" name="n34" id="">34</td>
                    <td><input type="checkbox" name="n35" id="">35</td>
                </tr>
                <tr>
                    <td><input type="checkbox" name="n36" id="">36</td>
                    <td><input type="checkbox" name="n37" id="">37</td>
                    <td><input type="checkbox" name="n38" id="">38</td>
                    <td><input type="checkbox" name="n39" id="">39</td>
                    <td><input type="checkbox" name="n40" id="">40</td>
                    <td><input type="checkbox" name="n41" id="">41</td>
                    <td><input type="checkbox" name="n42" id="">42</td>
                </tr>
                <tr>
                    <td><input type="checkbox" name="n43" id="">43</td>
                    <td><input type="checkbox" name="n44" id="">44</td>
                    <td><input type="checkbox" name="n45" id="">45</td>
                    <td><input type="checkbox" name="n46" id="">46</td>
                    <td><input type="checkbox" name="n47" id="">47</td>
                    <td><input type="checkbox" name="n48" id="">48</td>
                    <td><input type="checkbox" name="n49" id="">49</td>
                </tr>
            </table>
            <br>
            <input type="number" name="nserie" min="1" max="999" required>
            <br>
            <input type="submit" value="Apostar">
        </form>
        <?php
    }else{
        $aciertos=0;
        $nserie=$_GET["nserie"];
        $dineroSerie=($nserie==rand(1,999)) ? 500 : 0;
        $aciertos += (isset($_GET["n".rand(1,49)])) ? 1 : 0 ;
        $aciertos += (isset($_GET["n".rand(1,49)])) ? 1 : 0 ;
        $aciertos += (isset($_GET["n".rand(1,49)])) ? 1 : 0 ;
        $aciertos += (isset($_GET["n".rand(1,49)])) ? 1 : 0 ;
        $aciertos += (isset($_GET["n".rand(1,49)])) ? 1 : 0 ;
        $aciertos += (isset($_GET["n".rand(1,49)])) ? 1 : 0 ;

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