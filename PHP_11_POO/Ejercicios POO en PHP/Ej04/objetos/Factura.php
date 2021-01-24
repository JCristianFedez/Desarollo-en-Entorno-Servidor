<?php

class Factura{

    private static $IVA = 21;
    private $importeBase = 0;
    private $fecha;
    private $estado = "Pendiente";
    private $productos = [];

    public function __construct($fecha){
        $this->fecha = (isset($fecha))?$fecha:date("d-m-y");
    }

    public function agregarProducto($producto){
        $this->productos[] = $producto;
        $this->importeBase += $producto["precio"]*$producto["cantidad"];
    }

    public function imprimeFactura(){
        if($this->productos){
            $str = "<table>";
            $str .= "<tr><td colspan=4>Fecha: ".$this->fecha."</td></tr>";
            $str .= "<tr><td colspan=4>Estado: ".$this->estado."</td></tr>";
            $str .= "<tr><th>Productos</th><th>Und</th><th>€/U</th><th>Total</th></tr>";
            foreach ($this->productos as $producto) {
                $str .= "<tr>";
                foreach($producto as $info){
                    $str .= "<td>$info</td>";
                }
                $str .= "<td>".($producto["precio"]*$producto["cantidad"])."</td>";
                $str .= "</tr>";
            }
            $str .= "<tr><td colspan=3>Importa Base</td><td>".$this->importeBase."</td></tr>";
            $str .= "<tr><td colspan=3>Iva:</td><td>".Factura::$IVA."%</td></tr>";
            $str .= "<tr><td colspan=3>Total a pagar</td><td>".$this->importeBase * ((Factura::$IVA/100)+1)."</td></tr>";
            $str .= "</table>";
            return $str;
        }else{
            return false;
        }
    }

    public function getEstado(){
        return $this->estado;
    }

    public function setEstado($estado){
        $this->estado = $estado;

        return $this;
    }

    public static function getIva() { // método de clase
        return Factura::$IVA;
        }

    public function getFecha(){
        return $this->fecha;
    }

    public function setFecha($fecha){
        $this->fecha = $fecha;
        return $this;
    }
}