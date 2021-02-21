<!DOCTYPE html>
<html>
	<head>
		<title></title>
	</head>
	<body>
		<?php 
			include_once 'Empleado.php';

			$empleado1 = new Empleado('Pedro', 3001);
			$empleado2 = new Empleado('Juan', 300);
			$empleado1->verSiPagaImpuestos();
			echo "<br>";
			$empleado2->verSiPagaImpuestos();
			echo "<br><hr><br>";
			$empleado1->asigna('Pedro', 3500);
			$empleado2->asigna('Juan', 350);
			$empleado1->verSiPagaImpuestos();
			echo "<br>";
			$empleado2->verSiPagaImpuestos();
			echo "<br><hr><br>";
			$empleado1->asigna('Pedrito', 6500);
			$empleado2->asigna('Juanito', 650);
			$empleado1->verSiPagaImpuestos();
			echo "<br>";
			$empleado2->verSiPagaImpuestos();
			echo "<br><hr><br>";
			//Prueba de los argumentos opcionales y valores por defecto
			$empleado3 = new Empleado(null,680);
			$empleado3->verSiPagaImpuestos();
			echo "<br>";
		 ?>
	</body>
</html>