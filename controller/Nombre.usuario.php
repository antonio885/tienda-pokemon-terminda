<?php
include_once "../model/registro.and.rol.php";

$nombre = $_GET["nombre"];

$usuario = new \mod\registro;
$usuario->setId($nombre);
$response = $usuario->readRegistro();
echo json_encode($response);
unset($response);
unset($usuario);