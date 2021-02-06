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
    <!-- Contenedor de toda la pagina -->
    <div class="full-container">

        <!-- Contenedor de la cabezera -->
        <nav class="navbar bg-info">
            <div class="d-grid col-4 mx-auto my-2">
                <a href="index.php" class="btn btn-lg btn-primary">Volver</a>
            </div>
        </nav>

        <!-- Contenedor de la tabla -->
        <div class="container mt-2">
            <table class="table table-striped table-info table-hover text-center">
                <thead class="table-dark">
                    <th>Asignaturas</th>
                    <th>Acciones</th>
                </thead>
                <tbody>
                    <?php foreach($data["asignaturas"] as  $asignatura): ?>
                    <tr>
                        <td><?=$asignatura->getNombre()?></td>
                        <td>
                            <form action="desmatricular.php" method="post">
                                <input type="hidden" name="idAsignatura" value="<?=$asignatura->getId()?>">
                                <input type="hidden" name="matricula" value="<?=$matricula?>">
                                <input type="submit" value="Desmatricular" class="btn btn-danger">
                            </form>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                    <tr>
                        <form action="matricular.php" method="post" class="form">
                            <td>
                                <input type="hidden" name="matricula" value="<?=$matricula?>">
                                <select name="idAsignatura" id="idAsignatura" class="form-select mx-auto">
                                    <?php foreach($data["asignAMatricular"] as $asignatura): ?>
                                    <option value="<?=$asignatura->getId()?>"><?=$asignatura->getNombre()?></option>
                                    <?php endforeach; ?>
                                </select>
                            </td>
                            <td><input type="submit" value="Matricular" class="btn btn-success"></td>
                        </form>
                    </tr>
                </tbody>
            </table>
        </div>
        <script src="../View/js/bootstrap.min.js"></script>
    </div>
</body>

</html>