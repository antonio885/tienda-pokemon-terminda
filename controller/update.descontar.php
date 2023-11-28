<?php
include_once "../model/funcion.agregar.producto.php";

$id=  json_decode($_POST["id"]);
$cantidad = json_decode($_POST["cantidad"]);
print($id);
print_r($cantidad) ;
$descontar = new \modelo\producto;
$descontar->setId($id);
$descontar->setCantidadPro($cantidad);
$response = $descontar->updateProduct();
echo json_encode($response);

unset($response);
unset($descontar);