<!-- Crea un mini-diccionario español-inglés que contenga, al menos, 
20 palabras (con su traducción). Utiliza un array asociativo para 
almacenar las parejas de palabras. El programa pedirá una palabra
en español y dará la correspondiente traducción en inglés.
 -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ej11</title>
</head>
<body>
    <?php 
    if (!isset($_REQUEST["word"])) {
 ?>
    <form action="" method="post">
        <label>Palabra española: <input type="text" name="word" required></label>
        <br>
        <input type="submit" value="Traducir">
    </form>
    <?php
    }else{
        $diccionario=["mesa"=>"table", "ventana"=>"window",
                  "silla"=>"chair", "perro"=>"dog",
                  "portatil"=>"laptop","pelota"=>"ball",
                  "viento"=>"wind", "dinero"=>"money",
                  "casa"=>"house","coche"=>"car"];
        foreach ($diccionario as $key => $value) {
            $wordSpanish[] = $key;
          }
        $word=$_REQUEST["word"];
        $word=strtolower($word);
        if(in_array($word,$wordSpanish)){
            echo "$word significa $diccionario[$word]";
            echo "<br><button onclick='window.location.href=\"Ej11.php\";'>Nueva palabra</button></button>";
        }else{
            ?>
            <script>
            alert("Palabra no incluida en el diccionario");
            window.location.href="Ej11.php";
            </script>
            <?php
        }
    }
     ?>
</body>
</html>