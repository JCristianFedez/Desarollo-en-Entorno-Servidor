<!-- Escribe un programa capaz de quitar las etiquetas 
html (<etiqueta>) de un documento web. Por
ejemplo como en esta línea: <h1>Título</h1> -> Titulo
Crea un fichero con mismo nombre y la coletilla “Sin” 
al final, que contiene el contenido del documento
original pero sin etiquetas html.  -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ej12</title>
</head>
<body>
    <?php 
    if(!isset($_FILES["my_file"])){
    ?>
    <form action="#" method="post" enctype="multipart/form-data">
    <label for="my_file">Introduce archivo html: 
        <input type="file" name="my_file" id="my_file" required>
    </label>
    <br>
    <input type="submit" value="Formatear archivo">
    </form>
    <?php
    }else{

        $my_file=$_FILES["my_file"]["tmp_name"];
        $aux=pathinfo($_FILES["my_file"]["name"]);
        $fl_name=$aux["filename"]."Sin.txt";
        
        if(file_exists($my_file)){
            $handler=strip_tags(file_get_contents($my_file));
            $handler=trim(implode(' ',array_filter(explode(' ',$handler)))); //Quito espacios sobrantes
            $handler=preg_replace("/[\r\n|\n|\r]+/", PHP_EOL, $handler); //Quito lineas vacias


            file_put_contents($fl_name,$handler);
        }else{
            echo "No se puede encontrar el archivo";
        }

        echo "<br><button onclick=\"window.location.href='Ej12.php';\">Volver atras</button>";

    }
    ?>
</body>
</html>