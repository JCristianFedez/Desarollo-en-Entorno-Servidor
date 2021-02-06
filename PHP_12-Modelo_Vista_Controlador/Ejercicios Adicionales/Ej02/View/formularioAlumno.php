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
    <!-- matricula,nombre,apellidos,curso -->
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
                            <label for="matricula" class="form-label">Matricula</label>
                            <input type="text" class="form-control" name="matricula" id="matricula" required
                                value="<?=$data["matricula"]?>" <?=$data["readonly"]?>>
                        </div>

                        <div class="mb-3">
                            <label for="nombre" class="form-label">Nombre</label>
                            <input type="text" class="form-control" name="nombre" id="nombre" required
                                value="<?=$data["nombre"]?>">
                        </div>

                        <div class="mb-3">
                            <label for="apellidos" class="form-label">Apellidos</label>
                            <input type="text" class="form-control" name="apellidos" id="apellidos" required
                                value="<?=$data["apellidos"]?>">
                        </div>

                        <div class="mb-3">
                            <label for="curso" class="form-label">Curso</label>
                            <input type="text" class="form-control" name="curso" id="curso" required
                                value="<?=$data["curso"]?>">
                        </div>

                        <input type="submit" value="<?=$data["action"]?>" class="btn btn-success">
                    </form>
                </div>
            </div>

            <!-- Contenedor del mensaje de error -->
            <div class="row justify-content-center text-center mt-2">
                <div
                    class="col-sm-12 col-md-10 col-lg-8 col-xl-6 py-2 rounded-3 bg-danger <?=$data["errorVisibility"]?>">
                    <h1 class="display-6"><?=$data["error"]?></h1>
                </div>
            </div>
        </div>
        <script src="../View/js/bootstrap.min.js"></script>
    </div>
</body>

</html>