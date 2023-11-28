<?php 
include_once "../model/guardar.carrito.php";

$id= $_GET["id"];

$pedidoz = new \modelocar\agregarcarrito;
$pedidoz->setId($id);
$response = $pedidoz->readUpdate();
echo json_encode($response); 
unset($response);
unset($pedidoz);
