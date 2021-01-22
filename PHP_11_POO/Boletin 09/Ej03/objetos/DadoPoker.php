<?php 

class DadoPoker {

    private const FIGURAS = ["As","K","Q","J","7","8"];
    private $ultimaFigura;
    private static $tiradasTotales = 0;
    public function __construct(){
    }

    public function tira(){
        DadoPoker::$tiradasTotales++;
        $figura = self::FIGURAS[rand(0,count(self::FIGURAS)-1)];
        $this->ultimaFigura = $figura;
        return $figura;
    }

    public function nombreFigura(){
        return $this->ultimaFigura;
    }

    public function getTiradasTotales(){
        return DadoPoker::$tiradasTotales;
    }
}