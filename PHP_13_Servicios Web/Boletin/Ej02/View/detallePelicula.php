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
            <div class="col-md-4 mb-3 text-center">
                <a href="<?=$data["peli"]["enlace"]?>" target="_blank">
                    <img src="<?=$data["peli"]["poster"]?>" class="img-fluid" alt="...">
                </a>
            </div>
            <div class="col mb-3 align-self-center">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item text-center">
                        <h5 class="card-title">
                            <?=$data["peli"]["title"]?>
                            <span class="badge bg-warning text-dark"><?=$data["peli"]["puntos"]?></span>
                        </h5>
                    </li>
                    <li class="list-group-item">
                        <p class="card-text"><?=$data["peli"]["plot"]?></p>
                    </li>
                    <li class="list-group-item">
                        <span class="fw-bold">Director</span> <?=$data["peli"]["director"]?>
                    </li>
                    <li class="list-group-item">
                        <span class="fw-bold">Actores</span> 
                            <?=$data["peli"]["actores"]?>
                    </li>
                    <li class="list-group-item"><span class="fw-bold">Fecha estreno</span>
                        <?=$data["peli"]["estreno"]?>
                    </li>
                    <li class="list-group-item">
                        <span class="fw-bold">Genero</span> <?=$data["peli"]["genero"]?>
                    </li>
                    <li class="list-group-item">
                        <span class="fw-bold">Enlace</span>
                        <a href="<?=$data["peli"]["enlace"]?>"><?=$data["peli"]["enlace"]?></a>
                    </li>
                </ul>
            </div>
            <?php else: ?>
            <div class="alert alert-danger" role="alert">
                <?=$data["error"]?><a href="index.php" class="alert-link">Pinche aqui para volver</a>
            </div>
            <?php endif; ?>
        </div>
    </div>
    <script src='https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js'
        integrity='sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0' crossorigin='anonymous'>
    </script>
    <script src='https://code.jquery.com/jquery-3.5.1.min.js'></script>
    <script src='../View/js/script.js'></script>
</body>

</html>