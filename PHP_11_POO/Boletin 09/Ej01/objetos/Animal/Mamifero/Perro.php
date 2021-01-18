<?php 
require_once "Mamifero.php";

class Perro extends Mamifero {
    private $raza;

    public function __construct($sexo="Macho",$alimentacion="Omnivoro",$colorPelo="Marron",$raza="Desconocida"){
        ($sexo!="")?:$sexo="Macho";
        ($alimentacion!="")?:$alimentacion="Omnivoro";
        ($colorPelo!="")?:$colorPelo="Marron";
        ($raza!="")?:$raza="Desconocida";
        parent::__construct($sexo,$alimentacion,$colorPelo);
        $this->raza = $raza;
    }

    public function ladra(){
        return "guau";
    }

    /**
     * Get the value of raza
     */ 
    public function getRaza()
    {
        return $this->raza;
    }

    /**
     * Set the value of raza
     *
     * @return  self
     */ 
    public function setRaza($raza)
    {
        $this->raza = $raza;

        return $this;
    }
}

?>