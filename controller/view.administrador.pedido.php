<?php 
include_once "../model/view.administrador.ped.php";

$pedidoP = new \modeloview\view;
$response = $pedidoP->viewProducto();
echo json_encode($response);

unset($response);
unset($response);