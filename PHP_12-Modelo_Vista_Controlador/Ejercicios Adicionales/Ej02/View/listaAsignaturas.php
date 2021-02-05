<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alumnos</title>
</head>
<body>
    <a href="index.php">Ver Alumnos</a>
    <a href="agregarAsignatura.php">Añadir Asignatura</a>
    <table border=1>
        <thead>
            <tr>
                <th>Id</th>
                <th>Nombre</th>
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
                            <input type="submit" value="Eliminar Asignatura">
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>