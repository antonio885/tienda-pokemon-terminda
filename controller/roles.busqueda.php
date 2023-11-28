<?php 
include_once "../model/registro.and.rol.php";

$idRol = $_GET["id"];
 
$userR = new \mod\rol;
$userR->setId($idRol);
$response = $userR->extraer();
echo json_encode($response);

unset($response);
unset($userR);
