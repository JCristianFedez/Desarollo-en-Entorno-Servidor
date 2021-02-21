<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>
<?php 
echo "fecha de hoy es ".date("d-m-Y")."<br>";
if (!isset($_SESSION['mascotas'])) {
   $_SESSION['mascotas'] = [];
}
if (isset($_POST['fecha'])) {
    unset($_SESSION['mascotas']);
    /*$fecha="#".substr($_POST['fecha'],8,2)."-".substr($_POST['fecha'],5,2)."-".substr($_POST['fecha'],0,4)."#";*/
    $fecha="#".$_POST['fecha']."#";
    $file= fopen("mascotas.txt","r");
    //Recorremos hasta encontrar la fecha o fin del fichero
    do{
        $linea=trim(fgets($file));
    }while($linea!=$fecha && !feof($file));
    //Recorremos hasta siguiente fecha o fin del fichero
    do{
        $linea=fgets($file);
        if (substr($linea, 0, 1)!="#" && $linea!="") {
            $pet=explode('-', $linea);
            $_SESSION['mascotas'][$pet[0]]=[$pet[1],$pet[2]];
        }
    }while(substr($linea, 0, 1)!="#" && !feof($file));
    echo '<table border = "1">';
    echo '<tr><th colspan="4">FECHA: '.$fecha.'</th></tr>';
    echo '<tr><th>Nombre</th><th>Animal</th><th>Edad</th></tr>';
    if (isset($_SESSION['mascotas'])) {
    foreach ($_SESSION['mascotas'] as $nombre => $mascota) {
        echo "<tr><td>$nombre</td><td>$mascota[0]</td><td>$mascota[1]</td></tr>";
    }
    }
    echo "</table>";
    fclose($file);
}
$file= fopen("mascotas.txt","r");
$fechas=[];
$linea=trim(fgets($file));
//echo "<br>".$linea;
while(!feof($file)) {
    if (substr($linea,0,1)=="#") {
        $fechas[]=substr($linea,1,-1);
    }
    $linea=trim(fgets($file));
    //echo "<br>".$linea;
}
fclose($file);
?>
<br><br>
<form action="#" method="post">
    fecha inscripción mascotas:
    <select name="fecha">
<?php 
    foreach ($fechas as $fecha) {
        echo "<option value=$fecha>$fecha</option>";
    }
 ?>            
    </select>
    <input type="submit" value="Cargar MASCOTAS">
</form>
</body>
</html>