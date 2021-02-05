<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alumno</title>
</head>
<body>
    <!-- matricula,nombre,apellidos,curso -->
    <form action="" method="post">
    <input type="hidden" name="guardar">
    <label for="matricula">Matricula</label>
    <input type="text" name="matricula" id="matricula" required value="<?=$data["matricula"]?>" <?=$data["readonly"]?>>
    <br>
    <label for="nombre">Nombre</label>
    <input type="text" name="nombre" id="nombre" required value="<?=$data["nombre"]?>">
    <br>
    <label for="apellidos">Apellidos</label>
    <input type="text" name="apellidos" id="apellidos" required value="<?=$data["apellidos"]?>">
    <br>
    <label for="curso">Curso</label>
    <input type="text" name="curso" id="curso" required value="<?=$data["curso"]?>">
    <br>
    <input type="submit" value="<?=$data["action"]?>">
    <a href="index.php">Cancelar</a>
    </form>
</body>
</html>