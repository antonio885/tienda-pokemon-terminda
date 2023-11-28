<?php
namespace modelocar;

use conexion;
use PDO;

include_once "../model/conexion.php";

class agregarcarrito{

    private $id;
    private $idPed ;
    private $idpro;
    private $cantidadPro;
    private $nombrePro;
    private $precioUnit;
    private $precioTotal;
    private $estado = 'A';
    private $estadoCompra;
    private $conexion;


    public function __construct(){
        $this->conexion = new \conexion();
    }

 

    public function insertcarrito(){
        try {
            $sql = $this->conexion->getConPDO()->prepare("INSERT INTO pedprod(id,idPed,idPro,nombrePro,cantidadPro,precioUnit,precioTotal,estado) VALUES(?,?,?,?,?,?,?,?) ");
            $sql->bindParam(1,$this->id);
            $sql->bindParam(2,$this->idPed);
            $sql->bindParam(3, $this->idpro);
            $sql->bindParam(4,$this->nombrePro);
            $sql->bindParam(5,$this->cantidadPro);
            $sql->bindParam(6,$this->precioUnit);
            $sql->bindParam(7,$this->precioTotal);
            $sql->bindParam(8,$this->estado);

            $sql->execute();
            return "funciona";
        } catch (\PDOException $e) {
         return "error" . $e->getMessage();
        }
   

    }
    public function readpoke(){
        try {
            $sql = $this->conexion->getConPDO()->prepare("SELECT * FROM pedprod where estadoCompra='Seleccionado' and estado='A' ");
            $sql->execute();
            $results = $sql->fetchAll(\PDO::FETCH_ASSOC);
            return $results;
        } catch (\PDOException $th) {
            return "error" . $th->getMessage();
        }
    }
    public function readUpdate(){
       try {
        $sql = $this->conexion->getConPDO()->prepare("SELECT * FROM pedprod where id=?");
        $sql->bindParam(1,$this->id);
        $sql->execute();
        $result = $sql->fetchAll(PDO::FETCH_ASSOC);
        return $result;
       } catch (\PDOException $th) {
        return "error" . $th->getMessage();
       }
    }
    public function UpdateQuantity(){
     try {
        $sql = $this->conexion->getConPDO()->prepare("UPDATE pedprod set cantidadPro=? WHERE id=?");
        $sql->bindParam(1,$this->cantidadPro);
        $sql->bindParam(2,$this->id);
        $sql->execute();
  
        return "good";
     } catch (\PDOException $th) {
     return "error" . $th->getMessage();
     }
    }
    public function precioUpdate(){
        try {
           $sql = $this->conexion->getConPDO()->prepare("UPDATE pedprod set precioTotal=? WHERE id=?");
           $sql->bindParam(1,$this->precioTotal);
           $sql->bindParam(2,$this->id);
           $sql->execute();
     
           return "good";
        } catch (\PDOException $th) {
        return "error" . $th->getMessage();
        }
       }
public function readDescontar(){
  try {
    $sql = $this->conexion->getConPDO()->prepare("SELECT * FROM pedprod where idPro=? and estadoCompra='Comprado' and estado='A'");
    $sql->bindParam(1,$this->idpro);
    $sql->execute();
    $result = $sql->fetchAll(PDO::FETCH_ASSOC);
    return $result;
  } catch (\PDOException $th) {
   return "error". $th->getMessage();
  }
}
public function updateCompra(){
    try {
     $sql  = $this->conexion->getConPDO()->prepare("UPDATE pedprod set estadoCompra='Comprado' where idPed=? and estadoCompra='Seleccionado'");
     $sql->bindParam(1,$this->idPed);
     $sql->execute();
     return "god";
    } catch (\PDOException $th) {
 return "error" . $th->getMessage();
    }
 
     }
     public function updateCompraInventario(){
        try {
         $sql  = $this->conexion->getConPDO()->prepare("UPDATE pedprod set estadoCompra='descontado' where idPro=? ");
         $sql->bindParam(1,$this->idpro);
         $sql->execute();
         $result = $sql->fetchAll(PDO::FETCH_ASSOC);
         return $result;
        } catch (\PDOException $th) {
     return "error" . $th->getMessage();
        }
     
         }
public function eliminarFuncion(){
    try {
        $sql = $this->conexion->getConPDO()->prepare("UPDATE pedprod SET estado='I' where id=?");
        $sql->bindParam(1, $this->id);
        $sql->execute();
        return "exelent";
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
     * Get the value of idPed
     */ 
    public function getIdPed()
    {
        return $this->idPed;
    }

    /**
     * Set the value of idPed
     *
     * @return  self
     */ 
    public function setIdPed($idPed)
    {
        $this->idPed = $idPed;

        return $this;
    }

    /**
     * Get the value of idpro
     */ 
    public function getIdpro()
    {
        return $this->idpro;
    }

    /**
     * Set the value of idpro
     *
     * @return  self
     */ 
    public function setIdpro($idpro)
    {
        $this->idpro = $idpro;

        return $this;
    }

    /**
     * Get the value of cantidadPro
     */ 
    public function getCantidadPro()
    {
        return $this->cantidadPro;
    }

    /**
     * Set the value of cantidadPro
     *
     * @return  self
     */ 
    public function setCantidadPro($cantidadPro)
    {
        $this->cantidadPro = $cantidadPro;

        return $this;
    }

    /**
     * Get the value of precioUnit
     */ 
    public function getPrecioUnit()
    {
        return $this->precioUnit;
    }

    /**
     * Set the value of precioUnit
     *
     * @return  self
     */ 
    public function setPrecioUnit($precioUnit)
    {
        $this->precioUnit = $precioUnit;

        return $this;
    }

    /**
     * Get the value of precioTotal
     */ 
    public function getPrecioTotal()
    {
        return $this->precioTotal;
    }

    /**
     * Set the value of precioTotal
     *
     * @return  self
     */ 
    public function setPrecioTotal($precioTotal)
    {
        $this->precioTotal = $precioTotal;

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
     * Get the value of nombrePro
     */ 
    public function getNombrePro()
    {
        return $this->nombrePro;
    }

    /**
     * Set the value of nombrePro
     *
     * @return  self
     */ 
    public function setNombrePro($nombrePro)
    {
        $this->nombrePro = $nombrePro;

        return $this;
    }
     /**
     * Get the value of estadoCompra
     */ 
    public function getEstadoCompra()
    {
        return $this->estadoCompra;
    }

    /**
     * Set the value of estadoCompra
     *
     * @return  self
     */ 
    public function setEstadoCompra($estadoCompra)
    {
        $this->estadoCompra = $estadoCompra;

        return $this;
    }
}

