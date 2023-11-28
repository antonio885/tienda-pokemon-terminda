<?php
include_once "../model/funcion.agregar.producto.php";

$id = $_POST["id"];
$precio = $_POST["precio"];
$cantidad = $_POST["cantidad"];

$readz = new \modelo\producto;
$readz->setId($id);
$readz->setPrecioPro($precio);
$readz->setCantidadPro($cantidad);
$response = $readz->updateModal();
echo json_encode($response);

unset($readz);
unset($response);