<?php
include_once "../model/guardar.carrito.php";

$id = $_POST["id"];
$cantidad = $_POST["cantidad"];


$pedidoU = new \modelocar\agregarcarrito;

$pedidoU->setId($id);
$pedidoU->setCantidadPro($cantidad);

$response = $pedidoU->UpdateQuantity();
echo json_encode($response);

unset($response);
unset($pedidoU);