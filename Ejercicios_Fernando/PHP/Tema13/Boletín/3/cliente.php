<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form action="" method="POST">
    Moneda original : 
    <select name="moneda">
    <option value="eur">Euro</option>
    <option value="pes">Peseta</option>
    </select><br>
    
    Inserte cantidad: <input type="number" name="cantidad">
    <input type="submit">
</form>
<hr>
<?php
if (isset($_POST['cantidad'])) {
$json = file_get_contents("http://localhost/Curso%2020-21/Ejercicios%20Adicionales/Tema13/Boletín/3/servidor.php?cantidad=$_POST[cantidad]&moneda=$_POST[moneda]");
$conversion = json_decode($json);
echo "Son $conversion->resultado $conversion->moneda";
}
?>
</body>
</html>