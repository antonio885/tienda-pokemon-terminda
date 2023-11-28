<?php
include_once "../model/registro.and.rol.php";

$tipoDoc = $_POST["tipoDoc"];
$identificacion = $_POST["identificacion"];
$nombre = $_POST["nombre"];
$apellido = $_POST["apellido"];
$email = $_POST["email"];
$password = $_POST["password"];
$direccion = $_POST["direccion"];
$telefono = $_POST["telefono"];
$genero = $_POST["genero"];
$rol = $_POST["rol"];

$registroz = new \mod\registro;
$registroz->setTipoDoc($tipoDoc);
$registroz->setIdentificacion($identificacion);
$registroz->setNombre($nombre);
$registroz->setApellido($apellido);
$registroz->setEmail($email);
$registroz->setPassword($password);
$registroz->setDireccion($direccion);
$registroz->setTelefono($telefono);
$registroz->setGenero($genero);
$registroz->setRol($rol);
$response = $registroz->registros();
echo json_encode($response);

unset($$registroz);
unset($response);
