<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Añadir nueva palabra</title>
</head>
<body>
    <h1>Añadir palabra</h1>
    <form action="administrarPalabras.php" method="post">
    <label for="espanol">Español: </label>
    <input type="text" name="espanol" id="espanol">
    <br>
    <label for="ingles">Ingles: </label>
    <input type="text" name="ingles" id="ingles">
    <br>
    <input type="submit" name="accion"  value="agregar">
    </form>
</body>
</html>