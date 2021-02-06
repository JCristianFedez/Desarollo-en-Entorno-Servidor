<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../View/css/bootstrap.min.css">
    <link rel="stylesheet" href="../View/css/style.css">
    <title>Alumnos</title>
</head>

<body>
    <!-- Contenedor de toda la pagina -->
    <div class="full-container">

        <!-- Cabezera -->
        <nav class="navbar bg-info">
            <div class="d-grid col-4 mx-auto my-2">
                <a href="index.php" class="btn btn-lg btn-primary">Ver Alumnos</a>
            </div>
            <div class="d-grid col-4 mx-auto my-2">
                <a href="agregarAsignatura.php" class="btn btn-lg btn-primary">Añadir Asignatura</a>
            </div>
        </nav>

        <!-- Contenedor de la tabla -->
        <div class="container mt-2">
            <table class="table table-striped table-info table-hover text-center">
                <thead class="table-dark">
                    <tr>
                        <th>Id</th>
                        <th>Nombre</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($data["asignaturas"] as $asignatura): ?>
                    <tr>
                        <td><?=$asignatura->getId()?></td>
                        <td><?=$asignatura->getNombre()?></td>
                        <td>
                            <form action="eliminarAsignatura.php" method="post">
                                <input type="hidden" name="id" value="<?=$asignatura->getId()?>">
                                <input type="submit" value="Eliminar Asignatura" class="btn btn-danger">
                            </form>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <script src="../View/js/bootstrap.min.js"></script>
    </div>
</body>

</html>