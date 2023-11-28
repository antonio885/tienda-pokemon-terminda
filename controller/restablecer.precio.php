<?php 
include_once "../model/guardar.carrito.php";

$id = $_POST["id"];
$precio = $_POST["total"];

$carrito = new \modelocar\agregarcarrito;
$carrito->setId($id);
$carrito->setPrecioTotal($precio);
$response = $carrito->precioUpdate();
echo json_encode($response);

unset($response);
unset($carrito);