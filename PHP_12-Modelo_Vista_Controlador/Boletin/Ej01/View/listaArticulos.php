<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div class="container">
        <header>Mi Blog</header>
        <a href="nuevoArticulo.php">Insertar Articulo</a>
        <main>
        <div class="article-container">
            <?php foreach ($data["articulos"] as $articulo):?>
                <div class="article-item">
                    <h2><?=$articulo->getTitulo();?></h2>
                    <p><?=$articulo->getContenido();?></p>
                    <p><?=$articulo->getFecha();?></p>
                    <a href="borrarArticulo.php?id=<?=$articulo->getId();?>">Borrar</a>
                </div>
            <?php endforeach; ?>
        </div>
        </main>

        <footer>Pie</footer>
    </div>
</body>

</html>