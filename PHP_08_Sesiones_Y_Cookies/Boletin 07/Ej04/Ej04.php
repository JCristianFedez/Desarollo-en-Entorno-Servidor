<!-- Establece un control de acceso mediante nombre de usuario y contraseña para cualquiera de los
programas de la relación anterior. La aplicación no nos dejará continuar hasta que iniciemos sesión
con un nombre de usuario y contraseña correctos. -->
<?php 
if(session_status() == PHP_SESSION_NONE){
    session_start();
}
if(!isset($_SESSION["name"]) && !isset($_SESSION["pass"])){
    $_SESSION["name"]="";
    $_SESSION["pass"]="";
}else{
    if($_SESSION["name"]=="cristian" && $_SESSION["pass"]=="1234"){
        header("Location: sesionIniciada.php");
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ej04</title>
</head>
<body>
    <form action="#" method="post">
    <label for="userName">Nombre de usuario</label>
    <input type="text" name="userName" id="userName" required>
    <br>
    <label for="userPass">Contraseña</label>
    <input type="password" name="userPass" id="userPass" required>
    <br>
    <input type="submit" value="Iniciar sesion">
    </form>
    <?php 
    if(isset($_REQUEST["userName"]) && isset($_REQUEST["userPass"])){
        $userName=$_SESSION["name"]=$_REQUEST["userName"];
        $userPass=$_SESSION["pass"]=$_REQUEST["userPass"];

        if($userName=="cristian" && $userPass=="1234"){
            header("Location: sesionIniciada.php");
        }else{
            echo "<script>alert('Contraseña o usuario incorrecto','');</script>";
        }
    }
    print_r($_SESSION);
    ?>
</body>
</html>