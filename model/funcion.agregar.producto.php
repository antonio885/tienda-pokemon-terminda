<?php
namespace modelo;

use PDO;
use PDOException;
include_once "../model/conexion.php";

class producto{
    private $id;
    private $nombrePro;
    private $precioPro;
    private $cantidadPro;
    private $descripPro;
    private $estado = 'A';
    private $conexion;

    public function __construct(){
        $this->conexion = new \Conexion();
    }
    public function insertPro(){
        try {
            $sql = $this->conexion->getConPDO()->prepare("INSERT INTO producto(id,nombrePro,precioPro,cantidadPro,descripPro,estado) VALUES(?,?,?,?,?,?)");
            $sql->bindParam(1,$this->id);
            $sql->bindParam(2,$this->nombrePro);
            $sql->bindParam(3,$this->precioPro);
            $sql->bindParam(4, $this->cantidadPro);
            $sql->bindParam(5,$this->descripPro);
            $sql->bindParam(6,$this->estado);
            $sql->execute();
            
            return "creado";
        } catch (\PDOException $e) {
      return "error:" . $e->getMessage();
        }
   

    }
    public function read(){
        try {
       $sql = $this->conexion->getConPDO()->prepare("SELECT * FROM producto");
       $sql->execute();
       $result = $sql->fetchAll(PDO::FETCH_ASSOC);
       return $result;
        } catch (\PDOException $th) {
       return "error" . $th->getMessage();
        }
    }
    public function update(){
    
try {
    $sql = $this->conexion->getConPDO()->prepare("SELECT * FROM producto where id=?");

    $sql->bindParam(1,$this->id);
    $sql->execute();
    $result = $sql->fetchAll(PDO::FETCH_ASSOC);
    return $result;
} catch (\PDOException $th) {
 return "error". $th->getMessage();
}

    }
    public function updateModal(){
        try {
            $sql = $this->conexion->getConPDO()->prepare("UPDATE producto SET precioPro=?, cantidadPro=? WHERE id=?");
            $sql->bindParam(1, $this->precioPro);
            $sql->bindParam(2,$this->cantidadPro);
            $sql->bindParam(3, $this->id);
            $sql->execute();
            return "excelente";
        } catch (\PDOException $th) {
          return "error". $th->getMessage();
        }
     

    }
    public function updateProduct(){
     try {
        $sql = $this->conexion->getConPDO()->prepare("UPDATE producto set cantidadPro=? where id=?");
        $sql->bindParam(1,$this->cantidadPro);
        $sql->bindParam(2,$this->id);
        $sql->execute();

        return "funcionara?";
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
     * Get the value of precioPro
     */ 
    public function getPrecioPro()
    {
        return $this->precioPro;
    }

    /**
     * Set the value of precioPro
     *
     * @return  self
     */ 
    public function setPrecioPro($precioPro)
    {
        $this->precioPro = $precioPro;

        return $this;
    }

    /**
     * Get the value of descripPro
     */ 
    public function getDescripPro()
    {
        return $this->descripPro;
    }

    /**
     * Set the value of descripPro
     *
     * @return  self
     */ 
    public function setDescripPro($descripPro)
    {
        $this->descripPro = $descripPro;

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