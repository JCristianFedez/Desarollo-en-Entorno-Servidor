<!doctype html>
<html lang='en'>

<head>
    <!-- Required meta tags -->
    <meta charset='utf-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <title>Servicio!</title>
</head>

<body>
    <form action="almacenarDatos.php" method="post">
    <input type="hidden" name="enviado">
    <label for="titulo">Titulo: </label>
    <input type="text" name="titulo" id="titulo">
    <br>
    <label for="estado">Estado: </label>
    <select name="estado" id="estado">
    <option value="libre">Libre</option>
    <option value="alquilado">Alquilado</option>
    </select>
    <br>
    <input type="submit" value="Consultar">
    </form>
    <?php if($data["mensaje"] != ""): ?>
        <h2><?=$data["mensaje"]?></h2>
        <a href="../ficheros/fichero.csv">Libros</a>
    <?php endif; ?>
</body>

</html>