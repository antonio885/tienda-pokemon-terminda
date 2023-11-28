<?php 
include_once "../model/guardar.carrito.php";

$id = $_POST["id"];
$deleted = new \modelocar\agregarcarrito;
$deleted->setId($id);
$response = $deleted->eliminarFuncion();
echo json_encode($response);

unset($response);
unset($deleted);
