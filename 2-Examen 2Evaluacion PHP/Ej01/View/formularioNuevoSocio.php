<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../View/css/bootstrap.min.css">

    <title>Document</title>
</head>

<body>
    <nav class="navbar navbar-light bg-dark bg-gradient text-light">
        <div class="container-fluid justify-content-center">
        <h1 class="text-uppercase ">Nuevo fan de la increible rosalia</h1>
        </div>
    </nav>
    <div class="container my-3">

        <form action="guardarNuevoSocio.php" method="post" class="row g-3">
            <input type="hidden" name="guardar">

            <div class="col-md-4">
                <label for="nombre" class="form-label">Socio: </label>
                <input type="text" name="nombre" id="nombre" required class="form-control">
            </div>

            <div class="col-md-4">
                <label for="puntos" class="form-label">Puntos: </label>
                <input type="number" name="puntos" id="puntos" required min="0" class="form-control">
            </div>

            <div class="col-md-4">
                <label for="cAutonomas" class="form-label">Comunidad autonomca: </label>
                <select name="cAutonomas" id="cAutonomas" required class="form-select">
                    <?php foreach($data["cAutonomas"] as $comunidad): ?>
                    <option value="<?= $comunidad?>"><?= $comunidad?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="col-12 text-center">
            <input type="submit" value="Guardar" class="btn btn-success">
            <a href="index.php" class="btn btn-danger">Cancelar</a>
            </div>
        </form>
    </div>
    <script src="../View/js/bootstrap.min.js"></script>

</body>

</html>