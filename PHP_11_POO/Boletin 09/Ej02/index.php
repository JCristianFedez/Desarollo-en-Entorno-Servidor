<?php 
include_once "Objetos/Coche.php";
include_once "Objetos/Bicicleta.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vehiculos</title>
</head>
<body>
    <?php 
        $myCoche = new Coche("Peugeot",null);
        echo "<h3>Mi coche</h3>";
        echo "Marca: ".$myCoche->getMarca()."<br>";
        echo "Puertas: ".$myCoche->getPuertas()."<br>";
        echo "Quema rueda: ".$myCoche->quemaRueda()."<br>";
        echo "Kilometros recoridos: ".$myCoche->getKmRecorridos()."<br>";
        echo "Recorre kilometros 15<br>";
        $myCoche->recorre(15);
        echo "Kilometros recorridos: ".$myCoche->getKmRecorridos()."<br>";

        echo "<br><hr><br>";

        $tuCoche = new Coche(null,"3");
        echo "<h3>Tu coche</h3>";
        echo "Marca: ".$tuCoche->getMarca()."<br>";
        echo "Puertas: ".$tuCoche->getPuertas()."<br>";
        echo "Quema rueda: ".$tuCoche->quemaRueda()."<br>";
        echo "Kilometros recoridos: ".$tuCoche->getKmRecorridos()."<br>";
        echo "Recorre kilometros 125<br>";
        $tuCoche->recorre(125);
        echo "Kilometros recorridos: ".$tuCoche->getKmRecorridos()."<br>";

        echo "<br><hr><br>";
        
        $myBici = new Bicicleta("Ober",4);
        echo "<h3>Mi Bici</h3>";
        echo "Marca: ".$myBici->getMarca()."<br>";
        echo "Platos: ".$myBici->getPlatos()."<br>";
        echo "Haz caballito: ".$myBici->hazCaballito()."<br>";
        echo "Kilometros recoridos: ".$myBici->getKmRecorridos()."<br>";
        echo "Recorre kilometros 156<br>";
        $myBici->recorre(156);
        echo "Kilometros recorridos: ".$myBici->getKmRecorridos()."<br>";
        echo "Recorre 4 kilometros mas<br>";
        $myBici->recorre(4);
        echo "Kilometros recorridos: ".$myBici->getKmRecorridos()."<br>";

        echo "<br><hr><br>";

        $tuBici = new Bicicleta("BMX",null);
        echo "<h3>Tu Bici</h3>";
        echo "Marca: ".$tuBici->getMarca()."<br>";
        echo "Platos: ".$tuBici->getPlatos()."<br>";
        echo "Haz caballito: ".$tuBici->hazCaballito()."<br>";
        echo "Kilometros recoridos: ".$tuBici->getKmRecorridos()."<br>";
        echo "Recorre kilometros 6<br>";
        $tuBici->recorre(6);
        echo "Kilometros recorridos: ".$tuBici->getKmRecorridos()."<br>";

        echo "<br><hr><br>";

        echo "KILOMETROS DE TODOS LOS VEHICULOS: ".Vehiculo::getKmTotales()."<br>";
        echo "Cantidad de vehiculos creados: ".Vehiculo::getVehiculosCreados();
    ?>
</body>
</html>