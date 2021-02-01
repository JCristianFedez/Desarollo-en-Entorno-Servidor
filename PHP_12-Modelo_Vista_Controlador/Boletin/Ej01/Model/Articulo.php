<?php 

require_once "BlogDB.php";

class Articulo{

    private $id;
    private $titulo;
    private $fecha;
    private $contenido;

    function __construct($id,$titulo="",$contenido=""){
        if(isset($id)){
            $this->id = $id;
        }
        $this->titulo = $titulo;
        $this->fecha = date("d/m/Y");
        $this->contenido = $contenido;
    }

    public function insert(){
        $conexion = BlogDB::connectDB();
        $inserccion = 
        "INSERT INTO articulo (titulo,fecha,contenido)
        VALUES ($this->titulo,$this->fecha,$this->contenido);";
    
        $conexion->exec($inserccion);
    }

    public function delete(){
        $conexion = BlogDB::connectDB();
        $borrado = "DELETE FROM artiuclo
        WHERE id=$this->id;";

        $conexion->exec($borrado);
    }

    public function getArticulos(){
        $conexion = BlogDB::connectDB();
        $seleccion = "SELECT * FROM articulo";
        $consulta = $conexion->query($seleccion);

        $articulos = [];
        //TODO: TERMINAR ESTE 
    }

    public function getId(){
        return $this->id;
    }

    public function setId($id){
        $this->id = $id;
        return $this;
    }

    public function getTitulo(){
        return $this->titulo;
    }

    public function setTitulo($titulo){
        $this->titulo = $titulo;
        return $this;
    }

    public function getFecha(){
        return $this->fecha;
    }

    public function setFecha($fecha){
        $this->fecha = $fecha;
        return $this;
    }

    public function getContenido(){
        return $this->contenido;
    }

    public function setContenido($contenido){
        $this->contenido = $contenido;
        return $this;
    }
}


?>