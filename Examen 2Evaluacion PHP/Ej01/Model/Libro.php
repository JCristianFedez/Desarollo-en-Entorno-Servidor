<?php 
require_once "BibliotecaDB.php";


class Libro{

    private $isbn;
    private $titulo;
    private $estado;
    private $cliente;

    public function __construct($isbn="",$titulo="",$estado="",$cliente=""){
        $this->isbn = $isbn;
        $this->titulo = $titulo;
        $this->estado = $estado;
        $this->cliente = $cliente;
    }

    public static function getLibros(){
        $conexion = BibliotecaDB::connectDB();
        $seleccion = "SELECT * FROM libro";
        $consulta = $conexion->query($seleccion);

        $libros = [];

        while($lib = $consulta->fetchObject()){
            $libros[] = new Libro(
                $lib->isbn,
                $lib->titulo,
                $lib->estado,
                $lib->cliente
            );
        }

        return $libros;
    }

    public static function getLibroByIsbn($isbn){
        $conexion = BibliotecaDB::connectDB();
        $seleccion = "SELECT * FROM libro WHERE isbn='$isbn'";
        $consulta = $conexion->query($seleccion);
        $registro = $consulta->fetchObject();

        if(empty($registro)){
            return 0;
        }

        $libro = new Libro(
            $registro->isbn,
            $registro->titulo,
            $registro->estado,
            $registro->cliente
        );

        return $libro;
    }

    public function alquilar($cliente){        
        if($this->estado == "alquilado"){
            return 0;
        }

        $this->estado = "alquilado";
        $this->cliente = $cliente;
        $this->update();
    }

    public function devolver($cliente){
        if($this->estado == "libre"){
            return 0;
        }

        if($this->cliente != $cliente){
            return 0;
        }

        $this->estado = "libre";
        $this->cliente = Null;
        $this->update();
        
    }

    public function update(){
        $conexion = BibliotecaDB::connectDB();
        $actualizar = "UPDATE libro
        SET isbn='$this->isbn',
            titulo='$this->titulo',
            estado='$this->estado',
            cliente='$this->cliente'
        WHERE isbn='$this->isbn'";
        $conexion->exec($actualizar);
    }

    /**
     * Get the value of isbn
     */ 
    public function getIsbn()
    {
        return $this->isbn;
    }

    /**
     * Set the value of isbn
     *
     * @return  self
     */ 
    public function setIsbn($isbn)
    {
        $this->isbn = $isbn;

        return $this;
    }

    /**
     * Get the value of titulo
     */ 
    public function getTitulo()
    {
        return $this->titulo;
    }

    /**
     * Set the value of titulo
     *
     * @return  self
     */ 
    public function setTitulo($titulo)
    {
        $this->titulo = $titulo;

        return $this;
    }

    /**
     * Get the value of estado
     */ 
    public function getEstado()
    {
        return $this->estado;
    }

    /**
     * Set the value of estado
     *
     * @return  self
     */ 
    public function setEstado($estado)
    {
        $this->estado = $estado;

        return $this;
    }

    /**
     * Get the value of cliente
     */ 
    public function getCliente()
    {
        return $this->cliente;
    }

    /**
     * Set the value of cliente
     *
     * @return  self
     */ 
    public function setCliente($cliente)
    {
        $this->cliente = $cliente;

        return $this;
    }
}

?>