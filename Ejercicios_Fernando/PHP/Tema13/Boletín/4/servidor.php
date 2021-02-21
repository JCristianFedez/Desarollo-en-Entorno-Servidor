<?php

$codeError = 0;
$errorMsg = "Cartas generadas correctamente";

if(isset($_REQUEST['c'])){

    $count = $_REQUEST['c'];

    if($count < 0 || $count > 40){
        $codeError = 2;
        $errorMsg = 'Debes introducir un número mayor que 0 y menor que 40.';

        $resp = [
            'cartas' => "",
            'error' => $codeError,
            'errorMsg' => $errorMsg
        ];

    }else{

        $palos =['oros', 'copas', 'espadas', 'bastos'];
        $numeros = [1, 2, 3, 4, 5, 6, 7, 10, 11, 12];
        $cartas = [];

        for($i=0; $i<$count; $i++){
            do{
                $determinarPalo = rand(0, (count($palos)-1));
                $determinarNumero = rand(0, (count($numeros)-1));
                $carta = $numeros[$determinarNumero].' de '.$palos[$determinarPalo];
    
            }while(in_array($carta, $cartas));
            
            $cartas[] = $carta;

        }

        $resp = ['cartas' => $cartas,'error' => $codeError,'errorMsg' => $errorMsg];
    }

}

echo json_encode($resp);