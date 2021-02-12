<!doctype html>
<html lang='en'>

<head>
    <!-- Required meta tags -->
    <meta charset='utf-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <!-- Bootstrap CSS -->
    <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css' rel='stylesheet'
        integrity='sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl' crossorigin='anonymous'>
    <title>Hello, world!</title>
</head>

<body>
    <?php include "../View/header.php" ?>
    <div class="container">
        <div class="row justify-content-center">
            <?php if(!isset($data["error"])): ?>
            <?php foreach ($data["peli"] as $peli):?>
            <div class="col-xl-3 col-md-4 col-sm-6 mb-3">
                <div class="card" style="width: 100%;">
                    <a href="<?=$peli["enlace"]?>" target="_blank"><img src="<?=$peli["poster"]?>" class="card-img-top"
                            alt="..."></a>
                    <div class="card-body">
                        <h5 class="card-title"><?=$peli["title"]?></h5>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
            <?php else: ?>
            <div class="alert alert-danger" role="alert">
                <?=$data["error"]?><a href="index.php" class="alert-link">Pinche aqui para volver</a>
            </div>
            <?php endif; ?>
        </div>
        <div class="row">
            <nav aria-label="Page navigation example">
                <ul class="pagination justify-content-center">
                    <li class="page-item <?= $data["paginatedClass"]?>">
                        <a class="page-link " href="<?= "?pag=".$data["pag"]-1 ?>" aria-label="Previous">
                            <span aria-hidden="true">&laquo;</span>
                        </a>
                    </li>
                    <?php for($i=1;$i<=$_SESSION["cantPaginas"];$i++): ?>
                    <li class="page-item"><a class="page-link" href="<?= "?pag=$i" ?>"><?= $i ?></a></li>
                    <?php endfor; ?>

                    <li class="page-item <?= $data["paginatedClass"]?>">
                        <a class="page-link " href="<?= "?pag=".$data["pag"]+1 ?>" aria-label="Next">
                            <span aria-hidden="true">&raquo;</span>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
    <script src='https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js'
        integrity='sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0' crossorigin='anonymous'>
    </script>
    <script src='https://code.jquery.com/jquery-3.5.1.min.js'></script>
    <script src='../View/js/script.js'></script>
</body>

</html>