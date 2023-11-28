<?php 
include "../model/funcion.agregar.producto.php";

$id = $_GET["id"];
$update = new \modelo\producto;
$update->setId($id);
$response = $update->update();
echo json_encode($response);

unset($response);
unset($update);
