<?php

// Devuelve verdadero si el número que se pasa como parámetro es capicúa y falso
// en caso contrario
function esCapicua($num)
{
    return (strrev($num)==$num)?true:false;
}

// : Devuelve verdadero si el número que se pasa como parámetro es primo y falso en
// caso contrario.
function esPrimo($num)
{
    if ($num==0 || $num==1) {
        return true;
    }
    
    if ($num<1) {
        throw new Exception("El numero no puede ser negativo");
    }
    
    for ($i=2; $i < $num; $i++) {
        if ($num%$i==0) {
            return false;
        }
    }
    return true;
}

// Devuelve el menor primo que es mayor al número que se pasa como
//parámetro.
function siguientePrimo($num)
{
    if ($num==0) {
        return 1;
    }

    if ($num<1) {
        throw new Exception("El numero no puede ser negativo");
    }

    do {
        $num++;
        $noPrimo=false;
        for ($i=2; $i < $num; $i++) {
            if ($num%$i==0) {
                $noPrimo=true;
            }
        }
    } while ($noPrimo);

    return $num;
}

//Dada una base y un exponente devuelve la potencia.
function potencia($b, $e)
{
    return pow($b, $e);
}

// Cuenta el número de dígitos de un número entero.
function digitos($num)
{
    return strlen(abs($num));
}

//Le da la vuelta a un número
function voltea($num)
{
    if ($num>=0) {
        return strrev($num);
    } else {
        return "-".strrev(abs($num));
    }
}

// Devuelve el dígito que está en la posición n de un número entero. Se empieza
// contando por el 0 y de izquierda a derecha.
function digitoN($num, $posDig)
{
    if (strlen(abs($num))<=$posDig || $posDig<0) {
        return -1;
    }
    if(!is_numeric($num) || !is_numeric($posDig)){
        throw new Exception("Has introducido texto en vez de numero");
    }
    if ($num<0) {
        return substr(abs($num), $posDig, 1);
    } else {
        return substr($num, $posDig, 1);
    }
}

/**
 *  Da la posición de la primera ocurrencia de un dígito dentro de un número 
 * entero. Si no se encuentra, devuelve -1.
 */
function posicionDeDigito($num, $dig){
    return strpos($num,$dig);
}

/**
 * Le quita a un número n dígitos por detrás (por la derecha).
 */
function quitaPorDetras($num,$dig){
    return substr($num,0,-$dig);
}

/**
 * Le quita a un número n dígitos por delante (por la derecha).
 */
function quitaPorDelante($num,$dig){
    return substr($num,$dig);
}

/**
 * Añade un digito a un numero por detras
 */
function pegaPorDetras($n1,$n2){
    return $n1.$n2;
}
/**
 * Añade un digito a un numero por delante
 */
function pegaPorDelante($n1,$n2){
    return $n2.$n1;
}
/**
 * Toma como parámetros las posiciones start y end 
 * dentro de un número y devuelve el trozo correspondiente,
 * incluyendo ambas posiciones
 */
function trozoDeNumero($num,$start,$end){
    if($start>$end){
        new Exception ("El start no puede ser mayor al end");
    }

    if($start<0 || $end<0){
        return -1;
    }

    if($end>strlen($num)){
        $end=strlen($num);
    }

    return substr($num,$start,($end-$start)+1);
}

/**
 * Pega dos numeros para formar uno
 */
function juntaNumeros($n1,$n2){
    return $n1.$n2;
}