<?php 
require_once(__DIR__."/../Animal.php");

abstract class Mamifero extends Animal {
    
    private $colorPelo;
    
    public function __construct($sexo,$alimentacion,$colorPelo){
        parent::__construct($sexo,$alimentacion);
        $this->colorPelo = $colorPelo;
    }
    
    public function mama(){
        return "esta mamando";
    }    

    public function __toString(){
        return parent::__toString()." has alimentado a un mamifero";
    }

    /**
     * Get the value of colorPelo
     */ 
    public function getColorPelo()
    {
        return $this->colorPelo;
    }

    /**
     * Set the value of colorPelo
     *
     * @return  self
     */ 
    public function setColorPelo($colorPelo)
    {
        $this->colorPelo = $colorPelo;

        return $this;
    }
}
?>