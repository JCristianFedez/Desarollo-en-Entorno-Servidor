<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
	</head>
	<body>
		<h2>Prueba Menús</h2>
		<?php
			include_once 'Menu.php';

			$menu1 = new Menu();
			$menu2 = new Menu();

			$menu1->aniadirElementos("Google", "https://www.google.es/");
			$menu1->aniadirElementos("Bing", "https://www.bing.com/");
			$menu1->aniadirElementos("Yahoo", "https://es.yahoo.com/");
			$menu1->aniadirElementos("DuckDuckGo", "https://duckduckgo.com/");
			$menu2->aniadirElementos("Marca", "https://www.marca.com/");
			$menu2->aniadirElementos("facebook", "https://www.facebook.com/");
			$menu2->aniadirElementos("instagram", "https://www.instagram.com/");

			$menu1->mostrarMenuHorizontal();
			echo "<br><br>";
			$menu2->mostrarMenuVertical();
		?>
	</body>
</html>