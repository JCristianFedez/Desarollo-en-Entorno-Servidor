<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../View/css/style.css">
    <title>Document</title>
</head>

<body>
    <?php include "cabezera.php"; ?>
    <main>
        <div class="article-container">
            <a href="nuevoArticulo.php" class="btn insertarArticulo">Insertar Articulo</a>
            <?php foreach ($data["articulos"] as $articulo):?>
            <div class="article-item">
                <h2><?=$articulo->getTitulo();?></h2>
                <p><?=$articulo->getContenido();?></p>
                <p><?=$articulo->getFecha();?></p>
                <div class="botones">
                <a class="btn borrar" href="borrarArticulo.php?id=<?=$articulo->getId();?>">Borrar</a>
                <a class="btn modificar" href="modificarArticulo.php?id=<?=$articulo->getId();?>">Modificar</a>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </main>

    <?php include "pie.php"; ?>
</body>

</html>