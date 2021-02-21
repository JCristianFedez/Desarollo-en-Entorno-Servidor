<?php 
	include_once 'Bombilla.php';

	if (isset($_GET['general'])) {
		if ($_GET['general']=="activar") {
			Bombilla::activarGeneral();
		} else {
			Bombilla::desactivarGeneral();
		}
	} else if (isset($_GET['bombilla'])) {
		if (isset($_GET['accion'])) {
			if ($_GET['accion']=="encender") {
				$_SESSION['bombillas'][$_GET['bombilla']]->encencer();
			} else {
				$b=$_SESSION['bombillas'][$_GET['bombilla']];
				$b->apagar();
				$_SESSION['bombillas'][$_GET['bombilla']]=$b;
			}
		} else {
			$b=$_SESSION['bombillas'][$_GET['bombilla']];
			$b->cambiarEstado();
			$_SESSION['bombillas'][$_GET['bombilla']]=$b;
		}
	}
	header('Location:Prueba.php');
 ?>