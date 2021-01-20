<?php 
include_once "Animal.php";

class Mamifero extends Animal{

    public function __construct($s){
        parent::__construct($s);
    }

    public function cuidaBebe(){
        return "Estoy cuidando a mis crias";
    }

    public function corre(){
        return "FIUUUUUUUUUUU";
    }
}

?>