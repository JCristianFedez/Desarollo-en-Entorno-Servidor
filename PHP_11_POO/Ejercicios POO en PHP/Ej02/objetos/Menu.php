<?php 

class Menu {

    private $titulo;
    private $enlace;

    public function __construct($titulo,$enlace){
        $this->titulo[] = $titulo;
        $this->enlace[] = $enlace;
    }

    public function addElement($titulo,$enlace){
        $this->titulo[] = $titulo;
        $this->enlace[] = $enlace;
    }

    public function verHorizontal(){
        
        $str = "";

        for($i = 0;$i < count($this->titulo);$i++){
            $str.="<a href='".$this->enlace[$i]."'>".$this->titulo[$i]."</a> |";
        }
        return $str;
    }

    public function verVertical(){
        $str = "";

        for($i = 0;$i < count($this->titulo);$i++){
            $str.="<a href='".$this->enlace[$i]."'>".$this->titulo[$i]."</a><br>";
        }
        return $str;
    }
}