<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alumnos</title>
</head>
<body>
    <a href="verAsignaturas.php">Ver Asignaturas</a>
    <a href="ingresarDatosAsignatura.php">Añadir Alumno</a>
    <table border=1>
        <thead>
            <tr>
                <th>Matricula</th>
                <th>Nombre</th>
                <th>Apellidos</th>
                <th>Curso</th>
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
                            <input type="submit" value="Ver mas detalles">
                        </form>
                    </td>
                    <td>
                    <form action="eliminarAlumno.php" method="post">
                            <input type="hidden" name="matricula" value="<?=$alumno->getMatricula()?>">
                            <input type="submit" value="Eliminar Alumno">
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>