<?php 
//Mostrara mensage al añadir un cliente
$mesage="";
if(isset($_SESSION["error"])){
    switch($_SESSION["error"]){
        case 0:
            $mesage=
            "<div class='correct-add'>
                Producto añadido correctamente
            </div>";
            break;
        case 3:
            $mesage=
            "<div class='error-add'>
                No se ha podido añadir el producto
            </div>";
            break;
    }
}

unset($_SESSION["error"]);
 ?>