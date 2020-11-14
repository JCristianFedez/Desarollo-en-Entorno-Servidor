<?php

/**
 * Genera un array de tamaño n con números aleatorios 
 * cuyo intervalo (mínimo y máximo) se indica como parámetro.
 */
function generaArrayInt($size,$min,$max){
    for ($i=0; $i < $size; $i++) { 
        $myArray[$i]=rand($min,$max);
    }
    return $myArray;
}

/**
 * Devuelve el mínimo del array que se pasa como parámetro.
 */
function minimoArrayInt($myArray){
    return min($myArray);
}

/**
 * Devuelve el maximo del array que se pasa como parámetro.
 */
function maximoArrayInt($myArray){
    return max($myArray);
}

/**
 * Devuelve la media del array que se pasa como parámetro.
 */
function mediaArrayInt($myArray){
    if(count($myArray)){
        $myArray=array_filter($myArray);
        return array_sum($myArray)/count($myArray);
    }
}

/**
 * Devuelve verdadero si $value se encuentra en $myArray
 */
function estaEnArrayInt($myArray,$value){
    return in_array($value,$myArray);
}

/**
 * Busca un numero en un array y devuelve un array con las 
 * posiciones en las que se encuentra
 */
function posicionEnArray($myArray,$value){
    //una ocurrencia
    //return array_search($value,$myArray);
    $cont=0;
    $position[0]=-1;
    foreach ($myArray as $key => $val) {
        if($value == $val){
            $position[$cont]=$key;
            $cont++;
        }
    }
    return $position;
}

/**
 * Devuelve el array rotado
 */
function volteaArrayInt($myArray){
    return array_reverse($myArray);
}

/**
 * Rota $n posiciones a la derecha los numeros de un array
 */
function rotaDerechaArrayInt($myArray,$n){
    $a=$myArray;
    for ($i=0; $i < $n; $i++) { 
        array_unshift($a,array_pop($a));
    }
    return $a;
}

/**
 * Rota $n positiones a la izquierda los nuemros de un array
 */
function rotaIzquierdaArrayInt($myArray,$n){
    $a=$myArray;
    for ($i=0; $i < $n; $i++) { 
        array_push($a,array_shift($a));
    }
    return $a;
}
