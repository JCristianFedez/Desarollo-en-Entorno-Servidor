<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../View/css/bootstrap.min.css">
    <title>Document</title>
</head>

<body>
<nav class="navbar navbar-light bg-dark bg-gradient text-light">
        <div class="container-fluid justify-content-center">
        <h1 class="text-uppercase ">ROSALIA - Listado de fans</h1>
        </div>
    </nav>
    <div class="container my-3">
        <h3 class="text-center text-uppercase">
            Operaciones realizadas: <span class="text-danger fw-bold"><?=$data["operacionesRelizadas"];?></span>
            <a href="resetOperaciones.php" class="btn btn-warning btn-lg">Resetear</a>
        </h3>
        <div class="table-responsive">
            <table class="table table-striped table-hover">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>NOMBRE</th>
                        <th>PUNTOS</th>
                        <th>COMUNIDAD</th>
                        <th>SUMAR PTOS</th>
                        <th>BAJA</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($data["socios"] as $socio): ?>
                    <tr>
                        <td><?=$socio->getId()?></td>
                        <td><?=$socio->getNombre()?></td>
                        <td><?=$socio->getPuntos()?></td>
                        <td><?=$socio->getComunidad()?></td>
                        <td>
                            <form action="sumarPtos.php" method="post">
                                <input type="hidden" name="id" value="<?=$socio->getId()?>">
                                <input type="submit" value="Sumar" class="btn btn-primary">
                            </form>
                        </td>
                        <td>
                            <form action="baja.php" method="post">
                                <input type="hidden" name="id" value="<?=$socio->getId()?>">
                                <input type="submit" value="Eliminar" class="btn btn-danger">
                            </form>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <div class="row mb-3">
            <a href="nuevoSocio.php" class="btn btn-success">Registrar nuevo socio</a>
        </div>
        <form action="guardarSociosConMasPuntos.php" method="post" class="row g-3 justify-content-center">
            <div class="col-md-6">
                <label for="cant" class="form-label">Los fans con mas puntos: </label>
                <input type="number" name="cant" id="cant" required min="1" max="<?= count($data["socios"])?>"
                    placeholder="Cuantos" class="form-control">
            </div>
            <div class="col-12 text-center">
                <input type="submit" value="Volcar a fichero" class="btn btn-primary">
            </div>
        </form>
        <?php if(isset($data["guardadoFichero"])): ?>
        <div class="alert alert-warning alert-dismissible fade show fixed-bottom text-center" role="alert">
            <?=$data["guardadoFichero"]?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <?php endif; ?>
    </div>

    <script src="../View/js/bootstrap.min.js"></script>
    <script src="../View/js/main.js"></script>
</body>

</html>