<?php
namespace modelos;

include_once "../model/conexion.php";

class login{
private $usuario;
private $contraseña;

private $conexion;

public function __construct(){
$this->conexion = new \conexion();
}

public function loginCreate(){
    try {
        $sql = $this->conexion->getConPDO()->prepare("SELECT * FROM usuarios where estado='A' and correo=? and password=?");
        $sql->bindParam(1,$this->usuario);
        $sql->bindParam(2, $this->contraseña);
        $sql->execute();
    
        $result = $sql->fetchAll(\PDO::FETCH_ASSOC);
        return $result;
    } catch (\PDOException $e) {
     return "error" . $e->getMessage();
    }
   
}
    


/**
 * Get the value of usuario
 */ 
public function getUsuario()
{
return $this->usuario;
}

/**
 * Set the value of usuario
 *
 * @return  self
 */ 
public function setUsuario($usuario)
{
$this->usuario = $usuario;

return $this;
}

/**
 * Get the value of contraseña
 */ 
public function getContraseña()
{
return $this->contraseña;
}

/**
 * Set the value of contraseña
 *
 * @return  self
 */ 
public function setContraseña($contraseña)
{
$this->contraseña = $contraseña;

return $this;
}
}