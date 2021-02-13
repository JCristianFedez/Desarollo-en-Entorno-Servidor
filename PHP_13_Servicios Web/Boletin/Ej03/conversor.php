<?php 

// p = Pesetas a euros
// e = Eruos a pesetas

if(isset($_REQUEST["p"])){
    $euros = round($_REQUEST["p"]/166.3860 , 2);
    $conversion = [
        "pesetas" => $_REQUEST["p"],
        "euros" => $euros
    ];
}else if(isset($_REQUEST["e"])){
    $pesetas = round($_REQUEST["e"] * 166.0860);

    $conversion = [
        "pesetas" => $pesetas,
        "euros" => $_REQUEST["e"]
    ];
}else{
    $conversion = [
        "Error" => "Peticion mal realizada"
    ];
}
echo json_encode($conversion);
?>