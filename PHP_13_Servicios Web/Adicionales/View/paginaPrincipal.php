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
    <div class="container">
        <form action="#" method="get" class="row justify-content-center my-5">
            <div class="col-6 mb-3">
                <label for="apiKey" class="form-label">Api Key</label>
                <input type="text" class="form-control" id="apiKey" name="apiKey">
            </div>
            <div class="col-6 mb-3">
                <label for="nombre" class="form-label">Nombre</label>
                <input type="text" class="form-control" id="nombre" name="nombre">
            </div>
            <div class="col-6 mb-3">
                <label for="min" class="form-label">Precio Minimo</label>
                <input type="number" class="form-control" id="min" name="min">
            </div>
            <div class="col-6 mb-3">
                <label for="max" class="form-label">Precio Maximo</label>
                <input type="number" class="form-control" id="max" name="max">
            </div>
            <input type="hidden" name="enviado">
            <div class="col-12 text-center">
                <button class="btn btn-primary" type="submit">Enviar</button>
            </div>
        </form>

        <?php if(isset($data["productos"])): ?>

        <?php if(!isset($data["productos"]->Error)): ?>
            <div class="row">
            <?php foreach ($data["productos"] as $prod):?>
            <div class="col-xl-3 col-md-4 col-sm-6 mb-3">
                <div class="card" style="width: 100%;">
                    <img src="<?=$prod->Img?>" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">
                            <?=$prod->Nombre?>
                            <span class="badge bg-warning text-dark"><?=$prod->Precio?>€</span>
                        </h5>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
        <?php else: ?>
        <div class="row justify-content-center">
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>Error</strong> <?=$data["productos"]->Error?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>
        <?php endif; ?>
        <?php endif; ?>
    </div>

    <script src='https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js'
        integrity='sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0' crossorigin='anonymous'>
    </script>
    <script src='https://code.jquery.com/jquery-3.5.1.min.js'></script>
</body>

</html>