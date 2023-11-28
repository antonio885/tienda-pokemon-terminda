<?php
namespace modeloPed;

use conexion;
use PDO;

include_once "../model/conexion.php";

class finalizarCompra{
    private $id;
    private $codigoPed;
    private $idUsu;
    private $nombre;
    private $direccion;
    private $telefono;
    private $totalped;
    private $formaPago;
    private $fechaEnvio;
    private $estadoPedido;
    private $estado = 'A';
    private $conexion;

    public function __construct()
    {
        $this->conexion = new \conexion();
    }

public function insertpedido(){

    try {
        $sql = $this->conexion->getConPDO()->prepare("INSERT INTO pedidos(id,codigoPed,fechaPed,idUsu,nombre,direccion,telefono,totalPed,formaPago,fechaEnvPedido,estado) values(?,?,?,?,?,?,?,?,?,?,?)");
        $sql->bindParam(1, $this->id);
        $sql->bindParam(2, $this->codigoPed);
        $sql->bindParam(3, $this->fechaEnvio);
        $sql->bindParam(4,$this->idUsu);
        $sql->bindParam(5, $this->nombre);
        $sql->bindParam(6, $this->direccion);
        $sql->bindParam(7, $this->telefono);
        $sql->bindParam(8,$this->totalped);
        $sql->bindParam(9, $this->formaPago);
        $sql->bindParam(10, $this->fechaEnvio);
        $sql->bindParam(11,$this->estado);
        $sql->execute();
        return "enviado";
    } catch (\PDOException $th) {
       return "error". $th->getMessage();
    }
   

}
public function readpedidos(){
  try {
    $sql = $this->conexion->getConPDO()->prepare("SELECT * FROM pedidos");
    $sql->execute();
    $result = $sql->fetchAll(PDO::FETCH_ASSOC);
    return $result;
  } catch (\PDOException $th) {
  return "error" . $th->getMessage();
  }
}
public function UpdateRead(){
  try {
    $sql = $this->conexion->getConPDO()->prepare("SELECT * FROM pedidos where id=?");
    $sql->bindParam(1,$this->id);
    $sql->execute();
    $result = $sql->fetchAll(PDO::FETCH_ASSOC);
    return $result;
  } catch (\PDOException $th) {
    return "error" . $th->getMessage();
  }
}
public function UpdateEstado(){
try {
    $sql = $this->conexion->getConPDO()->prepare("UPDATE pedidos SET estadoPedido=? where id=?");
    $sql->bindParam(1,$this->estadoPedido);
    $sql->bindParam(2,$this->id);
    $sql->execute();
    return "correcto";
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
     * Get the value of codigoPed
     */ 
    public function getCodigoPed()
    {
        return $this->codigoPed;
    }

    /**
     * Set the value of codigoPed
     *
     * @return  self
     */ 
    public function setCodigoPed($codigoPed)
    {
        $this->codigoPed = $codigoPed;

        return $this;
    }

    /**
     * Get the value of idUsu
     */ 
    public function getIdUsu()
    {
        return $this->idUsu;
    }

    /**
     * Set the value of idUsu
     *
     * @return  self
     */ 
    public function setIdUsu($idUsu)
    {
        $this->idUsu = $idUsu;

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
     * Get the value of totalped
     */ 
    public function getTotalped()
    {
        return $this->totalped;
    }

    /**
     * Set the value of totalped
     *
     * @return  self
     */ 
    public function setTotalped($totalped)
    {
        $this->totalped = $totalped;

        return $this;
    }

    /**
     * Get the value of formaPago
     */ 
    public function getFormaPago()
    {
        return $this->formaPago;
    }

    /**
     * Set the value of formaPago
     *
     * @return  self
     */ 
    public function setFormaPago($formaPago)
    {
        $this->formaPago = $formaPago;

        return $this;
    }

    /**
     * Get the value of fechaEnvio
     */ 
    public function getFechaEnvio()
    {
        return $this->fechaEnvio;
    }

    /**
     * Set the value of fechaEnvio
     *
     * @return  self
     */ 
    public function setFechaEnvio($fechaEnvio)
    {
        $this->fechaEnvio = $fechaEnvio;

        return $this;
    }

    /**
     * Get the value of estadoPedido
     */ 
    public function getEstadoPedido()
    {
        return $this->estadoPedido;
    }

    /**
     * Set the value of estadoPedido
     *
     * @return  self
     */ 
    public function setEstadoPedido($estadoPedido)
    {
        $this->estadoPedido = $estadoPedido;

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