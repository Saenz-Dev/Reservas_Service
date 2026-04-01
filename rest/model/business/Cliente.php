<?php
/**
 * Clase que modela un Cliente
 */
class Cliente
{

    /** @var int */
    public $id_cliente;

    /** @var int */
    public $id_usuario;

    /** @var string */
    public $fecha_registro;

    /** @var string */
    public $observaciones;

    public function getIdCliente()
    {
        return $this->id_cliente;
    }
    public function getIdUsuario()
    {
        return $this->id_usuario;
    }
    public function getFechaRegistro()
    {
        return $this->fecha_registro;
    }
    public function getObservaciones()
    {
        return $this->observaciones;
    }

    public function setIdCliente($id)
    {
        $this->id_cliente = $id;
    }
    public function setIdUsuario($id_usuario)
    {
        $this->id_usuario = $id_usuario;
    }
    public function setFechaRegistro($fecha)
    {
        $this->fecha_registro = $fecha;
    }
    public function setObservaciones($obs)
    {
        $this->observaciones = $obs;
    }
}