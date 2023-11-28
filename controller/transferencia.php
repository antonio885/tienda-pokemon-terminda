<?php
include_once "../model/funcion.pedido.php";

$codigo = $_POST["codigo"];
$nombre = $_POST["nombre"];
$direccion = $_POST["direccion"];
$telefono = $_POST["telefono"];
$fecha = $_POST["fecha"];
$total = $_POST["total"];
$pago = $_POST["pago"];

$idRol = $_POST["idRol"];

$pedidoz = new \modeloPed\finalizarCompra();
$pedidoz->setCodigoPed($codigo);
$pedidoz->setNombre($nombre);
$pedidoz->setDireccion($direccion);
$pedidoz->setTelefono($telefono);
$pedidoz->setFechaEnvio($fecha);
$pedidoz->setTotalped($total);
$pedidoz->setFormaPago($pago);
$pedidoz->setIdUsu($idRol);
$response = $pedidoz->insertpedido();
echo json_encode($response);
unset($response);
unset($pedidoz);
