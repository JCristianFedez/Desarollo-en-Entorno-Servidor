<!-- Crear una página principal con un botón 'Añadir color' para generar 
un color aleatorio que además se establecerá como color de fondo de 
la página, cada vez que se pulsa irá generando un color nuevo 
(actualizando el fondo), que se irán almacenando en un array de 
sesión. Habrá un segundo botón 'Mostrar paleta creada' que dirige 
a una segunda página que mostrará una paleta con los colores generados. 
Esta paleta no es más que una tabla con un máximo de 5 celdas por 
cada fila, y en cada celda se muestra un color de los generados. 
Debajo de la tabla tendremos 2 botones uno para volver a la página 
principal y seguir añadiendo colores a la paleta y otro para destruir 
la sesión y generar una paleta nueva. -->
<?php 
if(session_status() == PHP_SESSION_NONE){
    session_start();
}
if(isset($_REQUEST["accion"])){
    switch ($_REQUEST["accion"]) {
        case 'agregarColor':
            $_SESSION["colores"][]=sprintf('#%06X', mt_rand(0, 0xFFFFFF));
        break;
        
        case "borrarSession":
            unset($_SESSION["colores"]);
        break;
    }
    header('Location: Ej01.php');
}

if(isset($_SESSION["colores"])){
    $cantColor=count($_SESSION["colores"]);
    if(isset($_REQUEST["bodyColor"])){
        $bodyColor=$_SESSION["colores"][$_REQUEST["bodyColor"]];
    }else{
        $bodyColor=end($_SESSION["colores"]);
    }
    
}else{
    $cantColor=0;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
    <?php   
    if(isset($_SESSION["colores"]) || isset($_REQUEST["bodyColor"])){
        echo "body{
            background-color: $bodyColor;
        }";
    }
    ?>
    </style>
    <title>Ej01</title>
</head>
<body>
    <p>Cantidad de Colores :<?=$cantColor?></p>
    <form action="#" method="post">
    <button type="submit" name="accion" id="agregarColor" value="agregarColor">Añadir nuevo color</button> 
    </form>
    <button onclick="window.location.replace('subSites/muestraPaleta.php');">Muestra Paleta</button>
    <!-- <?php 
    print_r($_SESSION["colores"]);
    print_r($_REQUEST["bodyColor"]);
    ?> -->
</body>
</html>