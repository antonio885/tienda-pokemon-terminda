<?php
namespace modeloview;

use PDO;

include_once "../model/conexion.php";

class view {
    private $id;
    private $codigoPed;
    private $nombre;
    private $direccion;
    private $telefono;
    private $totalPed;
    private $formaPago;
    private $fechaEnvPedido;
    private $estadoPedido;
    private $nombrePro;
    private $cantidadPro;
    private $estado;
    private $conexion;

    public function __construct()
    {
        $this->conexion = new \conexion();
    }
    public function viewProducto(){
      try {
        $sql = $this->conexion->getConPDO()->prepare("SELECT * FROM visionadministrador where estado='I'");
        $sql->execute();
        $result = $sql->fetchAll(PDO::FETCH_ASSOC);
        return $result;
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
     * Get the value of totalPed
     */ 
    public function getTotalPed()
    {
        return $this->totalPed;
    }

    /**
     * Set the value of totalPed
     *
     * @return  self
     */ 
    public function setTotalPed($totalPed)
    {
        $this->totalPed = $totalPed;

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
     * Get the value of fechaEnvPedido
     */ 
    public function getFechaEnvPedido()
    {
        return $this->fechaEnvPedido;
    }

    /**
     * Set the value of fechaEnvPedido
     *
     * @return  self
     */ 
    public function setFechaEnvPedido($fechaEnvPedido)
    {
        $this->fechaEnvPedido = $fechaEnvPedido;

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