<?php

/**
 * Transforma un numero binario a decimal
 */
function binaryToDecimal($binary){
    $value=1;
    $myDecimal=0;
    for ($i=0; $i < strlen($binary); $i++) { 
        $myDecimal+=($binary[$i]==1)?$value:0;
        $value*=2;
    }
    return $myDecimal;
}

/**
 * Transoforma un numero deimal a binario
 */
function decimalToBinary($decimal){
    if($decimal==0){
        return 0;
    }else{
        return ($decimal % 2 + 10 * decimalToBinary($decimal/2));
    }
}