<!-- Disponemos de 2 tarjetas de coordenadas para controlar el acceso a una web. Cada tarjeta
corresponde a un perfil de usuario ‘admin’ o ‘estandar’, cada número número registrado en la
tarjeta se identifica por su fila (de la 1 a la 5) y su columna (de la A a la E). Los valores
registrados en cada tarjeta son fijos y os lo podéis inventar.
Crea una página principal que sirva de control de acceso a una segunda página. Se pedirá el
perfil de usuario (admin o estándar) y una clave aleatoria correspondiente a la tarjeta de
coordenadas de su perfil (fila y columna), se comprobará si es correcto usando 2 funciones:
dameTarjeta() a la que se le pasa el perfil y devuelve una matriz correspondiente a la tarjeta
de coordenadas de ese perfil, y compruebaClave() a la que se le pasa la matriz de
coordenadas, las coordenadas y un valor, y devolverá un booleano según sea correcto el valor
en la matriz de coordenadas. Ambas funciones estarán almacenadas en una librería
controlAcceso.php.
Si el usuario se ha identificado correctamente se muestra un enlace de acceso a la página
protegida (cualquiera) y si no mostrará un enlace para volver a intentarlo de nuevo.
Usar una tercera función imprimeTarjeta() que recibe una tarjeta y la imprime en una tabla
para comprobar el valor de todas las coordenadas. (imprimir las tarjetas de cada perfil en la
página de acceso para poder comprobar el correcto funcionamiento de la página) -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Ejercicio02</title>
    <?php include_once "controlAcceso.php" ?>
</head>

<body>
    <h1>Lock</h1>
    <?php
    $LETERS = ["A","B","C","D","E"];
    if (!isset($_REQUEST["profile"])) {
        $row=rand(0, 4);
        $col=rand(0, 4); ?>
    <form action="#" method="POST">
        <fieldset>
        <label for="profile">Tipo de Usuario</label>
        <select name="profile" id="profile">
            <option value="estandar" selected>Estandar</option>
            <option value="admin">Administrador</option>
        </select>
        <br>
        <label for="code">Introduzca el valor en la fila <?=$row+1 ?> y en la columna <?=$LETERS[$col]?></label>
        <input type="number" name="code" id="code" required>
        <br>
        <input type="hidden" name="row" value="<?=$row?>">
        <input type="hidden" name="col" value="<?=$col?>">
        <input type="submit" value="Comprobar">
        </fieldset>
    </form>
    <?php
    } else {
        $row=$_REQUEST["row"];
        $col=$_REQUEST["col"];
        $code=$_REQUEST["code"];
        $profile=$_REQUEST["profile"];

        $myCard=dameTarjeta($profile);
        if (compruebaClave($myCard, $row, $col, $code)) {
            ?>
            <script>
                window.location.href = "open.php?profile=<?=$profile?>";
            </script>
            <?php
        } else {
            ?>
            <script>
                alert("Codigo incorrecto, intentelo de nuevo");
                window.location.href = "Ej02.php";
            </script>
            <?php
        }
    }
    echo "<br><br><br><br>";
    imprimeTarjeta("admin");
    imprimeTarjeta("estandar");
    ?>
</body>

</html>