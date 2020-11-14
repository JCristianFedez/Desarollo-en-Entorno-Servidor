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
 * Binario a Octal
 */
function binaryToOctal($binary){
    return base_convert($binary,2,8);
}

/**
 * Binario a Hexadecimal
 */
function binaryToHex($binary){
    return base_convert($binary,2,16);
}

/**
 * Octal a Binario
 */
function octalToBinary($octal){
    return base_convet($octal,8,2);
}

/**
 * Octal a Decimal
 */
function octalToDecimal($octal){
    return base_convert($octal,8,10);
}
/**
 * Octal a Hexadecimal
 */
function octalToHex($octal){
    return base_convert($octal,8,16);
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

/**
 * Decimal a Octal
 */
function decimalToOctal($decimal){
    return base_convert($decimal,10,8);
}
/**
 * Decimal a Hexadeicmal
 */
function decimalToHex($decimal){
    return base_convert($decimal,10,16);
}

/**
 * Hexadecimal a Binario
 */
function hexToBinary($hex){
    return base_convert($hex,16,2);
}
/**
 * Hexadecimal a Octal
 */
function hexToOctal($hex){
    return base_convert($hex,16,8);
}
/**
 * Hexadecimal a Decimal
 */
function hexToDecimal($hex){
    return base_convert($hex,16,10);
}