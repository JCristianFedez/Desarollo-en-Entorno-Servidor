<?php 

require_once "BlogDB.php";

class Articulo{

    private $id;
    private $titulo;
    private $contenido;
    private $fecha;

    function __construct($id="",$titulo="",$contenido="",$fecha=""){
        $this->id = $id;
        $this->titulo = $titulo;
        $this->contenido = $contenido;
        $this->fecha = $fecha;
    }

    public function insert(){
        $conexion = BlogDB::connectDB();
        $inserccion = 
        "INSERT INTO articulo (titulo,contenido,fecha)
        VALUES ('$this->titulo','$this->contenido',NOW());";
    
        $conexion->exec($inserccion);
    }

    public function delete(){
        $conexion = BlogDB::connectDB();
        $borrado = "DELETE FROM articulo
        WHERE id=$this->id;";

        $conexion->exec($borrado);
    }

    public function update(){
        $conexion = BlogDB::connectDB();
        $actualizar = "UPDATE articulo
        SET titulo='$this->titulo',
            contenido='$this->contenido',
            fecha=NOW()
        WHERE id='$this->id'";

        $conexion->exec($actualizar);
    }

    public static function getArticulos(){
        $conexion = BlogDB::connectDB();
        $seleccion = "SELECT * FROM articulo ORDER BY fecha";
        $consulta = $conexion->query($seleccion);

        $articulos = [];
        
        while($registro = $consulta->fetchObject()){
            $articulos[] = new Articulo(
                $registro->id,
                $registro->titulo,
                $registro->contenido,
                $registro->fecha
            );
        }

        return $articulos;
    }

    public static function getArticuloById($id){
        $conexion = BlogDB::ConnectDB();
        $seleccion = "SELECT * FROM articulo WHERE id=$id";
        $consulta = $conexion->query($seleccion);
        $registro = $consulta->fetchObject();

        $articulo = new Articulo(
            $registro->id,
            $registro->titulo,
            $registro->contenido,
            $registro->fecha
        );

        return $articulo;
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