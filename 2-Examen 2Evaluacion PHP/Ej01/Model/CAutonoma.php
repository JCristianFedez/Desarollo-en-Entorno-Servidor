<?php 
require_once "FansDB.php";

class CAutonoma{

    private $id;
    private $nombre;

    public function __construct($id="",$nombre=""){
        $this->id = $id;
        $this->nombre = $nombre;
    }

    public static function getCAutonomas(){
        $conexion = FansDB::connectDB();
        $comunidades = [];

        $seleccion = "SELECT * FROM comunidades";

        $consulta = $conexion->query($seleccion);


        while($com = $consulta->fetchObject()){
            $comunidades[] = 
                $com->nombre
            ;
        }

        return $comunidades;
    }

    /**
     * Get the value of nombre
     */ 
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set the value of nombre
     *
     * @return  self
     */ 
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }
}

?>