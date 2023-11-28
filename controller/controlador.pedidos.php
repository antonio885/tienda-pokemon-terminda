<?php 
include_once "../model/funcion.pedido.php";

$pedido = new \modeloPed\finalizarCompra;
$response = $pedido->readpedidos();
echo json_encode($response);

unset($response);
unset($pedido);