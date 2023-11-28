<?php 
include_once "../model/funcion.pedido.php";

$id = $_POST["id"];
$estado = $_POST["estado"];

$pedidoestado = new \modeloPed\finalizarCompra;
$pedidoestado->setId($id);
$pedidoestado->setEstadoPedido($estado);
$response = $pedidoestado->UpdateEstado();
echo json_encode($response);

unset($response);
unset($pedidoestado);