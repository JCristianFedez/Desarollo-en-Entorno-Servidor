<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../View/css/bootstrap.min.css">
    <link rel="stylesheet" href="../View/css/style.css">
    <title>Alumno</title>
</head>

<body>
    <!-- id,nombre -->
    <!-- Contenedor de toda la pagina -->
    <div class="full-container">

        <!-- Contenedor de la cabezera -->
        <nav class="navbar bg-info">
            <div class="d-grid col-4 mx-auto my-2">
                <a href="index.php" class="btn btn-lg btn-primary">Cancelar</a>
            </div>
        </nav>

        <!-- Contenedor del formulario -->
        <div class="container mt-2">
            <div class="row justify-content-center">
                <div class="col-sm-12 col-md-10  col-lg-8 col-xl-6 py-2 rounded-3 bg-white-opacity">
                    <form action="" method="post" class="form">
                        <input type="hidden" name="guardar">
                        <div class="mb-3">
                            <label for="id" class="form-label">ID</label>
                            <input type="text" class="form-control" name="id" id="id" required value="<?=$data["id"]?>"
                                <?=$data["readonly"]?>>
                            <div id="idHelp" class="form-text">La id es un valor autoincremental</div>
                        </div>

                        <div class="mb-3">
                            <label for="nombre" class="form-label">Nombre</label>
                            <input type="text" class="form-control" name="nombre" id="nombre" required
                                value="<?=$data["nombre"]?>">
                        </div>

                        <input type="submit" value="<?=$data["action"]?>" class="btn btn-success">
                    </form>
                </div>
            </div>
        </div>
        <script src="../View/js/bootstrap.min.js"></script>
</body>
</div>

</html>