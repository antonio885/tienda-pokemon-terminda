<?php
include_once "../model/registro.and.rol.php";

$registox = new \mod\rol;
$response = $registox->read();
echo json_encode($response);
unset($registox);
unset($response);