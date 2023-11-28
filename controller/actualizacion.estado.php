<?php
include_once "../model/guardar.carrito.php";

// <button onclick="comprarPoke('${index}')" type="button" class="btn btn-danger">comprar</button> 
$id = $_POST["idRol"];
$acutalizacion= new \modelocar\agregarcarrito;
$acutalizacion->setIdPed($id);
$response = $acutalizacion->updateCompra();
echo json_encode($response);

unset($response);
unset($acutalizacion);