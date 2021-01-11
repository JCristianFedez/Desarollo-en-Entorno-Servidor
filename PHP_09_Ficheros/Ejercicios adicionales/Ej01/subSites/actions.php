<?php 
if(session_status()==PHP_SESSION_NONE){
    session_start();
}
$URL_FILE="..\data_files\mascotas.txt";

if(!isset($_REQUEST["action"]) || !isset($_SESSION["animales"])){
header("Location:../Ej01.php");

}else{

    $name=$_REQUEST["name"];
    $specie=$_REQUEST["specie"];
    $age=$_REQUEST["age"];
        switch($_REQUEST["action"]){
            case "add":
                $_SESSION["animales"][$name]=["especie"=>$specie,"edad"=>$age];

                $_SESSION["newAnimals"][$name]=["especie"=>$specie,"edad"=>$age];
                header("Location:addPet.php?newPet=true");
                break;
                
            case "save":
                $file=fopen($URL_FILE,"a");

                $fecha=date("#d-m-Y#");

                //Si no se encuentra la fecha se introduce
                $lineasAux=file($URL_FILE);
                if(!in_array($fecha.PHP_EOL,$lineasAux)){
                    fwrite($file,PHP_EOL.$fecha);
                }

                foreach($_SESSION["newAnimals"] as $name => $info){
                    $row=$name;
                    foreach($info as $propiety){
                        $row.="-$propiety";
                    }
                    fwrite($file,PHP_EOL.$row);
                }

                fclose($file);
                unset($_SESSION["newAnimals"]);
                header("Location:../Ej01.php");
                break;
        } 
}
?>