<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
    $fileName="datosTienda.txt";

    if(file_exists($fileName)){//Si existe el fichero
        $file=fopen($fileName,"r");//Abro el archivo en lectura
        $key=fgetcsv($file);//Cojo la primera fila como clave

        while($row=fgetcsv($file)){//Mientras no sea nula la fila se repite
            if(!$row[0])continue;//Si la fila no 
            for ($i=1; $i < count($key); $i++) { 
                $nextItem[$key[$i]]=$row[$i];
            }
            $result[$row[0]]=$nextItem;
        }
        print_r($result);
    }
    ?>
</body>
</html>