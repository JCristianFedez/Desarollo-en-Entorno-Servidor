<?php 
$uri = "http://localhost/php-instituto/PHP_13_Servicios%20Web/Boletin/Ej04/baraja.php";
if(isset($_REQUEST["cant"])){
    $cant = $_REQUEST['cant'];
    $datos = file_get_contents("$uri?cant=$cant");

    $cartas = json_decode($datos);

    $maxCol = 0;
    // Calculo las columnas necesarias
    if(!isset($cartas->Error)){
        foreach ($cartas as $palo) {
            if(count($palo) > $maxCol){
                $maxCol = count($palo);
            }
        }
    }
}
?>
<html>
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
    <h1 class="text-center">Baraja Española</h1>
    <div class="container">
        <form action="#" method="post" class="row justify-content-center my-5">
            <div class="col-6 mb-3">
                <label for="cant" class="form-label">Cantidad de cartas</label>
                <input type="number" class="form-control" id="cant" name="cant" required>
            </div>
            <div class="col-12 text-center">
                <button class="btn btn-primary" type="submit">Pedir</button>
            </div>
        </form>
        <?php if(isset($cartas) && !isset($cartas->Error)): ?>
        <div class="row justify-content-center">
            <h3 class="text-center">Tus Cartas</h3>
            <div class="col-10">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead class="table-dark">
                            <tr>
                                <th scope="col">Palo</th>
                                <th scope="col" class="text-center" colspan="<?=$maxCol?>">Numeros</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($cartas as $palo => $conjuntoNumeros): ?>
                            <tr>
                                <th scope="row"><?= $palo ?></th>
                                <?php foreach($conjuntoNumeros as $numero): ?>
                                <td class="text-center"> <?=$numero?> </td>
                                <?php endforeach; ?>
                                <?php for($i=0;$i<$maxCol-count($conjuntoNumeros); $i++): ?>
                                <td></td>
                                <?php endfor; ?>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <?php elseif(isset($cartas) && isset($cartas->Error)): ?>
        <div class="row justify-content-center">
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>Error</strong> <?=$cartas->Error?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
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