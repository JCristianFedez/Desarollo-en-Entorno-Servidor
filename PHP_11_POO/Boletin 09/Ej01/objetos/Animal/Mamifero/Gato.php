<?php 
require_once "Mamifero.php";

class Gato extends Mamifero {
    private $raza;
    private $colorPelo;
    private $alimentacion;
    private $sexo;

    public function __construct($sexo="Macho",$alimentacion="Omnivoro",$colorPelo="Marron",$raza="Desconocida"){
        ($sexo!="")?:$sexo="Macho";
        ($alimentacion!="")?:$alimentacion="Omnivoro";
        ($colorPelo!="")?:$colorPelo="Marron";
        ($raza!="")?:$raza="Desconocida";
        parent::__construct($sexo,$alimentacion,$colorPelo);
        $this->raza = $raza;
    }

    public function mauya(){
        return "miau";
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

    /**
     * Get the value of alimentacion
     */ 
    public function getAlimentacion()
    {
        return $this->alimentacion;
    }

    /**
     * Set the value of alimentacion
     *
     * @return  self
     */ 
    public function setAlimentacion($alimentacion)
    {
        $this->alimentacion = $alimentacion;

        return $this;
    }

    /**
     * Get the value of sexo
     */ 
    public function getSexo()
    {
        return $this->sexo;
    }

    /**
     * Set the value of sexo
     *
     * @return  self
     */ 
    public function setSexo($sexo)
    {
        $this->sexo = $sexo;

        return $this;
    }
}

?>