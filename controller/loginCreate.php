<?php
include_once "../model/login.model.php";

$nombre = $_GET["nombre"];
$contraseña = $_GET["contraseña"];
$loginZ = new \modelos\login;
$loginZ->setUsuario($nombre);
$loginZ->setContraseña($contraseña);
$response = $loginZ->loginCreate();
if(isset($response) AND !empty($response)){
    session_start();
    $_SESSION["nombre"] = $response[0] ["nombre"];
    $_SESSION["correo"] = $response[0] ["correo"];
    $_SESSION["id"] = $response[0] ["id"];
    $_SESSION["idRol"] = $response[0] ["idRol"];
}
echo json_encode($response);

unset($response);
unset($loginZ);