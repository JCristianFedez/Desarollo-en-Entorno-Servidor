<!-- Una función (tipo procedimiento, no hay valor devuelto) 
denominada escribirNumerosMod que reciba dos parámetros: un array 
de valores enteros y una cadena de texto que puede ser "sobreescribir"
ó "ampliar". La función debe proceder a: escribir cada uno de los
números que forman el contenido del array en una línea de un archivo 
datosEjercicio.txt usando el modo de operación que se indique con el
otro parámetro. Si el archivo no existe, debe crearlo.

Ejemplo: El array que se pasa es $numeros = array(5, 9, 3, 22); y la 
invocación que se utiliza es escribirNumerosMod($numeros, "sobreescribir"); 
En este caso, se debe eliminar el contenido que existiera previamente 
en el archivo y escribir en él 4 líneas, cada una de las cuales contendrá los
números 5, 9, 3 y 22.  -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ej05</title>
</head>
<body>
<form action="#" method="post" enctype="multipart/form-data">
        <label for="operacoin">Que operacion desea hacer sobre "datosEjercicio.txt"
            <select name="operacion" id="operacion">
            <option value="sobreescribir">Sombreescribir</option>
            <option value="ampliar">Ampliar</option>
            </select>
        </label>
        <br>
        <input type="submit" value="Enviar">
    </form>
    <?php 
    if(isset($_REQUEST["operacion"])){
        $numeros=[5,9,3,22];

        $myOperacion=$_REQUEST["operacion"];
        escribirNumerosMod($numeros,$myOperacion);

    }

    /**
     * Amplia o sobreescribe fichero datosEjercicio
     */
    function escribirNumerosMod($numeros,$operacion){
        switch($operacion){
            case "sobreescribir": 
                $op="w";
            break;

            case "ampliar":
                $op="a";
            break;

            default:
                return false;
        }

        $abierto=fopen("datosEjercicio.txt",$op);

        foreach ($numeros as $value) {
            fwrite($abierto,$value.PHP_EOL);
        }
        fclose($abierto);
    }
    
    ?>
</body>
</html>