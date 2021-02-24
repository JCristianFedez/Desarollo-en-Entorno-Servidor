<?php 
$nuevo = [
    ["nombre"=>"cristian","ap"=>"fernandez"],
    ["nombre"=>"nuevoNombre","ap"=>"nuevoAp"]
];

$result = "";
$guardar;
if(file_exists("fichero.csv")){

    // Compruebo si existen los registros,
    // Y los elimino o los almaceno
    $handle = fopen("fichero.csv","r");

    while(($line = fgetcsv($handle)) !== false){

        // Compruebo si existe y si existe lo elimino del array
        foreach ($nuevo as $key => $n) {
            if($n["nombre"] == $line[0]){
                unset($nuevo[$key]);
                break;
            }
        }

        // Almaceno las ya existentes
        $result .= implode(",",$line).PHP_EOL;
        
    }
    fclose($handle);

    // Guardo los registros
    $handle = fopen("fichero.csv","w");
    fwrite($handle,$result);

    // Guardo las nuevas
    foreach ($nuevo as $key => $n) {
        fwrite($handle,(implode(",",$n).",1".PHP_EOL));
    }
    fclose($handle);

}else{
    $handle = fopen("fichero.csv","w");
    foreach ($nuevo as $key => $n) {
        fwrite($handle,(implode(",",$n).",1".PHP_EOL));
    }
    fclose($handle);
}


print_r($nuevo);
?>