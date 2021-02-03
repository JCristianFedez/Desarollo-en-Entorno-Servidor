<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../View/css/style.css">
    <title>Nuevo Articulo</title>
</head>

<body>
    <?php include "cabezera.php"; ?>
    <div class="form-container">
        <form action="insertarArticulo.php" method="post" class="introducirDatos">
            <div class="form-item">
                <label for="titulo">
                    <h3>Titulo</h3>
                </label>
                <input type="text" name="titulo" id="titulo" required>
            </div>
            <div class="form-item">
                <label for="contenido">
                    <h3>
                        Contenido
                    </h3>
                </label>
                <br>
                <textarea name="contenido" id="contenido" cols="30" rows="10"></textarea>
            </div>

            <div class="form-item botones">
                <button type="submit" value="agregar" name="action" class="btn agregar">Añadir</button>
                <a href="index.php" class="btn cancelar">Cancelar</a>
            </div>
        </form>
    </div>
    <?php include "pie.php"; ?>
</body>

</html>