<?php
namespace mod;

use PDO;

include_once "../model/conexion.php";

class registro{
    private $id;
    private $tipoDoc;
    private $identificacion;
    private $nombre;
    private $apellido;
    private $email;
    private $password;
    private $direccion;
    private $telefono;
    private $genero;
    private $rol;
    private $estado = 'A';
    private $conexion;

    public function __construct()
    {
        $this->conexion = new \conexion();
    }
    public function registros(){
        try {
          $sql = $this->conexion->getConPDO()->prepare("INSERT INTO usuarios(tipoDoc,identificacion,nombre,apellido,correo,password,direccion,telefono,genero,idRol,estado) VALUES(?,?,?,?,?,?,?,?,?,?,?)");
          $sql->bindParam(1, $this->tipoDoc);
          $sql->bindParam(2, $this->identificacion);
          $sql->bindParam(3, $this->nombre);
          $sql->bindParam(4, $this->apellido);
          $sql->bindParam(5, $this->email);
          $sql->bindParam(6, $this->password);
          $sql->bindParam(7, $this->direccion);
          $sql->bindParam(8, $this->telefono);
          $sql->bindParam(9, $this->genero);
          $sql->bindParam(10, $this->rol);
          $sql->bindParam(11, $this->estado);
          $sql->execute();
          return "usuario creado";
        } catch (\PDOException $th) {
           return "error" . $th->getMessage();
        }
    }
    public function readRegistro(){
    try {
        $sql = $this->conexion->getConPDO()->prepare("SELECT * FROM usuarios WHERE id=?");
        $sql->bindParam(1,$this->id);
        $sql->execute();
        $results = $sql->fetchAll(PDO::FETCH_ASSOC);
        return $results;
    } catch (\PDOException $th) {
      return "error" . $th->getMessage();
    }
    }

    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of tipoDoc
     */ 
    public function getTipoDoc()
    {
        return $this->tipoDoc;
    }

    /**
     * Set the value of tipoDoc
     *
     * @return  self
     */ 
    public function setTipoDoc($tipoDoc)
    {
        $this->tipoDoc = $tipoDoc;

        return $this;
    }

    /**
     * Get the value of identificacion
     */ 
    public function getIdentificacion()
    {
        return $this->identificacion;
    }

    /**
     * Set the value of identificacion
     *
     * @return  self
     */ 
    public function setIdentificacion($identificacion)
    {
        $this->identificacion = $identificacion;

        return $this;
    }

    /**
     * Get the value of nombre
     */ 
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set the value of nombre
     *
     * @return  self
     */ 
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * Get the value of apellido
     */ 
    public function getApellido()
    {
        return $this->apellido;
    }

    /**
     * Set the value of apellido
     *
     * @return  self
     */ 
    public function setApellido($apellido)
    {
        $this->apellido = $apellido;

        return $this;
    }

    /**
     * Get the value of email
     */ 
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set the value of email
     *
     * @return  self
     */ 
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get the value of password
     */ 
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set the value of password
     *
     * @return  self
     */ 
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get the value of direccion
     */ 
    public function getDireccion()
    {
        return $this->direccion;
    }

    /**
     * Set the value of direccion
     *
     * @return  self
     */ 
    public function setDireccion($direccion)
    {
        $this->direccion = $direccion;

        return $this;
    }

    /**
     * Get the value of telefono
     */ 
    public function getTelefono()
    {
        return $this->telefono;
    }

    /**
     * Set the value of telefono
     *
     * @return  self
     */ 
    public function setTelefono($telefono)
    {
        $this->telefono = $telefono;

        return $this;
    }

    /**
     * Get the value of genero
     */ 
    public function getGenero()
    {
        return $this->genero;
    }

    /**
     * Set the value of genero
     *
     * @return  self
     */ 
    public function setGenero($genero)
    {
        $this->genero = $genero;

        return $this;
    }

    /**
     * Get the value of rol
     */ 
    public function getRol()
    {
        return $this->rol;
    }

    /**
     * Set the value of rol
     *
     * @return  self
     */ 
    public function setRol($rol)
    {
        $this->rol = $rol;

        return $this;
    }

    /**
     * Get the value of estado
     */ 
    public function getEstado()
    {
        return $this->estado;
    }

    /**
     * Set the value of estado
     *
     * @return  self
     */ 
    public function setEstado($estado)
    {
        $this->estado = $estado;

        return $this;
    }

    /**
     * Get the value of conexion
     */ 
    public function getConexion()
    {
        return $this->conexion;
    }

    /**
     * Set the value of conexion
     *
     * @return  self
     */ 
    public function setConexion($conexion)
    {
        $this->conexion = $conexion;

        return $this;
    }
}
class rol{
    private $id;
    private $nombrerol;
    private $estado = 'A';
    private $conexion;

    public function __construct()
    {
        $this->conexion = new \conexion();
    }
    public function read(){
      try {
        $sql = $this->conexion->getConPDO()->prepare("SELECT * FROM roles");
        $sql->execute();
    
    $results = $sql->fetchAll(\PDO::FETCH_ASSOC);
    return $results;
    
      } catch (\PDOException $e) {
     return "error" . $e->getMessage();
      }

}
public function extraer(){
    try {
        $sql = $this->conexion->getConPDO()->prepare("SELECT * FROM roles where id=?");
        $sql->bindParam(1,$this->id);
        $sql->execute();
        $results = $sql->fetchAll(PDO::FETCH_ASSOC);
        return $results;
    } catch (\PDOException $th) {
     return "error". $th->getMessage();
    }
 
}
public function extraerRol(){
    try {
        $sql = $this->conexion->getConPDO()->prepare("SELECT * FROM roles where id=?");
        $sql->bindParam(1,$this->id);
        $sql->execute();
        $results = $sql->fetchAll(PDO::FETCH_ASSOC);
        return $results;
    } catch (\PDOException $th) {
     return "error". $th->getMessage();
    }
 
}


    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of nombrerol
     */ 
    public function getNombrerol()
    {
        return $this->nombrerol;
    }

    /**
     * Set the value of nombrerol
     *
     * @return  self
     */ 
    public function setNombrerol($nombrerol)
    {
        $this->nombrerol = $nombrerol;

        return $this;
    }

    /**
     * Get the value of estado
     */ 
    public function getEstado()
    {
        return $this->estado;
    }

    /**
     * Set the value of estado
     *
     * @return  self
     */ 
    public function setEstado($estado)
    {
        $this->estado = $estado;

        return $this;
    }
}