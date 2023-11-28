<?php
include_once "../model/guardar.carrito.php";

$idPro = $_POST["id"];
$nombre = $_POST["nombre"];
$cantidad = $_POST["cantidad"];
$precio = $_POST["precio"];
$precioTotal = $_POST["precioTotal"];
$idUsuario = $_POST["idCliente"];

$carritoC = new \modelocar\agregarcarrito;
$carritoC->setNombrePro($nombre);
$carritoC->setIdpro($idPro);
$carritoC->setCantidadPro($cantidad);
$carritoC->setPrecioUnit($precio);
$carritoC->setPrecioTotal($precioTotal);
$carritoC->setIdPed($idUsuario);
$response = $carritoC->insertcarrito();
echo json_encode($response);

unset($response);
unset($carritoC);