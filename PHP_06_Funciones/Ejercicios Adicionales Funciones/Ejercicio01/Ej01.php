<!-- Crear una página web para generar de manera aleatoria una combinación de apuesta en la
lotería primitiva. Se pedirán 6 números (entre 1 y 49) y el número de serie (entre 1 y 999). El
usuario podrá rellenar los números pedidos que desee, dejando en blanco el resto, de modo
que la combinación generada respete los números elegidos y genere aleatoriamente el resto
hasta completar la combinación (el número de serie también es opcional). El usuario también
podrá rellenar de manera opcional una caja de texto como título para su combinación.

Usar una función combinacion() que sea llamada para generar la combinación en función de
los parámetros recibidos y devuelva el array generado.

Usar una función imprimeApuesta() que reciba un array y un texto, e imprima en una tabla
html con el formato que quieras, el array generado con el texto de cabecera, para mostrar el
resultado de la combinación generada. Si la función no recibe ningún texto como cabecera
imprimirá "Combinación generada para la Primitiva"  -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <?php include_once "loteria.php"?>
    <title>Ej01</title>
</head>

<body>
    <h1>Primitiva el Bonito</h1>
    <br>
    <?php
    if (!isset($_REQUEST["flag"])) {
        ?>
    <form action="#" method="post">
        <fieldset>
            <input type="text" name="title" placeholder="Titulo de tu Loteria">
            <br>
            <input type="number" name="nums[]" class="num" placeholder="Nº1 [1-49]" min="1" max="49">
            <input type="number" name="nums[]" class="num" placeholder="Nº2 [1-49]" min="1" max="49">
            <input type="number" name="nums[]" class="num" placeholder="Nº3 [1-49]" min="1" max="49">
            <input type="number" name="nums[]" class="num" placeholder="Nº4 [1-49]" min="1" max="49">
            <input type="number" name="nums[]" class="num" placeholder="Nº5 [1-49]" min="1" max="49">
            <input type="number" name="nums[]" class="num" placeholder="Nº6 [1-49]" min="1" max="49">
            <input type="hidden" name="flag">
            <input type="number" name="nums[]" class="serie" placeholder="Nº Serie [1-999]" min="1" max="999">
            <br>
            <input type="submit" value="Jugar">
        </fieldset>
    </form>
    <?php
    }else{
        $nums=combinacion($_REQUEST["nums"]);
        $title=($_REQUEST["title"]=="")?"Tu Loteria":$_REQUEST["title"];
        $numsWiner=combinacion();
        imprimeApuesta($numsWiner);
        echo "<br>";
        imprimeApuesta($nums,$title);
    }
    ?>
</body>

</html>