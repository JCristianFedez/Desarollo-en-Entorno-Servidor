<?php 
require_once "../Model/Carrito.php";

Carrito::vaciarCarrito();

header("Location: index.php");
?>