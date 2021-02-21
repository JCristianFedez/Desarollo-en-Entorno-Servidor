<?php 
	/**
	 * 
	 */
	class Empleado {
		private $nombre;
		private $sueldo;
		
		function __construct($nombre="anonimo", $sueldo=0) {
			$this->nombre=($nombre==null) ? "anonimo" : $nombre ;
			$this->sueldo=($sueldo==null) ? 0 : $sueldo ;
		}

		public function asigna($nombre, $sueldo) {
			if ($this->nombre==$nombre) {
				$this->sueldo = $sueldo;
			}
		}
		
		public function verSiPagaImpuestos() {
			echo $this->nombre." cobra ".$this->sueldo;
			if ($this->sueldo>3000) {
				echo " y paga impuestos.";
			} else {
				echo " y NO paga impuestos.";
			}
		}
	}
 ?>