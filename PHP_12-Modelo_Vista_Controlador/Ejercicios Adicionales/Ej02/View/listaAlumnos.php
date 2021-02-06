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

        <!-- Contenedor de la cabezera -->
        <nav class="navbar bg-info">
            <div class="d-grid col-4 mx-auto my-2">
                <a href="agregarAlumno.php" class="btn btn-lg btn-primary">Añadir Alumno</a>
            </div>
            <div class="d-grid col-4 mx-auto my-2">
                <a href="verAsignaturas.php" class="btn btn-lg btn-primary">Ver Asignaturas</a>
            </div>
        </nav>

        <!-- Contenedor de la tabla -->
        <div class="container mt-2">
            <table class="table table-striped table-info table-hover text-center">
                <thead class="table-dark">
                    <tr>
                        <th>Matricula</th>
                        <th>Nombre</th>
                        <th>Apellidos</th>
                        <th>Curso</th>
                        <th colspan="2">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($data["alumnos"] as $alumno): ?>
                    <tr>
                        <td><?=$alumno->getMatricula()?></td>
                        <td><?=$alumno->getNombre()?></td>
                        <td><?=$alumno->getApellidos()?></td>
                        <td><?=$alumno->getCurso()?></td>
                        <td>
                            <form action="detallesAlumno.php" method="post">
                                <input type="hidden" name="matricula" value="<?=$alumno->getMatricula()?>">
                                <input type="submit" value="Ver mas detalles" class="btn btn-info">
                            </form>
                        </td>
                        <td>
                            <form action="eliminarAlumno.php" method="post">
                                <input type="hidden" name="matricula" value="<?=$alumno->getMatricula()?>">
                                <input type="submit" value="Eliminar Alumno" class="btn btn-danger">
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