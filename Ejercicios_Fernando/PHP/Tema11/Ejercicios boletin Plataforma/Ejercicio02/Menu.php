<?php 
	class Menu {
		private $titulos;
		private $enlaces;

		public function __construct() {
			$this->titulos=[];
			$this->enlaces=[];
		}

		function aniadirElementos($titulo, $enlace) {
			$this->titulos[]=$titulo;
			$this->enlaces[]=$enlace;
		}

		public function mostrarMenuVertical() {
			for ($i=0; $i < count($this->titulos); $i++) {  ?>
				<a href="<?php echo $this->enlaces[$i]; ?>"><?php echo $this->titulos[$i]; ?></a><br>
			<?php 
			}
		}
		public function mostrarMenuHorizontal() {
			for ($i=0; $i < count($this->titulos); $i++) {  ?>
				<a href="<?php echo $this->enlaces[$i]; ?>"><?php echo $this->titulos[$i]; ?></a> -
			<?php 
			}
		}
	}
 ?>