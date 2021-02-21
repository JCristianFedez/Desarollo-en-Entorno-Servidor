<?php 
	include_once 'Bombilla.php';
	if (isset($_POST['nombre'])) {
		$_SESSION['bombillas'][]=new Bombilla($_POST['estaEncendida'], $_POST['potencia'], $_POST['nombre']);
	}
	header('Location:Prueba.php');
 ?>