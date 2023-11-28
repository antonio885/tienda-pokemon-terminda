<?php
include_once "../model/funcion.agregar.producto.php";

$readz = new \modelo\producto;
$response = $readz->read();
echo json_encode($response);

unset($response);
unset($readz);