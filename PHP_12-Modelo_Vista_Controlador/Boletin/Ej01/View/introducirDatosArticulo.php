<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nuevo Articulo</title>
</head>
<body>
    <form action="insertarArticulo.php" method="post">
    <label for="titulo">Titulo</label>
    <input type="text" name="titulo" id="titulo" required>
    <br>

    <label for="contenido">Contenido</label>
    <br>
    <textarea name="contenido" id="contenido" cols="30" rows="10"></textarea>
    <br>

    <input type="submit" value="Añadir">
    </form>
</body>
</html>