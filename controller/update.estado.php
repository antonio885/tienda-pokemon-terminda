<?php
include_once "../model/funcion.pedido.php";

$id = $_GET["id"];
$estado = new  \modeloPed\finalizarCompra;
$estado->setId($id);
$response = $estado->UpdateRead();
echo json_encode($response);

unset($response);
unset($estado);