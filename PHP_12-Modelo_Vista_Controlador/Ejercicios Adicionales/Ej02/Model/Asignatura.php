<?php 

require_once "EscuelaDB.php";

class Asignatura{

    private $id;
    private $nombre;

    public function __construct($id="",$nombre=""){
        $this->id = $id;
        $this->nombre = $nombre;
    }

    public function insert(){
        $conexion = EscuelaDB::connectDB();
        $inserccion = "INSERT INTO asignatura (id,nombre)
        VALUES ('$this->id','$this->nombre');";
        $conexion->exec($inserccion);
    }

    public function delete(){
        $conexion = EscuelaDB::connectDB();
        $borrado = "DELETE FROM asignatura
        WHERE id='$this->id';";
        $conexion->exec($borrado);
    }

    public function update(){
        $conexion = EscuelaDB::connectDB();
        $actualizar = "UPDATE asignatura
        SET id='$this->id',
            nombre='$this->nombre'
        WHERE id='$this->id';";
        $conexion->exec($actualizar);
    }

    public static function getAsignaturas(){
        $conexion = EscuelaDB::connectDB();
        $seleccion = "SELECT * FROM asignatura";
        $consulta = $conexion->query($seleccion);

        $asignaturas = [];

        while($asig = $consulta->fetchObject()){
            $asignaturas[] = new Asignatura(
                $asig->id,
                $asig->nombre
            );
        }

        return $asignaturas;
    }

    public static function getAsignaturaById($id){
        $conexion = EscuelaDB::connectDB();
        $seleccion = "SELECT * FROM asignatura WHERE id='$id'";
        $consulta = $conexion->query($seleccion);
        $registro = $consulta->fetchObject();

        if(empty($registro)){
            return false;
        }

        $asignatura = new Asignatura(
            $registro->id,
            $registro->nombre
        );

        return $asignatura;
    }

    public function getNombre(){
        return $this->nombre;
    }

    public function setNombre($nombre){
        $this->nombre = $nombre;
        return $this;
    }

    public function getId(){
        return $this->id;
    }

    public function setId($id){
        $this->id = $id;
        return $this;
    }
}

?>