<?php
include "../Ej20-28/arrayUni.php";
/**
 * Genera array Bidimensional aleatorio de $row filas,
 * $col columnas $min es el valor minimo y $max el valor
 * maximo posible
 */
function generaArrayBiInt($row, $col, $min, $max)
{
    for ($i=0; $i < $row; $i++) {
        for ($j=0; $j < $col; $j++) {
            $myArray[$i][$j]=rand($min, $max);
        }
    }
    return $myArray;
}

/**
 * Devuelve los valores de la fila $row del array $myArray
 */
function filaDeArrayBiInt($myArray, $row)
{
    return $myArray[$row];
}

/**
 * Devuelve los valores de la fila $row del array $myArray
 */
function columnaDeArrayBiInt($myArray, $col)
{
    foreach ($myArray as $value) {
        $a[]=$value[$col];
    }
    return $a;
}

/**
 * Devuelve la fila y la columna (en un array con dos
 * elementos) de la primera ocurrencia de un número
 * dentro de un array bidimensional. Si el número
 * no se encuentra en el array, la función devuelve
 * el array {-1, -1}.
 * Example:
 * $myArray[0][0] = ROW
 * $myArray[0][1] = COL
 */
function coordenadasEnArrayBiInt($myArray, $num)
{
    $cord[0][0]=-1;//Fila
    $cord[0][1]=-1;//Columna
    $contAux=0;
    for ($i=0; $i < count($myArray); $i++) {
        for ($j=0; $j < count($myArray[$i]); $j++) {
            if ($num==$myArray[$i][$j]) {
                $cord[$contAux][0]=$i;
                $cord[$contAux][1]=$j;
                $contAux++;
            }
        }
    }

    return $cord;
}

/**
 * Devuelve true si el valor en la fila $row y columna $col
 * es punto de silla, es decir minimo en su fila y maximo
 * en su columna
 */
function esPuntoDeSilla($myArray, $row, $col)
{
    $fila=filaDeArrayBiInt($myArray, $row);
    $columna=columnaDeArrayBiInt($myArray, $col);
    if ((minimoArrayInt($fila)==$myArray[$row][$col])
        && (maximoArrayInt($columna)==$myArray[$row][$col])) {
        return true;
    } else {
        return false;
    }
}

/**
 * : Devuelve un array que contiene una de las diagonales del
 * array bidimensional que se pasa como parámetro. Se pasan
 * como parámetros fila, columna y dirección. La fila y la
 * columna determinan el número que marcará las dos posibles
 * diagonales dentro del array. La dirección es una cadena
 * de caracteres que puede ser “nose” o “neso”. La cadena
 * “nose” indica que se elige la diagonal que va del
 * noroeste hacia el sureste, mientras que la cadena
 * “neso” indica que se elige la diagonal que va del
 * noreste hacia el suroeste.
 */
function diagonal($myArray, $row, $col, $dir)
{
    if ($dir != "nose" && $dir != "neso") {
        $nop[0]=-1;
        return $nop[0];
    }

    for ($i = 0; $i < count($myArray); $i++) {
        for ($j = 0; $j < count($myArray[$row]); $j++) {
            if (((($col - $j)==($row-$i)) && ($dir=="nose"))
            || ((($col - $j)==($i-$row)) &&($dir="neso"))) {
                $arrayDiagonal[]=$myArray[$i][$j];
            }
        }
    }
    return $arrayDiagonal;
}
