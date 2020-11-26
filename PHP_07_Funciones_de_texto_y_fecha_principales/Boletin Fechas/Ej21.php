<!-- Pedir la fecha de nacimiento y el nombre de dos personas y mostrar el nombre de la
mayor.  -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
    select{
        margin:1em 0em;
    }
    </style>
    <title>Ej20</title>
</head>
<body>
    <form action="#" method="post">
    <label for="name1">Introduce Nombre persona 1</label>
    <input type="text" name="name1" id="name1" required>
    <br>
    <label for="dateP1">Introduce Fecha Nacimiento Persona 1</label>
    <input type="text" name="dateP1" id="dateP1" placeholder="dd/mm/yyyy" pattern="^([0]?[1-9]|[1|2][0-9]|[3][0|1])[./-]([0]?[1-9]|[1][0-2])[./-]([0-9]{4}|[0-9]{2})$" required>
    <br>
    <label for="name2">Introduce Nombre persona 2</label>
    <input type="text" name="name2" id="name2" required>
    <br>
    <label for="dateP2">Introduce Fecha Nacimiento Persona 2</label>
    <input type="text" name="dateP2" id="dateP2" placeholder="dd/mm/yyyy" pattern="^([0]?[1-9]|[1|2][0-9]|[3][0|1])[./-]([0]?[1-9]|[1][0-2])[./-]([0-9]{4}|[0-9]{2})$" required>
    <br>
    <input type="submit" value="Calcular">
    <br><br>
    <?php
    if (isset($_REQUEST["name1"]) && isset($_REQUEST["dateP1"]) && isset($_REQUEST["name2"]) && isset($_REQUEST["dateP2"])) {

        $dateP1=str_replace("/", "-", $_REQUEST["dateP1"]);
        $dateP2=str_replace("/", "-", $_REQUEST["dateP2"]);
        $name1=$_REQUEST["name1"];
        $name2=$_REQUEST["name2"];

        if (substr_count($dateP1, "-")!=2 || (strlen($dateP1)-substr_count($dateP1, "-"))<3 
        || substr_count($dateP2, "-")!=2 || (strlen($dateP2)-substr_count($dateP2, "-"))<3) {
            echo "Fecha incorecta";
        } else {
            $aux=explode("-", $dateP1);
            $aux2=explode("-", $dateP2);
            if (count($aux)!=3 || !checkdate($aux[1], $aux[0], $aux[2])
            || count($aux2)!=3 || !checkdate($aux2[1], $aux2[0], $aux2[2])) {
                echo "Fecha incorrecta";
            } else {
               echo "Edad $name1 : $dateP1<br>";
               echo "Edad $name2 : $dateP2<br>";
               if(date("Ymd",strtotime($dateP1))>date("Ymd",strtotime($dateP2))){
                   echo "$name1 es mayor a $name2";
               }else if (date("Ymd",strtotime($dateP1))<date("Ymd",strtotime($dateP2))) {
                echo "$name2 es mayor a $name1";
               }else{
                   echo "$name1 y $name2 tienen la misma edad";
               }
            }
        }
    }
    ?>
</body>
</html>