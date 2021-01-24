<?php 

include_once "objetos/Menu.php"; 

if(session_status() == PHP_SESSION_NONE){
    session_start();
}
if(!isset($_SESSION["vistaEj02"]) || !isset($_REQUEST["vista"])){
    $_SESSION["vistaEj02"]="Vertical";
}else{
    $_SESSION["vistaEj02"]=$_REQUEST["vista"];
}

if(!isset($_SESSION["menuEj02"])){
    $_SESSION["menuEj02"] = serialize([
        new Menu("Google","www.google.com"),
        new Menu("Twitter","twitter.com")
    ]);
}

$menus = unserialize($_SESSION["menuEj02"]);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>menu</title>
</head>
<body>
    <?php 
    $aux = 0;
    foreach($menus as $menu){
        echo "<h3>Menu $aux</h3>";
        if($_SESSION["vistaEj02"]=="horizontal"){
            echo "<p>".$menu->verHorizontal()."</p>";
        }else{
            echo "<p>".$menu->verVertical()."</p>";
        }
        echo "<hr></hr>";
        $aux++;
    } 
    ?>
    <form action="utils/actions/mod.php" method="post">
    <fieldset>
        <legend>Añadir al menu</legend>
        <input type="number" name="idMenu" id="idMenu" min="0" max="<?=count($menus)-1?>" equired placeholder="Menu">
        <br>
        <input type="text" name="titulo" id="titulo" required placeholder="Titulo">
        <br>
        <input type="text" name="enlace" id="enlace" required placeholder="Enlace">
        <br>
        <input type="submit" value="Añadir">
    </fieldset>
    </form>
    <form action="utils/actions/reset.php" method="post">
        <input type="submit" value="Resetear menus">
    </form>
    <form action="#" method="post">
    <button type="submit" name="vista" value="horizontal">Ver Horizontal</button>
    <button type="submit" name="vista" value="vertical">Ver Vertical</button>
    </form>
</body>
</html>
