<?php
/*
Se le envia un array con los numeros de una primimtiva,
si no se el envia nada lo crea y si faltan valores
en el array tambien se crean
*/
function combinacion(array $myArray=null):array
{
    if (!$myArray) {//Si no se pasa ningun valor
        for ($i=0; $i < 6; $i++) {
            $myArray[$i]=rand(1, 49);
        }
        $myArray[count($myArray)]=rand(1, 999);
    } else {
        foreach ($myArray as $key => &$value) {
            if ($key!=count($myArray)-1) {
                $value=($value=="")?rand(1, 49):$value;
            } else {
                $value=($value=="")?rand(1, 999):$value;
            }
        }
    }

    return $myArray;
}

/*
Imprime un array con un titulo de forma vistosa
*/
function imprimeApuesta(array $myArray, string $title="Combinacion generada para la Primitiva") : void
{
    ?>
<table>
    <thead>
        <tr>
            <th colspan="7"><?=$title?></th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <?php
            foreach ($myArray as $value) {
                echo "<td>$value</td>";
            } ?>
        </tr>
        <tr>
            <?php
            for ($i=1; $i<count($myArray) ; $i++) {
                echo "<td>Nº$i</td>";
            } ?>
            <td>Serie</td>
        </tr>
    </tbody>
</table>
<?php
}