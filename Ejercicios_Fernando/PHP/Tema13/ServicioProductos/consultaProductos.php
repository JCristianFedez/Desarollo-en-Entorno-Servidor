<?php
require_once 'Producto.php';
require_once 'Cliente.php';
if (Cliente::comprueba($_GET['user'], $_GET['token'])) {
  $cliente= Cliente::getClienteById($_GET['user']);
  $cliente->sumaConsulta();
  if (isset($_GET['min']) && isset($_GET['max'])) {
    $productos = Producto::getProductosFiltroPrecio($_GET['min'],$_GET['max']);
  }else{

    $productos = Producto::getProductosFiltroNombre($_GET['nombre']);
  }
  if (count($productos)==0) {
    $devolver[0]="no encontrado";
  }else{
    foreach ($productos as $producto) { 
      $devolver[] = ['nombre' => $producto->getNombre(), 'precio' => $producto->getPrecio(), 'imagen' => $producto->getImagen()];
    }
  }
    echo json_encode($devolver);

}