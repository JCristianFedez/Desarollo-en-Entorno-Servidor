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

    public static function getLibroByNombre($nombre){
        $conexion = BibliotecaDB::connectDB();
        $seleccion = "SELECT * FROM libro WHERE titulo LIKE \"%".$nombre."%\"";
        $consulta = $conexion->query($seleccion);
        $registro = $consulta->fetchObject();

        if(empty($registro)){
            return 0;
        }
        
        while($lib = $consulta->fetchObject()){
            $libros[] =[
                "Isbn" => $lib->isbn,
                "Titulo" => $lib->titulo,
                "Estado" => $lib->estado,
                "Cliente" => $lib->cliente
            ];
        }

        return $libros;
    }

    public static function getLibroByEstado($estado){
        $conexion = BibliotecaDB::connectDB();
        $seleccion = "SELECT * FROM libro WHERE estado='$estado'";
        $consulta = $conexion->query($seleccion);
        $registro = $consulta->fetchObject();

        if(empty($registro)){
            return 0;
        }
        
        while($lib = $consulta->fetchObject()){
            $libros[] =[
                "Isbn" => $lib->isbn,
                "Titulo" => $lib->titulo,
                "Estado" => $lib->estado,
                "Cliente" => $lib->cliente
            ];
        }

        return $libros;
    }

    public static function getLibroByEstadoMasNombre($estado,$nombre){
        $conexion = BibliotecaDB::connectDB();
        $seleccion = "SELECT * FROM libro WHERE estado='$estado' AND titulo LIKE '%$nombre%'";
        $consulta = $conexion->query($seleccion);
        $registro = $consulta->fetchObject();

        if(empty($registro)){
            return 0;
        }
        
        while($lib = $consulta->fetchObject()){
            $libros[] =[
                "Isbn" => $lib->isbn,
                "Titulo" => $lib->titulo,
                "Estado" => $lib->estado,
                "Cliente" => $lib->cliente
            ];
        }

        return $libros;
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