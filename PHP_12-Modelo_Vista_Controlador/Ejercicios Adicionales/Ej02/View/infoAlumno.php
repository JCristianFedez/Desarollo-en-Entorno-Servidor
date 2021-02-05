<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alumno</title>
</head>

<body>
    <a href="index.php">Volver</a>
    <table border=1>
        <thead>
            <th>Asignaturas</th>
        </thead>
        <tbody>
            <?php foreach($data["asignaturas"] as  $asignatura): ?>
            <tr>
                <td><?=$asignatura->getNombre()?></td>
                <td>
                    <form action="desmatricular.php" method="post">
                        <input type="hidden" name="idAsignatura" value="<?=$asignatura->getId()?>">
                        <input type="hidden" name="matricula" value="<?=$matricula?>">
                        <input type="submit" value="Desmatricular">
                    </form>
                </td>
            </tr>
            <?php endforeach; ?>
            <tr>
                <form action="matricular.php" method="post">
                    <input type="hidden" name="matricula" value="<?=$matricula?>">
                    <td>
                    <select name="idAsignatura" id="idAsignatura">
                    <?php foreach($data["asignAMatricular"] as $asignatura): ?>
                    <option value="<?=$asignatura->getId()?>"><?=$asignatura->getNombre()?></option>
                    <?php endforeach; ?>
                    </select>
                    </td>
                    <td><input type="submit" value="Matricular"></td>
                </form>
            </tr>
        </tbody>
    </table>
</body>

</html>