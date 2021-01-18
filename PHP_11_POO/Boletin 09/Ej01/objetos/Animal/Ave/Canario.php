<?php 
require_once "Ave.php";

class Canario extends Mamifero {
    private $colorPluma;

    public function __construct($sexo="Macho",$alimentacion="Omnivoro",$colorPluma="Marron",$raza="Desconocida"){
        ($sexo!="")?:$sexo="Macho";
        ($alimentacion!="")?:$alimentacion="Omnivoro";
        ($colorPelo!="")?:$colorPelo="Marron";
        ($raza!="")?:$raza="Desconocida";
        parent::__construct($sexo,$alimentacion,$colorPelo);
        $this->raza = $raza;
    }

    public function pia(){
        return "pio";
    }
    

    /**
     * Get the value of colorPluma
     */ 
    public function getColorPluma()
    {
        return $this->colorPluma;
    }

    /**
     * Set the value of colorPluma
     *
     * @return  self
     */ 
    public function setColorPluma($colorPluma)
    {
        $this->colorPluma = $colorPluma;

        return $this;
    }
}

?>