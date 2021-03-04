<?php 
require_once "FansDB.php";

if(session_status() == PHP_SESSION_NONE){
    session_start();
}

if (!isset($_SESSION['operaciones'])) {
    $_SESSION['operaciones']=0;
}

class Socio{

    private $id;
    private $nombre;
    private $puntos;
    private $comunidad;

    public function __construct($id="",$nombre="",$puntos="",$comunidad=""){
        $this->id = $id;
        $this->nombre = $nombre;
        $this->puntos = $puntos;
        $this->comunidad = $comunidad;
    }

    /**
     * Devuelve un array del objeto Socio con
     * todos los socios de la BD
     */
    public static function getFans(){
        $conexion = FansDB::connectDB();
        $seleccion = "SELECT * FROM socios";
        $consulta = $conexion->query($seleccion);

        $socios = [];

        while($soc = $consulta->fetchObject()){
            $socios[] = new Socio(
                $soc->id,
                $soc->nombre,
                $soc->puntos,
                $soc->comunidad
            );
        }

        return $socios;
    }

    /**
     * Devuelve un objeto Socio el cual tiene la id
     * pasada como parametro
     */
    public static function getSocioById($id){
        $conexion = FansDB::connectDB();
        $seleccion = "SELECT * FROM socios WHERE id='$id'";
        $consulta = $conexion->query($seleccion);
        $registro = $consulta->fetchObject();

        if(empty($registro)){
            return 0;
        }

        $socio = new Socio(
            $registro->id,
            $registro->nombre,
            $registro->puntos,
            $registro->comunidad
        );

        return $socio;
    }

    /**
     * Devuelve un array del objeto Socio, el cual
     * contiene los n socios ordenados por puntos
     * de forma DESC, n socios es el parametro que se pasa
     */
    public static function getTopSocios($cant){
        $conexion = FansDB::connectDB();
        $seleccion = "SELECT * FROM socios ORDER BY puntos DESC LIMIT $cant";
        $consulta = $conexion->query($seleccion);

        $socios = [];

        while($soc = $consulta->fetchObject()){
            $socios[] = new Socio(
                $soc->id,
                $soc->nombre,
                $soc->puntos,
                $soc->comunidad
            );
        }

        return $socios;
    }

    /**
     * Devuelve la cantidad de operaciones que se han realizado
     */
    public static function getOperaciones(){
        if ($_SESSION['operaciones']) {
            return $_SESSION['operaciones'];
        } else {
            return 0;
        }
    }

    /**
     * Resetea las operaciones
     */
    public static function resetOperaciones(){
        $_SESSION['operaciones'] = 0;
        return 0;
    }

    /**
     * Suma 5 puntos
     */
    public function sumarPuntos(){        
        $this->puntos += 5;
        $this->update();

        $_SESSION['operaciones']++;
    }

    /**
     * Inserta el Socio en la BD
     */
    public function insert() {
        $conexion = FansDB::connectDB();
        $insercion = "INSERT INTO socios (nombre, puntos, comunidad) VALUES ('$this->nombre', '$this->puntos', '$this->comunidad')";
        $conexion->exec($insercion);
        $_SESSION['operaciones']++;
    }

    /**
     * Elimina el Socio de la BD
     */
    public function delete(){
        $conexion = FansDB::connectDB();
        $borrado = "DELETE FROM socios WHERE id='$this->id'";
        $conexion->exec($borrado);
        $_SESSION['operaciones']++;
    }

    /**
     * Actualiza el Socio de la BD con los valores
     * del objeto Socio
     */
    public function update(){
        $conexion = FansDB::connectDB();
        $actualizar = "UPDATE socios
        SET id='$this->id',
            nombre='$this->nombre',
            puntos='$this->puntos',
            comunidad='$this->comunidad'
        WHERE id='$this->id'";
        $conexion->exec($actualizar);
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
     * Get the value of puntos
     */ 
    public function getPuntos()
    {
        return $this->puntos;
    }

    /**
     * Set the value of puntos
     *
     * @return  self
     */ 
    public function setPuntos($puntos)
    {
        $this->puntos = $puntos;

        return $this;
    }

    /**
     * Get the value of comunidad
     */ 
    public function getComunidad()
    {
        return $this->comunidad;
    }

    /**
     * Set the value of comunidad
     *
     * @return  self
     */ 
    public function setComunidad($comunidad)
    {
        $this->comunidad = $comunidad;

        return $this;
    }
}

?>