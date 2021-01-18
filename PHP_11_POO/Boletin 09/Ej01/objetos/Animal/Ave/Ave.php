<?php 
require_once(__DIR__."/../Animal.php");

abstract class Ave extends Animal {
    
    private $colorPluma;
    
    public function __construct($s,$a,$colorPluma){
        parent::__construct($s,$a);
        $this->colorPluma = $colorPluma;
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

    public function ponHuevo(){
        return "ya casi";
    }    

    public function __toString(){
        return parent::__toString()." has alimentado a un ave";
    }
}
?>