<?php  
$baraja = [
    "Oro" => ["1","2","3","4","5","6","7","Sota","Caballo","Rey"],
    "Copa" => ["1","2","3","4","5","6","7","Sota","Caballo","Rey"],
    "Espada" => ["1","2","3","4","5","6","7","Sota","Caballo","Rey"],
    "Basto" => ["1","2","3","4","5","6","7","Sota","Caballo","Rey"]
];


if(isset($_REQUEST["cant"])){

    if($_REQUEST["cant"]<=0 || $_REQUEST["cant"]>40){

        $devolver = ["Error" => "Parameter ?cant not valid"];

    }else{

        $devolver = [];


        for ($i=0; $i < $_REQUEST["cant"]; $i++) { 
            $palo = array_rand($baraja); // Recojo el palo
            $posicion = array_rand($baraja[$palo]); // Recojo la posicion en el palo
            $numero = $baraja[$palo][$posicion]; // Recojo la carta correspondiente
            $devolver[$palo][] = $numero; // La guardo
            unset($baraja[$palo][$posicion]); // La elimino de la baraja
            // $baraja[$palo] = array_values($baraja[$palo]); // Reorganizo la baraja
            
            // Si no queda mas cartas de un palo se elimina el palo
            if(count($baraja[$palo]) == 0){
                unset($baraja[$palo]);
            }
        }
    }

}else{
    $devolver = ["Error" => "Paramet ?cant inexistent"];
}
echo json_encode($devolver);
?>