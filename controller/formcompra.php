<?php
include_once "../model/guardar.carrito.php";

$read = new \modelocar\agregarcarrito;
$response = $read->readpoke();
echo json_encode($response);

unset($response);
unset($read);