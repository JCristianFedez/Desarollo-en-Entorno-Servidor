<?php

// Devuelve verdadero si el número que se pasa como parámetro es capicúa y falso
// en caso contrario
function esCapicua($num){
    return (strrev($num)==$num)?true:false;
}