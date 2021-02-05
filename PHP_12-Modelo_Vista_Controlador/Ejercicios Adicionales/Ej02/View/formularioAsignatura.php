<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alumno</title>
</head>
<body>
    <!-- id,nombre -->
    <form action="" method="post">
    <input type="hidden" name="guardar">
    <label for="id">Id</label>
    <input type="text" name="id" id="id" required value="<?=$data["id"]?>" <?=$data["readonly"]?>>
    <br>
    <label for="nombre">Nombre</label>
    <input type="text" name="nombre" id="nombre" required value="<?=$data["nombre"]?>">
    <br>
    <input type="submit" value="<?=$data["action"]?>">
    <a href="index.php">Cancelar</a>
    </form>
</body>
</html>