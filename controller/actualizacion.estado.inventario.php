<?php
include_once "../model/guardar.carrito.php";

// <button onclick="comprarPoke('${index}')" type="button" class="btn btn-danger">comprar</button> 
$id = json_decode($_POST["id"]);
$acutalizacion= new \modelocar\agregarcarrito;
$acutalizacion->setIdpro($id);
$response = $acutalizacion->updateCompraInventario();
echo json_encode($response);

unset($response);
unset($acutalizacion);