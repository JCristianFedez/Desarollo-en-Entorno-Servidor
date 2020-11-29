<!-- Crear una página que simula una encuesta. Se realizará una pregunta, 
con dos botones para responder, cada vez que se pulse un botón se irán 
contabilizando (usa sesiones) los votos y actualizando una barra que 
muestre el número de votos de cada respuesta. Este resultado se irá 
almacenando también en una cookie, de manera que si se cierra el 
navegador, al abrir la página de nuevo se mostrarán los resultados 
hasta el momento en que se cerró. Crear la cookie para 3 meses. -->
<?php 
if(session_status() == PHP_SESSION_NONE){
    session_start();
}
if(isset($_COOKIE["votos"]) && !isset($_SESSION["votos"])){
    //Cargo las cookies
    $_SESSION["votos"]=unserialize(base64_decode($_COOKIE["votos"]));
}
//Estructura votos: = $_SESSION["votos"]=["yes" => 0, "no" => 0];

if(isset($_REQUEST["accion"])){
    switch ($_REQUEST["accion"]) {
        case 'yes':
            $_SESSION["votos"]["yes"]++;
            setcookie("votos",base64_encode(serialize($_SESSION["votos"])),time() + 90*24*3600);
            break;

        case 'no':
            $_SESSION["votos"]["no"]++;
            setcookie("votos",base64_encode(serialize($_SESSION["votos"])),time() + 90*24*3600);
            break;

        case 'delete':
            setcookie("votos",NULL,-1);
            unset($_SESSION["votos"]);
            header("Refresh:0");
            break;
    }
    header('Location: #');

}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css">
    <title>Ej02</title>
</head>

<body>
    <h1>Cres que el covid terminara en 2021</h1>
    <div class="yes">
        <h1>Si</h1>
        <?php 
        if(isset($_SESSION["votos"]["yes"])){
            for ($i=0; $i < $_SESSION["votos"]["yes"]; $i++) { 
                echo "<i class='fas fa-check-circle'></i>";
            }
        }
        ?>
    </div>
    <div class="no">
        <h1>No</h1>
        <?php 
        if(isset($_SESSION["votos"]["no"])){
            for ($i=0; $i < $_SESSION["votos"]["no"]; $i++) { 
                echo "<i class='fas fa-times-circle'></i>";
            }
        }
        ?>
    </div>
    <br>
    <hr>
    <form action="#" method="post">
    <button type="submit" name="accion" value="yes">Si</button>
    <br>
    <button type="submit" name="accion" value="no">No</button>
    <br>
    <button type="submit" name="accion" value="delete">Reiniciar</button>
    </form>
    <?php 
    print_r($_SESSION["votos"]);
    echo "<br>";
    print_r(unserialize(base64_decode($_COOKIE["votos"]))); ?>
</body>

</html>