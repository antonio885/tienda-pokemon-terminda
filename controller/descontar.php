<?php
include_once "../model/guardar.carrito.php";

$id = $_GET["id"];

$descontar = new \modelocar\agregarcarrito;
$descontar->setIdpro($id);
$response = $descontar->readDescontar();
echo json_encode($response);

unset($response);
unset($descontar);