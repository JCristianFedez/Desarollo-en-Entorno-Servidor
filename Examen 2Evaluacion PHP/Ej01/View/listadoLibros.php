<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Usuario: <?=$data["nUser"]?></h1>
    <a href="cerrarSesion.php">Cerrar Sesion</a>
    <table border="1">
        <thead>
            <tr>
                <th>ISBN</th>
                <th>Titulo</th>
                <th>Estado</th>
                <th>Cliente</th>
                <th>Alquiler</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach($data["libros"] as $libro): ?>
            <tr>
                <td><?=$libro->getIsbn()?></td>
                <td><?=$libro->getTitulo()?></td>
                <td><?=$libro->getEstado()?></td>
                <td><?=$libro->getCliente()?></td>
                <?php if($libro->getEstado() == "libre"): ?>
                <td>
                    <form action="alquilar.php" method="post">
                    <input type="hidden" name="isbn" value="<?=$libro->getIsbn()?>">
                    <input type="submit" value="Alquilar">
                    </form>
                </td>
                <?php else: ?>
                    <td>
                    <form action="devolver.php" method="post">
                    <input type="hidden" name="isbn" value="<?=$libro->getIsbn()?>">
                    <input type="submit" value="Devolver">
                    </form>
                </td>
                <?php endif; ?>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
    <?php if($data["error"]): ?>
    <h2><?=$data["error"]?></h2>
    <?php endif ?>
</body>

</html>