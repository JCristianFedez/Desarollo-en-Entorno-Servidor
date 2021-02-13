<!doctype html>
<html lang='en'>

<head>
    <!-- Required meta tags -->
    <meta charset='utf-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <!-- Bootstrap CSS -->
    <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css' rel='stylesheet'
        integrity='sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl' crossorigin='anonymous'>
    <link rel="stylesheet" href="../View/css/style.css">
    <title>Hello, world!</title>
</head>

<body>
    <!-- Cabezera -->
    <?php include "../View/header.php" ?>

    <!-- Contenedor de peliculas -->
    <div class="container">
        <div class="row">
            <?php foreach ($data["peli"] as $peli):?>
            <div class="col-xl-3 col-md-4 col-sm-6 mb-3">
                <div class="card" style="width: 100%;">
                    <a href="masinfoPeli.php?idPeli=<?=$peli["id"]?>" target="_blank">
                        <img src="<?=$peli["poster"]?>" class="card-img-top" alt="...">
                    </a>
                    <div class="card-body">
                        <h5 class="card-title"><?=$peli["title"]?></h5>
                        <p class="card-text"><?=$peli["plot"]?></p>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
    <script src='https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js'
        integrity='sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0' crossorigin='anonymous'>
    </script>
    <script src='https://code.jquery.com/jquery-3.5.1.min.js'></script>
    <script src='../View/js/script.js'></script>
</body>

</html>