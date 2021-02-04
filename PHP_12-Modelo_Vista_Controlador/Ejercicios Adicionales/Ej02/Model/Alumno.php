<?php 

require_once "EscuelaDB.php";

class Alumno{

    private $matricula;
    private $nombre;
    private $apellidos;
    private $curso;

    public function __construct($matricula="",$nombre="",$apellidos="",$curso=""){
        $this->matricula = $matricula;
        $this->nombre = $nombre;
        $this->apellidos = $apellidos;
        $this->curso = $curso;
    }

    public function insert(){
        $conexion = EscuelaDB::connectDB();
        $inserccion = "INSERT INTO alumno (matricula,nombre,apellidos,curso)
        VALUES ('$this->matricula','$this->nombre','$this->apellidos','$this->curso');";
        $conexion->exec($inserccion);
    }

    public function delete(){
        $conexion = EscuelaDB::connectDB();
        $borrado = "DELETE FROM alumno
        WHERE matricula='$this->matricula';";
        $conexion->exec($borrado);
    }

    public function update(){
        $conexion = EscuelaDB::connectDB();
        $actualizar = "UPDATE alumno
        SET matricula='$this->matricula',
            nombre='$this->nombre',
            apellidos='$this->apellidos',
            curso='$this->curso'
        WHERE matricula='$this->matricula';";
        $conexion->exec($actualizar);
    }

    public static function getAlumnos(){
        $conexion = EscuelaDB::connectDB();
        $seleccion = "SELECT * FROM alumno";
        $consulta = $conexion->query($seleccion);

        $alumnos = [];

        while($alum = $consulta->fetchObject()){
            $alumnos[] = new Alumno(
                $alum->matricula,
                $alum->nombre,
                $alum->apellidos,
                $alum->curso
            );
        }

        return $alumnos;
    }

    public static function getAlumnoByMatricula($matricula){
        $conexion = EscuelaDB::connectDB();
        $seleccion = "SELECT * FROM alumno WHERE matricula='$matricula'";
        $consulta = $conexion->query($seleccion);
        $registro = $consulta->fetchObject();

        if(empty($registro)){
            return false;
        }

        $alumno = new Alumno(
            $registro->matricula,
            $registro->nombre,
            $registro->apellidos,
            $registro->curso
        );

        return $alumno;
    }

    public function getMatricula(){
        return $this->matricula;
    }

    public function setMatricula($matricula){
        $this->matricula = $matricula;
        return $this;
    }

    public function getNombre(){
        return $this->nombre;
    }

    public function setNombre($nombre){
        $this->nombre = $nombre;
        return $this;
    }

    public function getApellidos(){
        return $this->apellidos;
    }

    public function setApellidos($apellidos){
        $this->apellidos = $apellidos;
        return $this;
    }

    public function getCurso(){
        return $this->curso;
    }

    public function setCurso($curso){
        $this->curso = $curso;
        return $this;
    }
}
?>