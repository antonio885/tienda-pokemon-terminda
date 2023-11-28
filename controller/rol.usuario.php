<?php 
include_once "../model/registro.and.rol.php";

$rol = $_GET[ "rol"];
$usuario = new \mod\rol;
$usuario->setId($rol);
$response = $usuario->extraerRol();
echo json_encode($response);

unset($response);
unset($usuario);