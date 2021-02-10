<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="#">
    <label for="ciudad">Ciudad:</label>
    <input type="text" name="ciudad" id="ciudad">
    <br>
    <label for="pais">Pais</label>
    <input type="text" name="pais" id="pais">
    <input type="submit" value="">
    </form>
    <h3>Datos en bruto (en formato JSON):</h3>
    <p><?=$datos?></p>
    <hr>
    <h3>Datos en un objeto:</h3>
    <p>Temperatura: <?=$tiempo->main->temp?> ºC</p>
    <p>Humedad: <?=$tiempo->main->humidity?></p>
    <p>Presion: <?=$tiempo->main->temp?></p>
</body>

</html>