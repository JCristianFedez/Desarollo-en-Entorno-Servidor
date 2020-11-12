<?php
$ADMIN=[
    [2,5,9,10,20],
    [6,3,8,1,1],
    [20,10,10,4,21],
    [14,0,7,15,19],
    [20,15,13,7,2]
];
$STANDAR=[
    [10,6,8,20,1],
    [1,1,12,21,7],
    [5,8,20,14,16],
    [1,20,10,15,13],
    [17,2,6,8,24]
];
$LETERS = ["A","B","C","D","E"];

/**
 * Se le pasa un perfil y devuelve una matriz correspondiente a las tarjetas
 * de cordenadas de dicho perfil
 */
function dameTarjeta(string $profile):array
{
    switch ($profile) {
        case 'admin':
            global $ADMIN;
            return $ADMIN;
            break;

        case 'estandar':
            global $STANDAR;
            return $STANDAR;
            break;
                
        default:
            return -1;
            break;
    }
}

/**
 * Se le pasa la matriz de cordenadas, unas cordenadas y un valor y
 * devolbera un boleano segun si a hacertado o no
 */
function compruebaClave(array $myArray,int $row,int $col,int $code):bool
{
    $bol=($myArray[$row][$col]==$code)?true:false;
    return $bol;
}

/**
 * Imprime una tarjeta, (Array Bidimensional)
 */
function imprimeTarjeta(string $profile) : void
{
    switch ($profile) {
        case 'admin':
            global $ADMIN;
            $card=$ADMIN;
            break;
        case 'estandar':
            global $STANDAR;
            $card=$STANDAR;
            break;
        default://Por si hay algun fallo no pinte nada
        exit;
        break;
    } 
    global $LETERS;
    ?>
<table>
    <caption><?=$profile?></caption>
    <tbody>
        <tr>
            <th></th>
            <?php
                foreach ($LETERS as $value) {
                    echo "<th>$value</th>";
                } ?>
        </tr>
        <?php
            foreach ($card as $key => $row) {
                echo "<tr>";
                echo "<th>".($key+1)."</th>";
                foreach ($row as $value) {
                    echo "<td>$value</td>";
                }
                echo "</tr>";
            } ?>
    </tbody>
</table>
<?php
}
