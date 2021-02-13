<?php 
$uri = "http://localhost/php-instituto/PHP_13_Servicios%20Web/Boletin/Ej03/conversor.php";
if(isset($_REQUEST["action"]) && isset($_REQUEST["cant"])){
    $cant = $_REQUEST['cant'];
    switch($_REQUEST["action"]){
        case "toEuros":
            $moneda="p";
            break;
        case "toPesetas":
            $moneda="e";
            break;
    }
    $datos = file_get_contents("$uri?$moneda=$cant");

    $conversion = json_decode($datos);
    $pesetas = $conversion->pesetas;
    $euros = $conversion->euros;
}
?>

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
    <h1 class="text-center">Conversor</h1>
    <div class="container">
        <form action="#" method="post" class="row justify-content-center my-5">
            <div class="col-6 mb-3">
                <label for="cant" class="form-label">Cantidad</label>
                <input type="number" class="form-control" id="cant" name="cant" required min="0" step="0.01">
            </div>
            <div class="col-12 text-center">
                <button class="btn btn-primary" name="action" value="toEuros" type="submit">Pasar a Euros</button>
                <button class="btn btn-primary" name="action" value="toPesetas" type="submit">Pasar a
                    Pesetas</button>
            </div>
        </form>
        <?php if(isset($conversion)): ?>
        <div class="row justify-content-center">
            <div class="col-6">
                <?php if($_REQUEST["action"] == "toPestas"): ?>
                    <h3><?= "$euros euros son $pesetas pesetas" ?></h3>
                <?php else: ?>
                    <h3><?= "$pesetas pesetas son $euros euros" ?></h3>
                <?php endif; ?>
            </div>
        </div>
        <?php endif; ?>
    </div>

    <script src='https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js'
        integrity='sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0' crossorigin='anonymous'>
    </script>
    <script src='https://code.jquery.com/jquery-3.5.1.min.js'></script>
</body>

</html>