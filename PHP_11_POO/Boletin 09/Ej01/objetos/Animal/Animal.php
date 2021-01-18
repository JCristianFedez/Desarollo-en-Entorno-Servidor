<?php 
abstract class Animal {
    private $sexo;
    private $alimentacion;
    
    public function __construct($s,$a){
        $this->sexo = $s;
        $this->alimentacion = $a;
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

    public function __toString(){
        return "Sexo : $this->sexo";
    }

    public function duerme(){
        return "zzzzzzz";
    }

    public function come(){
        return "ñam ñam";
    }

}

?>