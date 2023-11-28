<?php
include_once "../model/funcion.agregar.producto.php";

$id = $_POST["id"];
$nombre = $_POST["nombre"];
$cantidad = $_POST["cantidad"];
$precio = $_POST["precio"];
$descripcion = $_POST["descripcion"];

$productoM = new \modelo\producto;  
$productoM->setId($id);
$productoM->setNombrePro($nombre);
$productoM->setCantidadPro($cantidad);
$productoM->setPrecioPro($precio);
$productoM->setDescripPro($descripcion);
$response = $productoM->insertPro();
echo json_encode($response);

unset($response);
unset($productoM);


